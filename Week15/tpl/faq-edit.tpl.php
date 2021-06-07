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

        .errors {
          color: red;
        }
      </style>
    </head>
    <body>
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post" enctype="multipart/form-data">

            <?php if(isset($faqErrorsArray["faqQuestion"])) { ?>
              <div class = "errors"><?php echo $faqErrorsArray["faqQuestion"];?></div>
            <?php } ?>
            <label for "faqQuestion">Question:</label><br><textarea cols="30" name="faqQuestion"><?php echo (isset($faqDataArray['faqQuestion']) ? $faqDataArray['faqQuestion'] : ''); ?></textarea><br><br>

            <?php if(isset($faqErrorsArray["faqAnswer"])) { ?>
              <div class = "errors"><?php echo $faqErrorsArray["faqAnswer"];?></div>
            <?php } ?>
            <label for "faqAnswer">Answer:</label><br><textarea cols="35" rows="5" name="faqAnswer"><?php echo (isset($faqDataArray['faqAnswer']) ? $faqDataArray['faqAnswer'] : ''); ?></textarea><br><br>

            <input type="hidden" name="faqID" value="<?php echo (isset($faqDataArray['faqID']) ? $faqDataArray['faqID'] : ''); ?>"/>
            <input type="submit" name="Save" value="Save"/>
            <input type="submit" name="Cancel" value="Cancel"/>
        </form>
    </body>
</html>
