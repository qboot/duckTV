<?php

namespace DuckTV\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DuckTV\AppBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $user = new User();

        $user->setName("admin");
        $user->setFirstName("admin");
        $user->setAvatar("link_to_the_avatar");
        $user->setMail("admin@admin.com");
        $user->setPassword("123");
        $user->setRole("admin");

        $manager->persist($user);
        $manager->flush();

        $this->addReference('admin', $user);
    }

    public function getOrder() {
        // load first 1 then 2 then 3 ...
        return 5;
    }
}