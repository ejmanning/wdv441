<?php
// usage: http://localhost/Week05/public/article-edit.php?articleID=1
// usage new: http://localhost/Week05/public/article-edit.php
require_once('../inc/NewsArticles.class.php');

// create an instance of our class so we can use it
$newsArticle = new NewsArticles();

// initialize some variables to be used by our view
$articleDataArray = array();
$articleErrorsArray = array();

// load the article if we have it
if (isset($_REQUEST['articleID']) && $_REQUEST['articleID'] > 0) {
    $newsArticle->load($_REQUEST['articleID']);
    // set our article array to our local variable
    $articleDataArray = $newsArticle->articleData;
}

// apply the data if we have new data
if(isset($_POST['Cancel'])) {
    header("location: index.php");
    exit;
}
if (isset($_POST['Save'])) {
    $articleDataArray = $_POST;
    // sanitize and set the post array to our local variable
    $articleDataArray = $newsArticle->sanitize($articleDataArray);
    // pass the array into our instance
    $newsArticle->set($articleDataArray);

    // validate
    if ($newsArticle->validate()) {
        // save
        if ($newsArticle->save()) {
            header("location: article-save-success.php");
            exit;
        } else {
            $articleErrorsArray[] = "Save failed";
        }
    } else {
        $articleErrorsArray = $newsArticle->errors;
        $articleDataArray = $newsArticle->articleData;
    }
}

require_once('../tpl/article-edit.tpl.php');
?>
