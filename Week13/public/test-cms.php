<?php
require_once('../inc/CMS.class.php');

$cms = new CMS();
var_dump($cms->load(1));
//die;
$cmsData = array(
    "cms_id" => "",
    "keywords" => "test,page,1",
    "content" => "This is the content for test page 1",
    "h1" => "Test Page 1",
    "title" => "CMS Test Page 1",
	"url_key" => "test-page"
);

//$cms->set($cmsData);

$cms->data["keywords"] = "test,page";

//var_dump($newsArticle->articleData);

if ($cms->validate()) {
    var_dump($cms->save());
} else {
    // do something with the errors
    var_dump($cms->errors);
}

//var_dump($newsArticle->articleData);

/*
$newsArticle->load(1);
$newsArticle->articleData['articleTitle'] = "Test Article 1a";
*/

//var_dump($newsArticle->save());

//var_dump($newsArticle);
?>