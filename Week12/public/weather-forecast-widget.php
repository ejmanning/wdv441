<?php
require_once('curl-weather-forecast.php');

$yesterdayDate = date_create($weatherForecast['Days'][0]['date']);
$yesterdaySunrise = date_create($weatherForecast['Days'][0]['sunrise_time']);
$yesterdaySunset = date_create($weatherForecast['Days'][0]['sunset_time']);
$yesterdayMoonrise = date_create($weatherForecast['Days'][0]['moonrise_time']);
$yesterdayMoonset = date_create($weatherForecast['Days'][0]['moonset_time']);
$yesterdayMaxTemp = $weatherForecast['Days'][0]['temp_max_f'];
$yesterdayMinTemp = $weatherForecast['Days'][0]['temp_min_f'];
$yesterdayPrecipTotal = $weatherForecast['Days'][0]['precip_total_in'];
$yesterdayRainTotal = $weatherForecast['Days'][0]['rain_total_in'];
$yesterdaySnowTotal = $weatherForecast['Days'][0]['snow_total_in'];
$yesterdayPrecipChance = $weatherForecast['Days'][0]['prob_precip_pct'];
$yesterdayHumidMax = $weatherForecast['Days'][0]['humid_max_pct'];
$yesterdayHumidMin = $weatherForecast['Days'][0]['humid_min_pct'];
$yesterdayWindSpeedMax = $weatherForecast['Days'][0]['windspd_max_mph'];
$yesterdayWindGustMax = $weatherForecast['Days'][0]['windgst_max_mph'];

