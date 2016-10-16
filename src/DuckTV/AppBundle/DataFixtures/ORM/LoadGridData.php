<?php

namespace DuckTV\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DuckTV\AppBundle\Entity\Grid;

class LoadGridData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {

        $days = array(
            'lundi',
            'mardi',
            'mercredi',
            'jeudi',
            'vendredi',
        );

        for($i=0; $i < count($days); $i++) {
            // create obj grid
            $grid = new Grid();
            $grid->setDay($days[$i]);

            $grid->setModel(true);
            $grid->setDate(new \DateTime("1970-01-01"));
            $grid->setWeekNumber(0);
            $grid->setYear(1970);

            // on persist
            $manager->persist($grid);

            // test add ref
            $this->addReference($grid->getDay(), $grid);
        }

        $manager->flush();
    }

    public function getOrder() {
        // load first 1 then 2 then 3 ...
        return 1;
    }
}