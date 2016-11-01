<?php

namespace DuckTV\AppBundle\Service;

use DuckTV\AppBundle\Entity\Slot;


class UpdateBroadcastsPosition {
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function updateBroadcastsPosition(Slot $slot) {

        $em = $this->container->get('doctrine.orm.entity_manager');

        // logic
        // on réattribue les bonnes positions
        $casts = $slot->getBroadcasts();

        $emptyPos = [];

        for($i = 0; $i < count($casts); $i++) {
            if($i == 0) {
                if($casts[$i]->getPosition() != 1) {
                    for($j= 1;$j<($casts[$i]->getPosition());$j++) {
                        $emptyPos[] = $j;
                    }
                }
            } else {
                if((($casts[$i]->getPosition() - $casts[($i-1)]->getPosition()) != 1)) {
                    // si pos(i-1) = 4 et pos(i) = 7 on a donc 4 5(trou) 6(trou) 7
                    for($j= $casts[($i-1)]->getPosition()+1;$j<($casts[$i]->getPosition());$j++) {
                        $emptyPos[] = $j;
                    }
                }
            }
        }

        // on a normalement un tab de pos vide

        // pour chaque diffusion
        // pour chaque position vide du tab emptyPos
        // si la position de la diffusion est plus grande que la position vide on la décrémente de 1
        foreach($casts as $cast) {
            $pos = 0;
            for($i=0;$i< count($emptyPos);$i++) {
                if($cast->getPosition() > $emptyPos[$i]) {
                    $pos--;
                }
            }
            $cast->setPosition($cast->getPosition()+$pos);
            $em->persist($cast);
        }

        $em->flush();
    }
}