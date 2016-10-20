<?php

namespace DuckTV\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DuckTV\AppBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $user = new User();

        $user->setUsername('admin');
        $user->setEmail('admin@localhost.fr');
        $user->setPlainPassword('admin');
        $user->setEnabled(true);
        $user->setRoles(["ROLE_SUPER_ADMIN"]);

        $manager->persist($user);
        $manager->flush();

        $this->addReference('admin', $user);
    }

    public function getOrder() {
        // load first 1 then 2 then 3 ...
        return 5;
    }
}