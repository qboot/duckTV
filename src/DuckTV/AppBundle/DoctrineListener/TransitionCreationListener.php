<?php

namespace DuckTV\AppBundle\DoctrineListener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use DuckTV\AppBundle\Entity\Transition;

class TransitionCreationListener
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function prePersist(LifecycleEventArgs $args) {
        $this->updateTransition($args);
    }

    public function preUpdate(LifecycleEventArgs $args) {
        $this->updateTransition($args);
    }

    public function updateTransition(LifecycleEventArgs $args) {
        $entity = $args->getObject();

        // On ne cible que l'obj Video
        if (!$entity instanceof Transition) {
            return;
        }

        $transition = $entity;

        // logic
        $apiKey = $this->container->getParameter('api_key');

        $dataYT = file_get_contents("https://www.googleapis.com/youtube/v3/videos?key=". $apiKey ."&part=snippet&id=". $transition->getVideoId());
        $duration = file_get_contents("https://www.googleapis.com/youtube/v3/videos?id=". $transition->getVideoId() ."&part=contentDetails&key=". $apiKey);

        $dataJSON = json_decode($dataYT);
        $durationJSON = json_decode($duration);

        // function from ISO8601 Service
        $ISO8601ToSeconds = $this->container->get('duck_tv_app.iso8601_to_seconds');

        $transition->setVideoTitle($dataJSON->items[0]->snippet->title);
        $transition->setVideoDuration((int) $ISO8601ToSeconds->ISO8601ToSeconds($durationJSON->items[0]->contentDetails->duration));
        $transition->setVideoThumbnail("http://i1.ytimg.com/vi/".$transition->getVideoId()."/0.jpg");

    }
}