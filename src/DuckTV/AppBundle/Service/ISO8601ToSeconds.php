<?php

namespace DuckTV\AppBundle\Service;

class ISO8601ToSeconds {
    // function to convert iso8601 to seconds
    function ISO8601ToSeconds($ISO8601)
    {
        /*
         * All rights from : https://gist.github.com/w0rldart/9e10aedd1ee55fc4bc74
         * Author : w0rldart
         */

        preg_match('/\d{1,2}[H]/', $ISO8601, $hours);
        preg_match('/\d{1,2}[M]/', $ISO8601, $minutes);
        preg_match('/\d{1,2}[S]/', $ISO8601, $seconds);

        $duration = [
            'hours'   => $hours ? $hours[0] : 0,
            'minutes' => $minutes ? $minutes[0] : 0,
            'seconds' => $seconds ? $seconds[0] : 0,
        ];

        $hours   = substr($duration['hours'], 0, -1);
        $minutes = substr($duration['minutes'], 0, -1);
        $seconds = substr($duration['seconds'], 0, -1);

        $totalSeconds = ($hours * 60 * 60) + ($minutes * 60) + $seconds;

        return $totalSeconds;
    }
}