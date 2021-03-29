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
      <form action="../public/login.php" method="POST">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" value="">
<br>
      <label for="password">Password</label>
      <input type="text" id="password" name="password" value="">

<br>
      <button type="submit" name="submitLogin">Submit</button>
      <button type="reset">Reset</button>
    </form>
    </body>
</html>
