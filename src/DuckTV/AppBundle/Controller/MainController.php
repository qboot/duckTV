<?php

namespace DuckTV\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{
    public function indexAction()
    {
        /*
			ASTUCE :
				Get current time
				Get in milliseconds, the time difference between next execution time minus current time
				Settimeout with result milliseconds

			*/
        /*
        récupérer datetime du serveur
        trouver quel jour de la semaine on est
            si on est samedi ou dimanche
                on affiche la page "Retour de la diffusion tel jour telle heure"
            sinon si le jour a des créneaux et s'ils sont remplis
                on les récupère tous
            sinon
                on récupère la liste des créneaux par défaut pour le jour X

        Puis:
            À partir des créneaux du jour :
                on boucle pour tester si l'heure est dans l'un d'entre eux
                    si l'heure est dans l'un d'entre eux
                        on récupère le créneau
                        // suite des opérations
                    sinon
                        on affiche la page "Retour de la diffusion tel jour telle heure"
        */
        $currentDate = new \DateTime();
        $actualWeek = $currentDate->format('W');
        print_r($actualWeek);
        die();

        /*

        Quand le client se connecte :

        tester s'il est dans un jour enregistré ou pas

        si oui
            tester s'il est dans un créneau enregistré ou pas
                si oui
                    trouver la vidéo à laquelle on en est
                    se positionner dans la vidéo
                    lancer la lecture
        si non
            tester s'il est dans une semaine enregistrée ou pas
                si oui
                    // il est dans une semaine enregistrée mais son jour n'est pas enregistrée
                si non
                    créer une nouvelle semaine

            + compteur -> reprise de la diffusion dans 36:36:36

            + drag n drop vidéo champ caché
         */

        return $this->render('DuckTVAppBundle:Main:index.html.twig');
    }
}
