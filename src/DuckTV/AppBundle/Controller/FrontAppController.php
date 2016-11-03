<?php

namespace DuckTV\AppBundle\Controller;

use DuckTV\AppBundle\Entity\Broadcast;
use DuckTV\AppBundle\Entity\Grid;
use DuckTV\AppBundle\Entity\Slot;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class FrontAppController extends Controller {

    // permettre suppression multiple et ajout multiple à la grille
    // grille transition !!!

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

        return $this->render('DuckTVAppBundle:FrontApp:index.html.twig');
    }

    // RENVOIE LES VIDÉOS DANS UN OBJET JSON
    public function getVideosAction() {

        $em = $this->getDoctrine()->getEntityManager();
        $now = new \DateTime();

        // POUR DEBUG A DELETE
        //$now->modify("-1 day");

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
