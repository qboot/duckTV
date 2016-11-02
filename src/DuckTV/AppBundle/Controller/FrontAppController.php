<?php

namespace DuckTV\AppBundle\Controller;

use DuckTV\AppBundle\Entity\Broadcast;
use DuckTV\AppBundle\Entity\Grid;
use DuckTV\AppBundle\Entity\Slot;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
}
