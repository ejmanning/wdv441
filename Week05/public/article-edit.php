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

        form {
          background-color: white;
          width: 50%;
          text-align: center;
          padding: 2%;
          margin: auto;
          border: thick solid black;
          font-size: 150%;
        }
      </style>
    </head>
    <body>
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
            <?php if (isset($articleErrorsArray['articleTitle'])) { ?>
                <div><?php echo $articleErrorsArray['articleTitle']; ?>
            <?php } ?>
            Title: <input type="text" name="articleTitle" value="<?php echo (isset($articleDataArray['articleTitle']) ? $articleDataArray['articleTitle'] : ''); ?>"/><br><br>
            Content: <textarea name="articleContent"><?php echo (isset($articleDataArray['articleContent']) ? $articleDataArray['articleContent'] : ''); ?></textarea><br><br>
            Author: <input type="text" name="articleAuthor" value="<?php echo (isset($articleDataArray['articleAuthor']) ? $articleDataArray['articleAuthor'] : ''); ?>"/><br><br>
            Date: <input type="date" name="articleDate" value="<?php echo (isset($articleDataArray['articleDate']) ? $articleDataArray['articleDate'] : ''); ?>"/><br><br>
            <input type="hidden" name="articleID" value="<?php echo (isset($articleDataArray['articleID']) ? $articleDataArray['articleID'] : ''); ?>"/>
            <input type="submit" name="Save" value="Save"/>
            <input type="submit" name="Cancel" value="Cancel"/>
        </form>
    </body>
</html>
