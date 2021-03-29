<?php
// usage: http://localhost/Week05/public/article-view.php?articleID=1
require_once('../inc/NewsArticles.class.php');

$newsArticle = new NewsArticles();

$articleDataArray = array();

// load the article if we have it
if (isset($_REQUEST['articleID']) && $_REQUEST['articleID'] > 0) {
    $newsArticle->load($_REQUEST['articleID']);
    $articleDataArray = $newsArticle->articleData;
}
?>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
      body {
        background-color: #b5f1ff;
      }

      .view {
        width: 50%;
        margin: auto;
        background-color: white;
        text-align: center;
        border: thick solid black;
        padding: 2%;
        font-size: 150%;
      }

      .button {
          background-color: white;
          border: 2px solid black;
          width: 10%;
          text-align: center;
          margin: 5px auto;
          font-size: 120%;
          padding: 15px;
      }

      .button:hover {
          background-color: gray;
          color: white;
      }

    </style>
  </head>
    <body>
      <div class = "view">
        <strong>Title:</strong> <?php echo (isset($articleDataArray['articleTitle']) ? $articleDataArray['articleTitle'] : ''); ?><br>
        <strong>Content:</strong> <?php echo (isset($articleDataArray['articleContent']) ? $articleDataArray['articleContent'] : ''); ?><br>
        <strong>Author:</strong> <?php echo (isset($articleDataArray['articleAuthor']) ? $articleDataArray['articleAuthor'] : ''); ?><br>
        <strong>Date:</strong> <?php echo (isset($articleDataArray['articleDate']) ? $articleDataArray['articleDate'] : ''); ?><br>
      </div>

      <div class="button">
          <a href="index.php">Back to articles</a>
      </div>
    </body>
</html>