$todayDate = date_create($weatherForecast['Days'][1]['date']);
$todaySunrise = date_create($weatherForecast['Days'][1]['sunrise_time']);
$todaySunset = date_create($weatherForecast['Days'][1]['sunset_time']);
$todayMoonrise = date_create($weatherForecast['Days'][1]['moonrise_time']);
$todayMoonset = date_create($weatherForecast['Days'][1]['moonset_time']);
$todayMaxTemp = $weatherForecast['Days'][1]['temp_max_f'];
$todayMinTemp = $weatherForecast['Days'][1]['temp_min_f'];
$todayPrecipTotal = $weatherForecast['Days'][1]['precip_total_in'];
$todayRainTotal = $weatherForecast['Days'][1]['rain_total_in'];
$todaySnowTotal = $weatherForecast['Days'][1]['snow_total_in'];
$todayPrecipChance = $weatherForecast['Days'][1]['prob_precip_pct'];
$todayHumidMax = $weatherForecast['Days'][1]['humid_max_pct'];
$todayHumidMin = $weatherForecast['Days'][1]['humid_min_pct'];
$todayWindSpeedMax = $weatherForecast['Days'][1]['windspd_max_mph'];
$todayWindGustMax = $weatherForecast['Days'][1]['windgst_max_mph'];

  $midnightTime = $weatherForecast['Days'][1]["Timeframes"][0]['time'];
    $midnightDescription = $weatherForecast['Days'][1]["Timeframes"][0]['wx_desc'];
    $midnightIcon = $weatherForecast['Days'][1]["Timeframes"][0]['wx_icon'];
    $midnightTemp = $weatherForecast['Days'][1]["Timeframes"][0]['temp_f'];
    $midnightFeelsLike = $weatherForecast['Days'][1]["Timeframes"][0]['feelslike_f'];
    $midnightWindDirectionFrom = $weatherForecast['Days'][1]["Timeframes"][0]['winddir_compass'];
    $midnightWindSpeed = $weatherForecast['Days'][1]["Timeframes"][0]['windspd_mph'];
    $midnightCloudTotal = $weatherForecast['Days'][1]["Timeframes"][0]['cloudtotal_pct'];
    $midnightPrecip = $weatherForecast['Days'][1]["Timeframes"][0]['precip_in'];

  $threeTime = $weatherForecast['Days'][1]["Timeframes"][1]['time'];
    $threeDescription = $weatherForecast['Days'][1]["Timeframes"][1]['wx_desc'];
    $threeIcon = $weatherForecast['Days'][1]["Timeframes"][1]['wx_icon'];
    $threeTemp = $weatherForecast['Days'][1]["Timeframes"][1]['temp_f'];
    $threeFeelsLike = $weatherForecast['Days'][1]["Timeframes"][1]['feelslike_f'];
    $threeWindDirectionFrom = $weatherForecast['Days'][1]["Timeframes"][1]['winddir_compass'];
    $threeWindSpeed = $weatherForecast['Days'][1]["Timeframes"][1]['windspd_mph'];
    $threeCloudTotal = $weatherForecast['Days'][1]["Timeframes"][1]['cloudtotal_pct'];
    $threePrecip = $weatherForecast['Days'][1]["Timeframes"][1]['precip_in'];

  $sixTime = $weatherForecast['Days'][1]["Timeframes"][2]['time'];
    $sixDescription = $weatherForecast['Days'][1]["Timeframes"][2]['wx_desc'];
    $sixIcon = $weatherForecast['Days'][1]["Timeframes"][2]['wx_icon'];
    $sixTemp = $weatherForecast['Days'][1]["Timeframes"][2]['temp_f'];
    $sixFeelsLike = $weatherForecast['Days'][1]["Timeframes"][2]['feelslike_f'];
    $sixWindDirectionFrom = $weatherForecast['Days'][1]["Timeframes"][2]['winddir_compass'];
    $sixWindSpeed = $weatherForecast['Days'][1]["Timeframes"][2]['windspd_mph'];
    $sixCloudTotal = $weatherForecast['Days'][1]["Timeframes"][2]['cloudtotal_pct'];
    $sixPrecip = $weatherForecast['Days'][1]["Timeframes"][2]['precip_in'];

  $nineTime = $weatherForecast['Days'][1]["Timeframes"][3]['time'];
    $nineDescription = $weatherForecast['Days'][1]["Timeframes"][3]['wx_desc'];
    $nineIcon = $weatherForecast['Days'][1]["Timeframes"][3]['wx_icon'];
    $nineTemp = $weatherForecast['Days'][1]["Timeframes"][3]['temp_f'];
    $nineFeelsLike = $weatherForecast['Days'][1]["Timeframes"][3]['feelslike_f'];
    $nineWindDirectionFrom = $weatherForecast['Days'][1]["Timeframes"][3]['winddir_compass'];
    $nineWindSpeed = $weatherForecast['Days'][1]["Timeframes"][3]['windspd_mph'];
    $nineCloudTotal = $weatherForecast['Days'][1]["Timeframes"][3]['cloudtotal_pct'];
    $ninePrecip = $weatherForecast['Days'][1]["Timeframes"][3]['precip_in'];

  $noonTime = $weatherForecast['Days'][1]["Timeframes"][4]['time'];
    $noonDescription = $weatherForecast['Days'][1]["Timeframes"][4]['wx_desc'];
    $noonIcon = $weatherForecast['Days'][1]["Timeframes"][4]['wx_icon'];
    $noonTemp = $weatherForecast['Days'][1]["Timeframes"][4]['temp_f'];
    $noonFeelsLike = $weatherForecast['Days'][1]["Timeframes"][4]['feelslike_f'];
    $noonWindDirectionFrom = $weatherForecast['Days'][1]["Timeframes"][4]['winddir_compass'];
    $noonWindSpeed = $weatherForecast['Days'][1]["Timeframes"][4]['windspd_mph'];
    $noonCloudTotal = $weatherForecast['Days'][1]["Timeframes"][4]['cloudtotal_pct'];
    $noonPrecip = $weatherForecast['Days'][1]["Timeframes"][4]['precip_in'];

  $threePMTime = $weatherForecast['Days'][1]["Timeframes"][5]['time'];
    $threePMDescription = $weatherForecast['Days'][1]["Timeframes"][4]['wx_desc'];
    $threePMIcon = $weatherForecast['Days'][1]["Timeframes"][4]['wx_icon'];
    $threePMTemp = $weatherForecast['Days'][1]["Timeframes"][4]['temp_f'];
    $threePMFeelsLike = $weatherForecast['Days'][1]["Timeframes"][4]['feelslike_f'];
    $threePMWindDirectionFrom = $weatherForecast['Days'][1]["Timeframes"][4]['winddir_compass'];
    $threePMWindSpeed = $weatherForecast['Days'][1]["Timeframes"][4]['windspd_mph'];
    $threePMCloudTotal = $weatherForecast['Days'][1]["Timeframes"][4]['cloudtotal_pct'];
    $threePMPrecip = $weatherForecast['Days'][1]["Timeframes"][4]['precip_in'];

  $sixPMTime = $weatherForecast['Days'][1]["Timeframes"][6]['time'];
    $sixPMDescription = $weatherForecast['Days'][1]["Timeframes"][4]['wx_desc'];
    $sixPMIcon = $weatherForecast['Days'][1]["Timeframes"][4]['wx_icon'];
    $sixPMTemp = $weatherForecast['Days'][1]["Timeframes"][4]['temp_f'];
    $sixPMFeelsLike = $weatherForecast['Days'][1]["Timeframes"][4]['feelslike_f'];
    $sixPMWindDirectionFrom = $weatherForecast['Days'][1]["Timeframes"][4]['winddir_compass'];
    $sixPMWindSpeed = $weatherForecast['Days'][1]["Timeframes"][4]['windspd_mph'];
    $sixPMCloudTotal = $weatherForecast['Days'][1]["Timeframes"][4]['cloudtotal_pct'];
    $sixPMPrecip = $weatherForecast['Days'][1]["Timeframes"][4]['precip_in'];

  $ninePMTime = $weatherForecast['Days'][1]["Timeframes"][7]['time'];
    $ninePMDescription = $weatherForecast['Days'][1]["Timeframes"][4]['wx_desc'];
    $ninePMIcon = $weatherForecast['Days'][1]["Timeframes"][4]['wx_icon'];
    $ninePMTemp = $weatherForecast['Days'][1]["Timeframes"][4]['temp_f'];
    $ninePMFeelsLike = $weatherForecast['Days'][1]["Timeframes"][4]['feelslike_f'];
    $ninePMWindDirectionFrom = $weatherForecast['Days'][1]["Timeframes"][4]['winddir_compass'];
    $ninePMWindSpeed = $weatherForecast['Days'][1]["Timeframes"][4]['windspd_mph'];
    $ninePMCloudTotal = $weatherForecast['Days'][1]["Timeframes"][4]['cloudtotal_pct'];
    $ninePMPrecip = $weatherForecast['Days'][1]["Timeframes"][4]['precip_in'];



