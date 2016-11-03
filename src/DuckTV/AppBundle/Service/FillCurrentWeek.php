<?php

namespace DuckTV\AppBundle\Service;

use DuckTV\AppBundle\Entity\Broadcast;
use DuckTV\AppBundle\Entity\Grid;
use DuckTV\AppBundle\Entity\Slot;

class FillCurrentWeek {
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function fillCurrentWeek($date) {

        $em = $this->container->get('doctrine.orm.entity_manager');

        $now = $date;
        $nowMinus = clone $now;
        $nowMinus->modify("-6 hour");

        // semaine actuelle
        $currentDays = $em->getRepository("DuckTVAppBundle:Grid")->findBy(
            array("weekNumber" => $now->format("W"), "year" => $now->format("Y"))
        );

        // semaine par défaut
        $defaultDays = $em->getRepository("DuckTVAppBundle:Grid")->findBy(
            array("weekNumber" => 0, "year" => 1970)
        );

        // on teste que les créneaux sont bien complets
        // POUR L'INSTANT BOUCLE POUR TOUS LES JOURS DE LA SEMAINE COURANTE
        // PEUT-ÊTRE LIMITER AU JOUR EN COURS
        foreach($defaultDays as $defaultDay) {
            foreach($currentDays as $currentDay) {

                // maj : on limite au jour actuel (à partir de 6h du mat') et à ceux déjà passés
                if($currentDay->getDay() == $defaultDay->getDay() && $currentDay->getDate()->format("Y-m-d") <= $nowMinus->format("Y-m-d")) {

                    foreach($defaultDay->getSlots() as $defaultSlot) {
                        foreach($currentDay->getSlots() as $currentSlot) {
                            if($currentSlot->getName() == $defaultSlot->getName()) {

                                $total = 0;
                                $position = count($currentSlot->getBroadcasts());

                                foreach($currentSlot->getBroadcasts() as $currentBroadcast) {
                                    $total += $currentBroadcast->getVideo()->getDuration();
                                }

                                // tant que durée d'un créneau <= durée normale d'un créneau (82min) -5min de marge | en secondes
                                while ($total <= (82 - 5) * 60 * 60) {
                                    // on récupère le bon slot de la semaine par défaut
                                    //dump($defaultSlot);
                                    // on cherche s'il a des vidéos à partir de la durée précédente
                                    // si oui on les ajoute une par une au slot courant
                                    $defaultTotal = 0;

                                    foreach($defaultSlot->getBroadcasts() as $defaultBroadcast) {
                                        $defaultTotal += $defaultBroadcast->getVideo()->getDuration();
                                    }

                                    // on peut ajouter des vidéos au slot
                                    if($defaultTotal > $total) {
                                        $findVideo = 0;

                                        foreach($defaultSlot->getBroadcasts() as $defaultBroadcast) {
                                            $findVideo += $defaultBroadcast->getVideo()->getDuration();
                                            if($findVideo > $total) {
                                                // on ajoute un broadcast en fctn du broadcast par défaut
                                                $broadcast = new Broadcast();

                                                $broadcast->setVideo($defaultBroadcast->getVideo());
                                                $broadcast->setSlot($currentSlot);

                                                $position++;
                                                $broadcast->setPosition($position);

                                                $em->persist($broadcast);
                                                $em->flush();
                                                $em->refresh($broadcast);

                                                // on ajoute la durée au total
                                                $total += $defaultBroadcast->getVideo()->getDuration();

                                                break; // on sort du foreach
                                            }
                                        }
                                    } else {
                                        break; // on sort du while
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        
        return false;

    }
}