<?php

namespace DuckTV\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DuckTV\AppBundle\Entity\Broadcast;

class LoadBroadcastData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $broadcasts = array(
            array(
                'slot' => $this->getReference("lundi-matin-1"),
                'video' => $this->getReference("video-1"),
                'position' => 1
            ),
            array(
                'slot' => $this->getReference("lundi-matin-1"),
                'video' => $this->getReference("video-2"),
                'position' => 2
            ),
            array(
                'slot' => $this->getReference("lundi-matin-1"),
                'video' => $this->getReference("video-1"),
                'position' => 3
            ),
            array(
                'slot' => $this->getReference("lundi-matin-1"),
                'video' => $this->getReference("video-2"),
                'position' => 4
            ),
        );

        foreach($broadcasts as $tabBroadcast) {
            $broadcast = new Broadcast();

            $broadcast->setSlot($tabBroadcast["slot"]);
            $broadcast->setVideo($tabBroadcast["video"]);
            $broadcast->setPosition($tabBroadcast["position"]);

            $manager->persist($broadcast);
        }

        $manager->flush();
    }

    public function getOrder() {
        // load first 1 then 2 then 3 ...
        return 7;
    }
}