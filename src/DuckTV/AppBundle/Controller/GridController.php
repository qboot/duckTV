<?php

namespace DuckTV\AppBundle\Controller;

use DuckTV\AppBundle\Entity\Broadcast;
use DuckTV\AppBundle\Entity\Video;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GridController extends Controller
{

    // FONCTION POUR AFFICHER LA GRILLE PAR DEFAUT
    public function defaultAction() {

        // entity manager
        $em = $this->getDoctrine()->getManager();

        // récupérer tous les jours de la semaine par défaut
        $jours = $em->getRepository('DuckTVAppBundle:Grid')->findBy(
            array('weekNumber' => 0)
        );

        // récupérer toutes les vidéos
        $videos = $em->getRepository('DuckTVAppBundle:Video')->findAll();

        $categories = $em->getRepository('DuckTVAppBundle:Category')->findAll();

        return $this->render('DuckTVAppBundle:Grid:default.html.twig', array(
            'jours' => $jours,
            'categories' => $categories,
            'videos' => $videos,
            'type' => "default"
        ));
    }

    // FONCTION POUR AFFICHER LA GRILLE DE LA SEMAINE COURANTE
    public function currentAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $now = new \DateTime();

        $results = $em->getRepository("DuckTVAppBundle:Grid")->findBy(
            array("weekNumber" => $now->format("W"), "year" => $now->format("Y"))
        );

        // si la semaine actuelle n'est pas encore créée on effectue une copie de la semaine par défaut
        if($results == array()) {
            $createNewWeek = $this->container->get('duck_tv_app.create_new_week');
            $createNewWeek->createNewWeek($now, true);
        } else {
            // si elle a déjà été créée on vérifie que le jour actuel et ceux déjà passés sont correctement remplis
            // si données incomplètes, on complète avec les vidéos de la grille (voir service pour + de détails)
            $fillCurrentWeek = $this->container->get('duck_tv_app.fill_current_week');
            $fillCurrentWeek->fillCurrentWeek($now);
        }

        // récupérer tous les jours de la semaine par défaut
        $jours = $em->getRepository('DuckTVAppBundle:Grid')->findBy(
            array('weekNumber' => $now->format("W"), 'year' => $now->format("Y"))
        );

        // récupérer toutes les vidéos
        $videos = $em->getRepository('DuckTVAppBundle:Video')->findAll();

        $categories = $em->getRepository('DuckTVAppBundle:Category')->findAll();

        return $this->render('DuckTVAppBundle:Grid:current.html.twig', array(
            'jours' => $jours,
            'categories' => $categories,
            'videos' => $videos,
            'type' => "current"
        ));
    }

    // FONCTION POUR AFFICHER LA GRILLE DE LA SEMAINE PROCHAINE
    public function nextAction() {
        // créer une grille vide et un bouton remplir avec la grille par defaut
        // si la grille est vide et que on est dedans grille devient actuelle et la remplir
        // modifier les autres if en fonction
        $em = $this->getDoctrine()->getEntityManager();

        $now = new \DateTime();
        $now->modify('+1 week');

        $results = $em->getRepository("DuckTVAppBundle:Grid")->findBy(
            array("weekNumber" => $now->format("W"), "year" => $now->format("Y"))
        );

        // si la semaine actuelle n'est pas encore créée on effectue une copie de la semaine par défaut
        if($results == array()) {
            $createNewWeek = $this->container->get('duck_tv_app.create_new_week');
            $createNewWeek->createNewWeek($now);
        }

        // récupérer tous les jours de la semaine par défaut
        $jours = $em->getRepository('DuckTVAppBundle:Grid')->findBy(
            array('weekNumber' => $now->format("W"), 'year' => $now->format("Y"))
        );

        // récupérer toutes les vidéos
        $videos = $em->getRepository('DuckTVAppBundle:Video')->findAll();

        $categories = $em->getRepository('DuckTVAppBundle:Category')->findAll();

        return $this->render('DuckTVAppBundle:Grid:next.html.twig', array(
            'jours' => $jours,
            'categories' => $categories,
            'videos' => $videos,
            'type' => "next"
        ));
    }

    // FONCTION POUR AFFICHER LA GRILLE DES TRANSITIONS
    public function transitionAction() {

        // entity manager
        $em = $this->getDoctrine()->getManager();
        $apiKey = $this->container->getParameter('api_key');

        // récupérer tous les jours de la semaine par défaut
        $jours = $em->getRepository('DuckTVAppBundle:Grid')->findBy(
            array('weekNumber' => 0)
        );

        return $this->render('DuckTVAppBundle:Grid:transition.html.twig', array(
            'jours' => $jours
        ));
    }

    public function updateTransitionAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        // ON RECUP TOUS LES INPUTS
        $grid = $request->request->get('grid');

        // si la grille n'est pas un tableau on redirige vers la grille
        if(!is_array($grid)) {
            return $this->redirectToRoute('duck_tv_app_transition_grid');
        }

        // ON CHERCHE QUELLE ACTION DOIT ÊTRE EXÉCUTÉE
        if(isset($grid["update"])) {
            // mettre à jour la grille entière
            $this->updateTransitionGrid($grid);
        } else {
            foreach($grid as $day) {
                if(isset($day["update"])) {
                    // mettre à jour un jour entier
                    $this->updateTransitionDay($day);
                    break; // foreach simple
                }

                if(is_array($day)) {
                    foreach($day as $transition) {
                        if(isset($transition["update"])) {
                            // mettre à jour un créneau (slot) d'1h30
                            $this->updateTransition($transition);
                            break 2; // foreach double
                        }
                    }
                }
            }
        }

        return $this->redirectToRoute('duck_tv_app_transition_grid');
    }

    // FONCTION POUR METTRE A JOUR LA GRILLE OU UNE PARTIE DE LA GRILLE
    public function updateAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        // ON RECUP TOUS LES INPUTS
        $grid = $request->request->get('grid');
        $type = $request->request->get('type');

        // si la grille n'est pas un tableau on redirige vers la grille
        if(!is_array($grid)) {
            return $this->redirectToRoute('duck_tv_app_'.$type.'_grid');
        }

        // ON CHERCHE QUELLE ACTION DOIT ÊTRE EXÉCUTÉE
        if(isset($grid["update"])) {
            // mettre à jour la grille entière
            $this->updateGrid($grid);
        } else {
            foreach($grid as $day) {
                if(isset($day["update"])) {
                    // mettre à jour un jour entier
                    $this->updateDay($day);
                    break; // foreach simple
                }

                if(is_array($day)) {
                    foreach($day as $slot) {
                        if(isset($slot["update"])) {
                            // mettre à jour un créneau (slot) d'1h30
                            $this->updateSlot($slot);
                            break 2; // foreach double
                        }

                        if(isset($slot["add"])) {
                            // ajouter une vidéo à un créneau (slot)
                            $this->addVideoToSlot($slot);
                            break 2; // foreach double
                        }

                        if(is_array($slot)) {
                            foreach($slot as $broadcast) {
                                if(isset($broadcast["delete"])) {
                                    // supprimer une diffusion (broadcast)
                                    $this->deleteBroadcast($broadcast);
                                    break 3; // foreach triple
                                }

                                if(isset($broadcast["update"])) {
                                    // mettre à jour une diffusion (broadcast)
                                    $this->updateBroadcast($broadcast);
                                    break 3; // foreach triple
                                }
                            }
                        }
                    }
                }
            }
        }

        return $this->redirectToRoute('duck_tv_app_'.$type.'_grid');
    }

    // FONCTION POUR REMPLIR UNE GRILLE AVEC LES DATA PAR DÉFAUT
    public function fillAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $now = new \DateTime();
        $now->modify('+1 week');

        $defaultDays = $em->getRepository("DuckTVAppBundle:Grid")->findBy(
            array("year" => 1970, "weekNumber" => 0)
        );

        $currentDays = $em->getRepository("DuckTVAppBundle:Grid")->findBy(
            array("year" => $now->format("Y"), "weekNumber" => $now->format("W"))
        );

        // on vide la grille
        foreach($currentDays as $currentDay) {
            foreach($currentDay->getSlots() as $currentSlot) {
                foreach($currentSlot->getBroadcasts() as $currentBroadcast) {
                    $em->remove($currentBroadcast);
                    $em->flush();
                }
            }
        }

        // on remplit la grille
        foreach($defaultDays as $defaultDay) {
            foreach($currentDays as $currentDay) {

                // mettre à jour $currentDay
                $em->refresh($currentDay);

                if($currentDay->getDay() == $defaultDay->getDay()) {
                    foreach($defaultDay->getSlots() as $defaultSlot) {
                        foreach($currentDay->getSlots() as $currentSlot) {
                            if($currentSlot->getName() == $defaultSlot->getName()) {
                                foreach($defaultSlot->getBroadcasts() as $defaultBroadcast) {
                                    $broadcast = new Broadcast();

                                    $broadcast->setPosition($defaultBroadcast->getPosition());
                                    $broadcast->setSlot($currentSlot);
                                    $broadcast->setVideo($defaultBroadcast->getVideo());

                                    $em->persist($broadcast);
                                    $em->flush();
                                    $em->refresh($broadcast);
                                }
                            }
                        }
                    }
                }
            }
        }

        return $this->redirectToRoute('duck_tv_app_next_grid');
    }

    public function updateGrid($grid) {

        foreach($grid as $day) {
            if(is_array($day)) {
                $this->updateDay($day);
            }
        }

    }

    public function updateDay($day) {

        foreach($day as $slot) {
            if(is_array($slot)) {
                $this->updateSlot($slot);
            }
        }

        return false;
    }

    public function updateSlot($slot) {
        $em = $this->getDoctrine()->getManager();

        $id = $slot["id"];
        $url = $slot["url"];

        // on ajoute la nouvelle vidéo
        $this->addVideoToSlot($slot);

        foreach($slot as $broadcast) {
            if(is_array($broadcast)) {
                // ligne pour éviter les erreurs dûes aux tableaux url[] et category[]
                // qui sont équivalentes à broadcast mais sans le champ id
                if(!isset($broadcast["id"])) {
                    continue;
                }

                // on met à jour les diffusions
                $this->updateBroadcast($broadcast);

                // on met à jour l'ordre des broadcasts
                $cast = $em->getRepository('DuckTVAppBundle:Broadcast')->find($broadcast["id"]);
                $cast->setPosition($broadcast["position"]);
                $em->persist($cast);
                $em->flush();
            }
        }

        return false;
    }

    public function addVideoToSlot($slot) {

        $em = $this->getDoctrine()->getManager();

        $id = $slot["id"];
        $tabUrl = $slot["url"]; // est un tableau
        $tabCategory = $slot["category"]; // est un tableau
        $user = $this->get('security.token_storage')->getToken()->getUser();


        $slot = $em->getRepository("DuckTVAppBundle:Slot")->find($id);
        $position = count($slot->getBroadcasts())+1;

        // on teste si cette vidéo existe déjà dans notre bdd
        $i = 0;
        foreach($tabUrl as $url) {
            $i++;
            $j = 0;
            foreach($tabCategory as $category) {
                $j++;
                // on matche les catégories et les urls dans le bon ordre
                if($i == $j) {

                    if (filter_var($url, FILTER_VALIDATE_URL) === FALSE || $url == "") {
                        continue;
                    }

                    // puis le service pour convertir url -> id
                    $urlToId = $this->container->get('duck_tv_app.video_url_to_video_id');

                    // puis l'existence en bdd
                    $videoIsset = $em->getRepository('DuckTVAppBundle:Video')->findBy(
                        array('videoId' => $urlToId->VideoUrlToVideoId($url))
                    );

                    if($videoIsset != array()) {
                        // la vidéo existe déjà

                        // on met a jour sa catégorie
                        $videoIsset[0]->setCategory($em->getRepository('DuckTVAppBundle:Category')->find($category));
                        $em->persist($videoIsset[0]);

                        // on crée la diffusion et on redirige sur la grille
                        $broadcast = new Broadcast();
                        $broadcast->setSlot($slot);
                        $broadcast->setPosition($position);
                        $broadcast->setVideo($videoIsset[0]);
                        $em->persist($broadcast);
                        $em->flush();
                        continue; // on saute jusqu'à la prochaine itération
                    }
                    // fin test

                    // la vidéo n'existe pas
                    $video = new Video();
                    $video->setVideoUrl($url);
                    $video->setCategory($em->getRepository('DuckTVAppBundle:Category')->find($category));
                    $video->setUser($user);

                    // on teste l'url
                    // function from Url -> Id Service
                    $urlToId = $this->container->get('duck_tv_app.video_url_to_video_id');

                    $vidId = $urlToId->VideoUrlToVideoId($video->getVideoUrl());

                    // url ne provient pas de youtube on redirige
                    if($vidId === false) {
                        continue; // on saute jusqu'à la prochaine itération
                    }
                    // fin test

                    $em->persist($video);
                    $em->flush();

                    $broadcast = new Broadcast();

                    $broadcast->setSlot($slot);
                    $broadcast->setPosition($position);
                    $broadcast->setVideo($video);

                    $em->persist($broadcast);
                    $em->flush();
                }
            }
        }

        return false;
    }

    public function updateBroadcast($broadcast) {

        $em = $this->getDoctrine()->getEntityManager();

        // ligne pour éviter les erreurs dûes aux tableaux url[] et category[] qui sont équivalentes à broadcast mais
        // sans le champ id
        if(!isset($broadcast["id"])) {
            return false;
        }

        $id = $broadcast["id"];
        $url = $broadcast["url"];

        // on vérifie la validité de l'url
        if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
            return false;
        }

        $user = $this->get('security.token_storage')->getToken()->getUser();

        $broadcast = $em->getRepository('DuckTVAppBundle:Broadcast')->find($id);

        // on teste si cette vidéo existe déjà dans notre bdd

            // puis le service pour convertir url -> id
            $urlToId = $this->container->get('duck_tv_app.video_url_to_video_id');

            // puis l'existence en bdd
            $videoIsset = $em->getRepository('DuckTVAppBundle:Video')->findBy(
                array('videoId' => $urlToId->VideoUrlToVideoId($url))
            );

            if($videoIsset != array()) {
                // la vidéo existe déjà
                // on crée la diffusion et on redirige sur la grille
                $broadcast->setVideo($videoIsset[0]);
                $em->persist($broadcast);
                $em->flush();
                return false;
            }
        // fin test

        // la vidéo n'existe pas
        $video = new Video();
        $video->setVideoUrl($url);
        $video->setCategory($em->getRepository('DuckTVAppBundle:Category')->findBy(array('slug' => 'defaut'))[0]);
        $video->setUser($user);

        // on teste l'url
            // function from Url -> Id Service
            $urlToId = $this->container->get('duck_tv_app.video_url_to_video_id');

            $vidId = $urlToId->VideoUrlToVideoId($video->getVideoUrl());

            // url ne provient pas de youtube on redirige
            if($vidId === false) {
                return false;
            }
        // fin test

        $em->persist($video);
        $em->flush();

        $broadcast->setVideo($video);

        $em->persist($broadcast);
        $em->flush();

        return false;
    }

    public function deleteBroadcast($broadcast) {
        $em = $this->getDoctrine()->getEntityManager();

        $id = $broadcast["id"];
        $broadcast = $em->getRepository('DuckTVAppBundle:Broadcast')->find($id);

        $slot = $broadcast->getSlot();

        $em->remove($broadcast);
        $em->flush();

        $updateCastsPos = $this->container->get('duck_tv_app.update_broadcasts_position');
        $updateCastsPos->updateBroadcastsPosition($slot);

        return false;
    }

    public function updateTransitionGrid($grid) {
        foreach($grid as $day) {
            if(is_array($day)) {
                $this->updateTransitionDay($day);
            }
        }

        return false;
    }

    public function updateTransitionDay($day) {
        foreach($day as $transition) {
            if(is_array($transition)) {
                $this->updateTransition($transition);
            }
        }

        return false;
    }

    public function updateTransition($transition) {

        $em = $this->getDoctrine()->getEntityManager();

        $url = $transition["url"];
        $id = $transition["id"];

        if (filter_var($url, FILTER_VALIDATE_URL) === FALSE || $url == "") {
            return false;
        }

        // service pour convertir url -> id
        $urlToId = $this->container->get('duck_tv_app.video_url_to_video_id');

        $videoId = $urlToId->VideoUrlToVideoId($url);

        // url ne provient pas de youtube on redirige
        if($videoId === false) {
            return false;
        }

        // puis l'existence en bdd
        $trans = $em->getRepository('DuckTVAppBundle:Transition')->find($id);

        if($trans != "") {
            // la transition existe
            if($trans->getVideoId() == $videoId) {
                // rien n'a changé on quitte la fonction
                return false;
            } else {
                // il s'agit d'une nouvelle transition
                // on met à jour l'existante
                $trans->setVideoId($videoId);
                $em->persist($trans);
                $em->flush();
            }
        }

        return false;
    }
}
