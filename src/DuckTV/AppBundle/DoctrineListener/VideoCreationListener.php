<?php

namespace DuckTV\AppBundle\DoctrineListener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use DuckTV\AppBundle\Entity\Video;

class VideoCreationListener
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function prePersist(LifecycleEventArgs $args) {
        $entity = $args->getObject();

        // On ne cible que l'obj Video
        if (!$entity instanceof Video) {
            return;
        }

        $video = $entity;

        // $em = $args->getObjectManager();

        // logic
        $apiKey = $this->container->getParameter('api_key');
        $videoId = $video->getVideoId();

        $data = file_get_contents("https://www.googleapis.com/youtube/v3/videos?key=". $apiKey ."&part=snippet&id=". $videoId);
        $duration = file_get_contents("https://www.googleapis.com/youtube/v3/videos?id=". $videoId ."&part=contentDetails&key=". $apiKey);

        $dataJSON = json_decode($data);
        $durationJSON = json_decode($duration);

        // function from ISO8601 Service
        $ISO8601ToSeconds = $this->container->get('duck_tv_app.iso8601_to_seconds');

        // set manually empty variables
        $video->setTitle($dataJSON->items[0]->snippet->title);
        $video->setDuration((int) $ISO8601ToSeconds->ISO8601ToSeconds($durationJSON->items[0]->contentDetails->duration));
        $video->setDescription($dataJSON->items[0]->snippet->description);
        $video->setChannelId($dataJSON->items[0]->snippet->channelId);
        $video->setChannelTitle($dataJSON->items[0]->snippet->channelTitle);

        // options : default medium high standard maxres / with : witdh, height, url
        $video->setThumbnailStandard($dataJSON->items[0]->snippet->thumbnails->standard->url);
        $video->setThumbnailMaxRes($dataJSON->items[0]->snippet->thumbnails->maxres->url);

    }
}