$tomorrowDate = date_create($weatherForecast['Days'][2]['date']);
$tomorrowSunrise = date_create($weatherForecast['Days'][2]['sunrise_time']);
$tomorrowSunset = date_create($weatherForecast['Days'][2]['sunset_time']);
$tomorrowMoonrise = date_create($weatherForecast['Days'][2]['moonrise_time']);
$tomorrowMoonset = date_create($weatherForecast['Days'][2]['moonset_time']);
$tomorrowMaxTemp = $weatherForecast['Days'][2]['temp_max_f'];
$tomorrowMinTemp = $weatherForecast['Days'][2]['temp_min_f'];
$tomorrowPrecipTotal = $weatherForecast['Days'][2]['precip_total_in'];
$tomorrowRainTotal = $weatherForecast['Days'][2]['rain_total_in'];
$tomorrowSnowTotal = $weatherForecast['Days'][2]['snow_total_in'];
$tomorrowPrecipChance = $weatherForecast['Days'][2]['prob_precip_pct'];
$tomorrowHumidMax = $weatherForecast['Days'][2]['humid_max_pct'];
$tomorrowHumidMin = $weatherForecast['Days'][2]['humid_min_pct'];
$tomorrowWindSpeedMax = $weatherForecast['Days'][2]['windspd_max_mph'];
$tomorrowWindGustMax = $weatherForecast['Days'][2]['windgst_max_mph'];


//echo $sunrise;

require_once('../tpl/weather-forecast-widget.tpl.php');
?>
