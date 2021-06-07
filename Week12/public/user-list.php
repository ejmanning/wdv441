<?php
session_start();

require_once('../inc/Users.class.php');

$ch = curl_init();

// set url
//localhost
/*curl_setopt($ch, CURLOPT_URL, "http://localhost/wdv441/Week12/public/weather-widget.php");*/

//host
curl_setopt($ch, CURLOPT_URL, "https://ericamanning.com/wdv441/Week12/public/weather-widget.php");

// if redirected, follow it
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

//$userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36";

//curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);

// $output contains the output string
$weatherWidgetHTML = curl_exec($ch);

//var_dump(curl_error($ch));

//var_dump($weatherWidgetHTML);

// close curl resource to free up system resources
curl_close($ch);



$user = new Users();
$userList = $user->getList(
    (isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
    (isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
    (isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
    (isset($_GET['filterText']) ? $_GET['filterText'] : null)
);

//var_dump($userList);
require_once('../tpl/user-list.tpl.php');

// create curl resource

?>
