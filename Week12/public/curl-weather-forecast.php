<?php

$curlSession = curl_init();

    $url = "http://api.weatherunlocked.com/api/forecast/us.50111?app_id=48682546&app_key=8d9e7f555cfef24c8f6775e16d1e5786";

    curl_setopt($curlSession, CURLOPT_URL, $url);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_SSL_VERIFYPEER, false);

    $pageText = curl_exec($curlSession);

    //var_dump(curl_error($curlSession));

    curl_close($curlSession);

    $weatherForecast = json_decode($pageText, true);

    //var_dump($weatherForecast);
?>
