<?php
require_once('../inc/CMS.class.php');

$cms = new CMS();

$cmsDataArray = array();

// create curl resource
$ch = curl_init();

// set url
//localhost
curl_setopt($ch, CURLOPT_URL, "http://localhost/wdv441/Week15/public/article-widget.php?limit=2");

//host
/*curl_setopt($ch, CURLOPT_URL, "https://ericamanning.com/wdv441/Week13/public/article-widget.php?limit=2");*/

// if redirected, follow it
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36";

curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);

// $output contains the output string
$newsWidgetHTML = curl_exec($ch);

//var_dump($newsWidgetHTML);

// close curl resource to free up system resources
curl_close($ch);

$chw = curl_init();

// set url
//localhost
curl_setopt($chw, CURLOPT_URL, "http://localhost/wdv441/Week12/public/weather-widget.php");

//host
/*curl_setopt($chw, CURLOPT_URL, "https://ericamanning.com/wdv441/Week12/public/weather-widget.php");*/

// if redirected, follow it
curl_setopt($chw, CURLOPT_FOLLOWLOCATION, true);

//return the transfer as a string
curl_setopt($chw, CURLOPT_RETURNTRANSFER, 1);

$userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36";

curl_setopt($chw, CURLOPT_USERAGENT, $userAgent);

// $output contains the output string
$currentWeatherWidgetHTML = curl_exec($chw);

//var_dump($newsWidgetHTML);

// close curl resource to free up system resources
curl_close($chw);

$chf = curl_init();

// set url
//localhost
curl_setopt($chf, CURLOPT_URL, "http://localhost/wdv441/Week12/public/weather-forecast-widget.php");

//host
/*curl_setopt($chf, CURLOPT_URL, "https://ericamanning.com/wdv441/Week12/public/weather-forecast-widget.php");*/

// if redirected, follow it
curl_setopt($chf, CURLOPT_FOLLOWLOCATION, true);

//return the transfer as a string
curl_setopt($chf, CURLOPT_RETURNTRANSFER, 1);

$userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36";

curl_setopt($chf, CURLOPT_USERAGENT, $userAgent);

// $output contains the output string
$forecastWeatherWidgetHTML = curl_exec($chf);

//var_dump($newsWidgetHTML);

// close curl resource to free up system resources
curl_close($chf);

$chfaq = curl_init();

// set url
//localhost
curl_setopt($chfaq, CURLOPT_URL, "http://localhost/wdv441/Week15/public/faq-widget.php?limit=2");

//host
/*curl_setopt($ch, CURLOPT_URL, "https://ericamanning.com/wdv441/Week13/public/article-widget.php?limit=2");*/

// if redirected, follow it
curl_setopt($chfaq, CURLOPT_FOLLOWLOCATION, true);

//return the transfer as a string
curl_setopt($chfaq, CURLOPT_RETURNTRANSFER, 1);

$userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36";

curl_setopt($chfaq, CURLOPT_USERAGENT, $userAgent);

// $output contains the output string
$faqWidgetHTML = curl_exec($chfaq);

//var_dump($newsWidgetHTML);

// close curl resource to free up system resources
curl_close($chfaq);


// load the article if we have it

if (isset($_REQUEST['page'])) {
    $cms_id = $cms->loadByURLKey($_REQUEST['page']);
    $cmsDataArray = $cms->data;
}

//var_dump($cmsDataArray);

// display the view
require_once('../tpl/cms.tpl.php');
?>
