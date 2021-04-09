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
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post" enctype="multipart/form-data">
            <?php if (isset($userErrorsArray['username']))
            { ?>
                <div><?php echo $userErrorsArray['username']; ?>
            <?php } ?>
            Username: <input type="text" name="username" value="<?php echo (isset($userDataArray['username']) ? $userDataArray['username'] : ''); ?>"/><br>
            Password: <input type="password" name="password" value="<?php echo (isset($userDataArray['password']) ? $userDataArray['password'] : ''); ?>"/><br>
            User Level: <input type="text" name="user_level" value="<?php echo (isset($userDataArray['user_level']) ? $userDataArray['user_level'] : ''); ?>"/><br>
            User Profile Image:<input type="file" name="profileImage"/> <br>
            <input type="hidden" name="user_id" value="<?php echo (isset($userDataArray['user_id']) ? $userDataArray['user_id'] : ''); ?>"/>
            <input type="submit" name="Save" value="Save"/>
            <input type="submit" name="Cancel" value="Cancel"/>
        </form>
    </body>
</html>
