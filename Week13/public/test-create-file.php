<?php
require_once('../inc/NewsArticles.class.php');

$newsArticles = new NewsArticles();

$newsArticles->exportNewsArticles('news_articles_dump.csv');
?>