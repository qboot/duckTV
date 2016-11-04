<?php

namespace DuckTV\AppBundle\Service;

class OpenWeather {
    // récup météo
    function OpenWeather($url)
    {
        $meteo_string = file_get_contents($url);

        $meteo_json = json_decode($meteo_string, true);

        return $meteo_json;
    }
}