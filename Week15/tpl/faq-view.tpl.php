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
        FAQ ID:<?php echo (isset($faqDataArray['faqID']) ? $faqDataArray['faqID'] : ''); ?><br>
        <h4>Question:</h4> <?php echo (isset($faqDataArray['faqQuestion']) ? $faqDataArray['faqQuestion'] : ''); ?><br>
        <h4>Answer:</h4> <?php echo (isset($faqDataArray['faqAnswer']) ? $faqDataArray['faqAnswer'] : ''); ?><br>
      </div>

      <div class="button">
        <a href="faq-list.php">Back to FAQ List</a>
      </div>
    </body>
</html>
