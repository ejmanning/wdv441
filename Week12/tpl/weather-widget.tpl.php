<html>
  <head>
  <style>
  #weatherWidgetContainer {
    width: 250px;
    background: rgb(2,0,36);
    background: radial-gradient(circle, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
    color: white;
    padding: 3%;
    -webkit-text-stroke: 0.6px black;
    font-family: sans-serif;
  }

  #weatherWidgetContainer img {
    background-color: white;
    border-radius: 20px;
    margin: 2%;
  }

  #weatherWidgetContainer #head {
    font-size: 250%;
    font-weight: bold;
  }

  </style>

  </head>
  <body>
    <div id="weatherWidgetContainer">
      <div id="weatherInfo">
        <img src="../public/images/icons/<?php echo $icon; ?>"/>
        <span id="head"><?php echo $description; ?></span>
        <h1>Current: <?php echo " ".$temperatureF . " &deg"; ?></h1>
        <h2>Feels Like: <?php echo " ".$feelsLikeF . " &deg"; ?></h2>
        <h3>Grimes, IA</h3>
        <h4>Latitude: <?php echo " ".$lat."  /  " ?> Longitude: <?php echo " ".$lon." " ?></h4>
        <h4>Cloud Cover: <?php echo " ". $cloudCoverPct . "%"; ?></h4>
        <h4>Visibility: <?php echo " ". $visibility . " mi"; ?></h4>
        <h4>Dewpoint: <?php echo " ".$dewpoint . " &deg"; ?></h4>
        <h4>Humidity: <?php echo " ".$humidty . " %"; ?></h4>
        <h4>Altitude: <?php echo " ".$altitude . " ft"; ?></h4>
        <h4>Wind Speed:<?php echo " ".$windSpeed. " mph"; ?></h4>
        <h4>Wind Direction:<?php echo " ".$windDirection; ?></h4>
      </div>
    </div>
  </body>
</html>
