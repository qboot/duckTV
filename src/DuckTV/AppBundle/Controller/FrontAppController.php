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

        $videos = $em->getRepository("DuckTVAppBundle:Grid")->findBy(
            array("date" => $now)
        );

        $transitions = [];

        if(isset($videos[0])) {
            $defaultDay = $em->getRepository("DuckTVAppBundle:Grid")->findBy(
                array("day" => $videos[0]->getDay())
            );

            if(isset($defaultDay[0])) {
                $transitions = $em->getRepository("DuckTVAppBundle:Transition")->findBy(
                    array("grid" => $defaultDay[0]->getId())
                );
            }
        }

        // renvoie l'heure du serveur pour des calculs
        // une liste des vidéos du jour s'il y en a
        // une liste des transitions du jour

        return new JsonResponse(array("date" => $now, "videos" => $videos, "transitions" => $transitions));
    }
}
