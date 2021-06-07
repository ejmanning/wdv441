<?php
require_once('../inc/NewsArticles.class.php');

$newsArticle = new NewsArticles();
//var_dump($newsArticle->load(1));
//die;
$article = array(
    "articleID" => "",
    "articleTitle" => "",
    "articleContent" => "Content 3",
    "articleAuthor" => "GG",
    "articleDate" => "2019-02-19"
);

$newsArticle->set($article);

//var_dump($newsArticle->articleData);

if ($newsArticle->validate()) {
    var_dump($newsArticle->save());
} else {
    // do something with the errors
    var_dump($newsArticle->errors);
}

//var_dump($newsArticle->articleData);

/*
$newsArticle->load(1);
$newsArticle->articleData['articleTitle'] = "Test Article 1a";
*/

//var_dump($newsArticle->save());

//var_dump($newsArticle);
?>