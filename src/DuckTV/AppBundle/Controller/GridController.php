<?php

namespace DuckTV\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class GridController extends Controller
{
    public function defaultAction() {

        // entity manager
        $em = $this->getDoctrine()->getManager();

        // récupérer tous les jours de la semaine par défaut
        $jours = $em->getRepository('DuckTVAppBundle:Grid')->findBy(
            array('weekNumber' => 0)
        );

        // faciliter le dev front
        // Problème : on a un tableau d'obj = jour
        // si on boucle on a jour puis slot puis videos puis jour suivant etc...

        return $this->render('DuckTVAppBundle:Grid:default.html.twig', array(
            'jours' => $jours,
        ));
    }
}
