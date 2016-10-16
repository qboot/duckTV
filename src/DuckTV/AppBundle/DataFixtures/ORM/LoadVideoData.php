<?php

namespace DuckTV\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DuckTV\AppBundle\Entity\Video;

class LoadVideoData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {

        $videos = array(
                "KQS0KILDZ34",
                "nPd4lpqCZ_M",
        );

        for($i=0;$i<count($videos);$i++) {
            $video = new Video();

            $video->setVideoId($videos[$i]);
            $video->setCategory($this->getReference("defaut"));
            $video->setSubmissionDate(new \DateTime());
            $video->setUser($this->getReference("admin"));

            $video->setSubmission(false);

            $manager->persist($video);

            $this->addReference('video-'.($i+1), $video);
        }

        $manager->flush();

    }

    public function getOrder() {
        // load first 1 then 2 then 3 ...
        return 6;
    }
}