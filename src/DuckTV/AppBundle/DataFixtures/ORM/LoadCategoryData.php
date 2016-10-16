<?php

namespace DuckTV\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DuckTV\AppBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $categories = array(
                "Défaut",
                "Jeu vidéo",
                "Multimédia",
                "Motion design",
                "Graphisme",
                "Web",
                "Design",
                "Technologie",
                "Cryptographie",
                "Photographie",
                "Informatique",
                "Actualité",
                "Curiosité",
                "Documentaire",
                "Tutoriel",
                "Review",
                "Court métrage",
                "Science",
        );

        for($i=0;$i<count($categories);$i++) {
            $category = new Category();
            $category->setName($categories[$i]);
            $manager->persist($category);

            // on flush avant pour avoir accès au slug
            $manager->flush();

            $this->addReference($category->getSlug(), $category);
        }
    }

    public function getOrder() {
        // load first 1 then 2 then 3 ...
        return 4;
    }
}