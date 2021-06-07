<?php

	//$url = "http://localhost/Week12/public/article-rest-list.php";
	
	$url = "http://localhost/Week12/public/article-rest.php?articleID=3";
	
	//$url = "https://visionary.com";
	
	//$url = "https://facebook.com";
	
	//$url = "https://youtube.com";
	
	//$url = "https://dmacc.edu";
	
	// create curl resource
	$ch = curl_init();

	// set url
	curl_setopt($ch, CURLOPT_URL, $url);

	// if redirected, follow it
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

	//return the transfer as a string
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36";

	curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);

	// $output contains the output string
	$output = curl_exec($ch);

	// close curl resource to free up system resources
	curl_close($ch);     

	echo $output;
?>