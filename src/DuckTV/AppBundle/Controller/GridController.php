<?php

namespace DuckTV\AppBundle\Controller;

use DuckTV\AppBundle\Entity\Broadcast;
use DuckTV\AppBundle\Entity\Video;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GridController extends Controller
{

    // FONCTION POUR AFFICHER LA GRILLE
    public function defaultAction() {

        // entity manager
        $em = $this->getDoctrine()->getManager();

        // récupérer tous les jours de la semaine par défaut
        $jours = $em->getRepository('DuckTVAppBundle:Grid')->findBy(
            array('weekNumber' => 0)
        );

        $categories = $em->getRepository('DuckTVAppBundle:Category')->findAll();

        return $this->render('DuckTVAppBundle:Grid:default.html.twig', array(
            'jours' => $jours,
            'categories' => $categories,
        ));
    }

    // FONCTION POUR METTRE A JOUR LA GRILLE OU UNE PARTIE DE LA GRILLE
    public function updateAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        // ON RECUP TOUS LES INPUTS
        $grid = $request->request->get('grid');

        // si la grille n'est pas un tableau on redirige vers la grille
        if(!is_array($grid)) {
            return $this->redirectToRoute('duck_tv_app_default_grid');
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

        return $this->redirectToRoute('duck_tv_app_default_grid');
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

        // on vérifie la validité de l'url et la validité de l'id
        if (filter_var($url, FILTER_VALIDATE_URL) && $id != "") {
            // on ajoute la nouvelle vidéo
            $this->addVideoToSlot($slot);
        }

        foreach($slot as $broadcast) {
            if(is_array($broadcast)) {
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
        $url = $slot["url"];
        $category = $slot["category"];
        $user = $this->get('security.token_storage')->getToken()->getUser();

        // on vérifie la validité de l'url et la validité de l'id
        if (filter_var($url, FILTER_VALIDATE_URL) === FALSE || $id == "") {
            return false;
        }

        $slot = $em->getRepository("DuckTVAppBundle:Slot")->find($id);
        $position = count($slot->getBroadcasts())+1;

        // on teste si cette vidéo existe déjà dans notre bdd

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
                return false;
            }
        // fin test

        $video = new Video();
        $video->setVideoUrl($url);
        $video->setCategory($em->getRepository('DuckTVAppBundle:Category')->find($category));
        $video->setUser($user);
        $em->persist($video);
        $em->flush();

        $broadcast = new Broadcast();

        $broadcast->setSlot($slot);
        $broadcast->setPosition($position);
        $broadcast->setVideo($video);

        $em->persist($broadcast);
        $em->flush();

        return false;
    }

    public function updateBroadcast($broadcast) {

        $em = $this->getDoctrine()->getEntityManager();

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
}
