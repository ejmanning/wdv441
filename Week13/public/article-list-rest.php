<?php
require_once('../inc/NewsArticles.class.php');

$newsArticle = new NewsArticles();

$articleList = $newsArticle->getList();

//var_dump($articleList); die;

// display the view
require_once('../tpl/article-list.tpl.php');
?>