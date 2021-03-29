<?php
  $names = array("Erica", "Garritt", "Joe", "Emily", "Will", "Morgan", "Dayna", "Bryan", "Dave", "Marcus");

  $randomNumber = rand(0, 20);

  echo "<h3>Random Number: $randomNumber</h3>";

  if ($randomNumber < 10) {
    echo "<h1>Hello $names[$randomNumber]</h1>";
  } else {
      echo "<h1>Name List: $names[0], $names[1], $names[2], $names[3], $names[4],  $names[5], $names[6], $names[7], $names[8], $names[9]</h1>";
  }

?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Week 1</title>
  </head>
  <body>

  </body>
</html>
