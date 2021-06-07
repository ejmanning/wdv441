<?php
require_once('../inc/NewsArticles.class.php');

//var_dump($_FILES);die;

if (is_array($_FILES) && isset($_FILES['upload_file'])) {

    $newsArticles = new NewsArticles();

    $newsArticles->importNewsArticles($_FILES['upload_file']['tmp_name']);
}

include_once("../tpl/file-upload.tpl.php");
?>