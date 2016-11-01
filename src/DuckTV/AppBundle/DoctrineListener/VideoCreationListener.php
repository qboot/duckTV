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

        $videoUrl = $video->getVideoUrl();

        // function from Url -> Id Service
        $urlToId = $this->container->get('duck_tv_app.video_url_to_video_id');

        $video->setVideoId($urlToId->VideoUrlToVideoId($videoUrl));

        $data = file_get_contents("https://www.googleapis.com/youtube/v3/videos?key=". $apiKey ."&part=snippet&id=". $video->getVideoId());
        $duration = file_get_contents("https://www.googleapis.com/youtube/v3/videos?id=". $video->getVideoId() ."&part=contentDetails&key=". $apiKey);

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

        // submission value
        if($video->getUser()->hasRole('ROLE_ADMIN') || $video->getUser()->hasRole('ROLE_SUPER_ADMIN')) {
            $video->setSubmission(false);
        } else {
            $video->setSubmission(true);
        }

        // options : default medium high standard maxres / with : witdh, height, url
        $video->setThumbnail("http://i1.ytimg.com/vi/".$video->getVideoId()."/0.jpg");
        if(isset($dataJSON->items[0]->snippet->thumbnails->standard))
            $video->setThumbnailStandard($dataJSON->items[0]->snippet->thumbnails->standard->url);
        if(isset($dataJSON->items[0]->snippet->thumbnails->maxres))
            $video->setThumbnailMaxRes($dataJSON->items[0]->snippet->thumbnails->maxres->url);

    }
}
