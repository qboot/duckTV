<?php

namespace DuckTV\AppBundle\Service;

class VideoUrlToVideoId {
    // function to convert url to id
    function videoUrlToVideoId($url)
    {
        preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
        return (isset($matches[1])) ? $matches[1] : false;
    }
}