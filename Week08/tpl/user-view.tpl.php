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
        User ID: <?php echo (isset($userDataArray['user_id']) ? $userDataArray['user_id'] : ''); ?><br>
        Username: <?php echo (isset($userDataArray['username']) ? $userDataArray['username'] : ''); ?><br>
        Password: <?php echo (isset($userDataArray['password']) ? $userDataArray['password'] : ''); ?><br>
        User Level: <?php echo (isset($userDataArray['user_level']) ? $userDataArray['user_level'] : ''); ?><br>
        <?php if (is_file(dirname(__FILE__) . "/../public/images/" . $userDataArray['user_id'] . "_user.jpg")) { ?>
         Profile Image:<br><img src="images/<?php echo $userDataArray['user_id'] . "_user.jpg"; ?>"/>
        <?php } ?>
      </div>

      <div class="button">
        <a href="user-list.php">Back to User List</a>
      </div>
    </body>
</html>
