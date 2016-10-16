<?php

namespace DuckTV\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DuckTV\AppBundle\Entity\Slot;

class LoadSlotData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {

        $slots = array(
            array(
                'name' => "matin-1",
                'day' => $this->getReference("lundi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(8,4),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(9,26),
            ),
            array(
                'name' => "matin-2",
                'day' => $this->getReference("lundi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(9,34),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(10,56),
            ),
            array(
                'name' => "matin-3",
                'day' => $this->getReference("lundi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(11,4),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(12,26),
            ),
            array(
                'name' => "midi-1",
                'day' => $this->getReference("lundi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(12,34),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(13,56),
            ),
            array(
                'name' => "aprem-1",
                'day' => $this->getReference("lundi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(14,4),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(15,26),
            ),
            array(
                'name' => "aprem-2",
                'day' => $this->getReference("lundi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(15,34),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(16,56),
            ),
            array(
                'name' => "aprem-3",
                'day' => $this->getReference("lundi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(17,4),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(18,26),
            ),
            array(
                'name' => "matin-1",
                'day' => $this->getReference("mardi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(8,4),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(9,26),
            ),
            array(
                'name' => "matin-2",
                'day' => $this->getReference("mardi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(9,34),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(10,56),
            ),
            array(
                'name' => "matin-3",
                'day' => $this->getReference("mardi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(11,4),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(12,26),
            ),
            array(
                'name' => "midi-1",
                'day' => $this->getReference("mardi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(12,34),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(13,56),
            ),
            array(
                'name' => "aprem-1",
                'day' => $this->getReference("mardi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(14,4),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(15,26),
            ),
            array(
                'name' => "aprem-2",
                'day' => $this->getReference("mardi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(15,34),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(16,56),
            ),
            array(
                'name' => "aprem-3",
                'day' => $this->getReference("mardi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(17,4),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(18,26),
            ),
            array(
                'name' => "matin-1",
                'day' => $this->getReference("mercredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(8,4),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(9,26),
            ),
            array(
                'name' => "matin-2",
                'day' => $this->getReference("mercredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(9,34),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(10,56),
            ),
            array(
                'name' => "matin-3",
                'day' => $this->getReference("mercredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(11,4),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(12,26),
            ),
            array(
                'name' => "midi-1",
                'day' => $this->getReference("mercredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(12,34),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(13,56),
            ),
            array(
                'name' => "aprem-1",
                'day' => $this->getReference("mercredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(14,4),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(15,26),
            ),
            array(
                'name' => "aprem-2",
                'day' => $this->getReference("mercredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(15,34),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(16,56),
            ),
            array(
                'name' => "aprem-3",
                'day' => $this->getReference("mercredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(17,4),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(18,26),
            ),
            array(
                'name' => "matin-1",
                'day' => $this->getReference("jeudi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(8,4),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(9,26),
            ),
            array(
                'name' => "matin-2",
                'day' => $this->getReference("jeudi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(9,34),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(10,56),
            ),
            array(
                'name' => "matin-3",
                'day' => $this->getReference("jeudi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(11,4),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(12,26),
            ),
            array(
                'name' => "midi-1",
                'day' => $this->getReference("jeudi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(12,34),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(13,56),
            ),
            array(
                'name' => "aprem-1",
                'day' => $this->getReference("jeudi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(14,4),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(15,26),
            ),
            array(
                'name' => "aprem-2",
                'day' => $this->getReference("jeudi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(15,34),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(16,56),
            ),
            array(
                'name' => "aprem-3",
                'day' => $this->getReference("jeudi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(17,4),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(18,26),
            ),
            array(
                'name' => "matin-1",
                'day' => $this->getReference("vendredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(8,4),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(9,26),
            ),
            array(
                'name' => "matin-2",
                'day' => $this->getReference("vendredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(9,34),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(10,56),
            ),
            array(
                'name' => "matin-3",
                'day' => $this->getReference("vendredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(11,4),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(12,26),
            ),
            array(
                'name' => "midi-1",
                'day' => $this->getReference("vendredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(12,34),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(13,56),
            ),
            array(
                'name' => "aprem-1",
                'day' => $this->getReference("vendredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(14,4),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(15,26),
            ),
            array(
                'name' => "aprem-2",
                'day' => $this->getReference("vendredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(15,34),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(16,56),
            ),
            array(
                'name' => "aprem-3",
                'day' => $this->getReference("vendredi"),
                'beginning' => (new \DateTime())->setDate(1970,01,01)->setTime(17,4),
                'end' => (new \DateTime())->setDate(1970,01,01)->setTime(18,26),
            ),
        );

        foreach($slots as $tabSlot) {
            $slot = new Slot();

            $slot->setModel(true);
            $slot->setName($tabSlot["name"]);
            $slot->setGrid($tabSlot["day"]);
            $slot->setBeginning($tabSlot["beginning"]);
            $slot->setEnd($tabSlot["end"]);
            $slot->setDuration(82);

            $manager->persist($slot);

            $this->addReference($slot->getGrid()->getDay()."-".$slot->getName(),$slot);
        }

        $manager->flush();

    }

    public function getOrder() {
        // load first 1 then 2 then 3 ...
        return 2;
    }
}