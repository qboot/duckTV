<?php

namespace DuckTV\AppBundle\Service;

use DuckTV\AppBundle\Entity\Broadcast;
use DuckTV\AppBundle\Entity\Grid;
use DuckTV\AppBundle\Entity\Slot;

class CreateNewWeek {
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function createNewWeek($date, $fill = false) {

        $em = $this->container->get('doctrine.orm.entity_manager');

        $now = $date;

        // on doit créer la grille de la semaine

        // lundi = 1 si dimanche = 7
        $positionInWeek = (int) $now->format("N");
        $positionInWeek--;

        $firstDay = clone $now;
        $firstDay->modify('-'. $positionInWeek .' day');

        for($i=0;$i<5;$i++) {
            $day = new Grid();

            switch($i) {
                case 0:
                    $d = "lundi";
                    break;
                case 1:
                    $d = "mardi";
                    break;
                case 2:
                    $d = "mercredi";
                    break;
                case 3:
                    $d = "jeudi";
                    break;
                case 4:
                    $d = "vendredi";
                    break;
                default:
                    $d = "indéfini";
            }

            $day->setDay($d);
            $day->setDate(clone $firstDay);
            $day->setModel(false);
            $day->setWeekNumber($now->format("W"));
            $day->setYear($now->format("Y"));

            $em->persist($day);
            $em->flush();
            $em->refresh($day);
            $firstDay->modify('+1 day');
        }

        // on a créé les jours, il faut maintenant créer les slots et les broadcasts
        $defaultDays = $em->getRepository("DuckTVAppBundle:Grid")->findBy(
            array("year" => 1970, "weekNumber" => 0)
        );

        $currentDays = $em->getRepository("DuckTVAppBundle:Grid")->findBy(
            array("year" => $now->format("Y"), "weekNumber" => $now->format("W"))
        );

        foreach($defaultDays as $defaultDay) {
            foreach($currentDays as $currentDay) {
                if ($currentDay->getDay() == $defaultDay->getDay()) {
                    foreach($defaultDay->getSlots() as $defaultSlot) {
                        $slot = new Slot();
                        $slot->setName($defaultSlot->getName());
                        $slot->setModel(false);
                        $slot->setDuration($defaultSlot->getDuration());
                        $slot->setGrid($currentDay);


                        $beginning = new \DateTime($currentDay->getDate()->format('Y-m-d') .' ' .$defaultSlot->getBeginning()->format('H:i:s'));
                        $end = new \DateTime($currentDay->getDate()->format('Y-m-d') .' ' .$defaultSlot->getEnd()->format('H:i:s'));

                        $slot->setBeginning($beginning);
                        $slot->setEnd($end);

                        $em->persist($slot);
                        $em->flush();
                        $em->refresh($slot);
                    }
                }
            }
        }

        // plus qu'a créer les broadcasts seulement si fill = true
        if($fill == true) {
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
        }

        return false;
    }
}