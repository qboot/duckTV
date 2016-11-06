<?php

namespace DuckTV\AppBundle\Controller;

use DuckTV\AppBundle\Entity\Broadcast;
use DuckTV\AppBundle\Entity\Grid;
use DuckTV\AppBundle\Entity\Slot;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Abraham\TwitterOAuth\TwitterOAuth;

class FrontAppController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $now = new \DateTime();

        $currentDays = $em->getRepository("DuckTVAppBundle:Grid")->findBy(
            array("weekNumber" => $now->format("W"), "year" => $now->format("Y"))
        );

        // si la semaine actuelle n'est pas encore créée on effectue une copie de la semaine par défaut
        if($currentDays == array()) {
            $createNewWeek = $this->container->get('duck_tv_app.create_new_week');
            $createNewWeek->createNewWeek($now, true);
        } else {
        // si elle a déjà été créée on vérifie que le jour actuel et ceux déjà passés sont correctement remplis
        // si données incomplètes, on complète avec les vidéos de la grille (voir service pour + de détails)
            $fillCurrentWeek = $this->container->get('duck_tv_app.fill_current_week');
            $fillCurrentWeek->fillCurrentWeek($now);
        }


        // API TWITTER
        $twitterKey = $this->container->getParameter('api_twitter_key');
        $twitterSecret = $this->container->getParameter('api_twitter_secret');

        $oauth = new TwitterOAuth($twitterKey,$twitterSecret);
        $accessToken = $oauth->oauth2('oauth2/token',['grant_type' => 'client_credentials']);

        $twitter = new TwitterOAuth($twitterKey,$twitterSecret,null,$accessToken->access_token);

        $tweets = $twitter->get('statuses/user_timeline', ['screen_name' => 'MorelKarim', 'exclude_replies' => true, 'count' => 3]);

        return $this->render('DuckTVAppBundle:FrontApp:index.html.twig',array(
            'tweets' => $tweets
        ));
    }

    // RENVOIE LA MÉTÉO DANS UN OBJET JSON
    public function getWeatherAction() {
        // API METEO
        $apikey = "e9385cab3fa3491f0b19f3c44e2d7186";
        $city = "6453634";
        $weather = json_decode(file_get_contents("http://api.openweathermap.org/data/2.5/weather?id=".$city."&APPID=".$apikey."&units=metric"));

        return new JsonResponse(array(
            "weather" => $weather,
            "actualDate" => new \DateTime()
            ));
    }

    // RENVOIE LES VIDÉOS DANS UN OBJET JSON
    public function getVideosAction() {

        $em = $this->getDoctrine()->getEntityManager();
        $now = new \DateTime();

        // POUR DEBUG A DELETE
        //$now->modify("-2 day");
        //$now->modify("-7 hour");
        // $now->modify("+21 minute");

        $grid = $em->getRepository("DuckTVAppBundle:Grid")->findBy(
            array("date" => $now)
        );

        $tabTransitions = [];
        $slots = [];

        if(isset($grid[0])) {
            // on fabrique un tableau pour faciliter l'envoi JSON

            foreach($grid[0]->getSlots() as $slot) {

                $slots[$slot->getId()]["beginning"] = $slot->getBeginning();
                $slots[$slot->getId()]["end"] = $slot->getEnd();
                $slots[$slot->getId()]["duration"] = $slot->getDuration()*60;

                $realDuration = 0;
                $broadcasts = [];

                foreach($slot->getBroadcasts() as $broadcast) {

                    $realDuration += $broadcast->getVideo()->getDuration();

                    $broadcasts[$broadcast->getPosition()] = array(
                        "video" => $broadcast->getVideo()->getVideoId(),
                        "duration" => $broadcast->getVideo()->getDuration(),
                        "position" => $broadcast->getPosition()
                    );
                }

                // on trie par ordre croissant en fonction des clefs qui sont en fait la position de chaque broadcast
                ksort($broadcasts);

                $slots[$slot->getId()]["broadcasts"] = array();

                // on réaffecte à notre tableau $slots
                for($i = 0; $i < count($broadcasts);$i++) {
                    $slots[$slot->getId()]["broadcasts"][] = $broadcasts[$i+1];
                }

                // on ajoute la durée réelle du slot
                $slots[$slot->getId()]["realDuration"] = $realDuration;
            }

            // on trouve les transitions du jour
            $defaultDay = $em->getRepository("DuckTVAppBundle:Grid")->findBy(
                array("day" => $grid[0]->getDay())
            );

            if(isset($defaultDay[0])) {
                $transitions = $em->getRepository("DuckTVAppBundle:Transition")->findBy(
                    array("grid" => $defaultDay[0]->getId())
                );

                // on met dans un tableau ce qui nous intéresse
                foreach($transitions as $transition) {
                    $tabTransitions[] = array(
                        "duration" => $transition->getDuration(),
                        "videoDuration" => $transition->getVideoDuration(),
                        "id" => $transition->getVideoId(),
                        "beginning" => $transition->getBeginning(),
                        "end" => $transition->getEnd()
                    );
                }

            }
        }

        // renvoie l'heure du serveur pour des calculs
        // une liste des vidéos du jour s'il y en a
        // une liste des transitions du jour

        return new JsonResponse(array("date" => $now, "slots" => $slots, "transitions" => $tabTransitions));
    }
}
