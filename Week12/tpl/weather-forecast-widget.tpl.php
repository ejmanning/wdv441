<html>
  <head>
  <style>
    #forecastContainer {
      color: white;
      background-color: #3b9bf5;
      margin: 2%;
    }

    #yesterday, #today, #tomorrow {
      text-align: center;
      border: thick solid navy;
      display: flex;
    }

    #timeframe {
      text-align: center;
      display: flex;
      padding: 10%;
      border-top: thick solid navy;
    }

    .midnight, .three, .six, .nine, .noon, .threePM, .sixPM, .ninePM {
      border-right: thin solid navy;
      padding: 2%;
    }

    #timeframe img {
      background-color: white;
      border-radius: 20px;
    }

  </style>

  <script>
    function showTimeframe() {
      document.getElementById("timeframe").style.display="flex";
    }

    function hideTimeframe() {
      document.getElementById("timeframe").style.display="none";
    }
  </script>
  </head>
  <body onload="hideTimeframe()">
    <div id="forecastContainer">

      <div id="yesterday">
        <h1>Yesterday: </h1>
        <h3>High: <?php echo $yesterdayMaxTemp?>&deg;F</h3>
        <h3>Low: <?php echo $yesterdayMinTemp?>&deg;F</h3>
        <br>
        <p>Sunrise: <?php echo date_format($yesterdaySunrise, "h:i") ?> AM</p>
        <p>Sunset: <?php echo date_format($yesterdaySunset, "h:i") ?> PM</p>
        <p>Chance of Precipitation: <?php echo $yesterdayPrecipChance ?>&percnt;</p>
        <p>Precipitation Total: <?php echo $yesterdayPrecipTotal ?> inches</p>
        <p>Rain Total: <?php echo $yesterdayRainTotal ?> inches</p>
        <p>Snow Total: <?php echo $yesterdaySnowTotal ?> inches</p>
        <p>Humidity Max: <?php echo $yesterdayHumidMax ?>&percnt;</p>
        <p>Humidity Min: <?php echo $yesterdayHumidMin ?>&percnt;</p>
        <p>Max Wind Speed: <?php echo $yesterdayWindSpeedMax ?> MPH</p>
        <p>Max Wind Gust: <?php echo $yesterdayWindGustMax ?> MPH</p>
        <p>Moonrise: <?php echo date_format($yesterdayMoonrise, "h:i") ?> PM</p>
        <p>Moonset: <?php echo date_format($yesterdayMoonset, "h:i") ?> AM</p>
      </div>

      <div id="today">
        <h1>Today: </h1>
        <h3>High: <?php echo $todayMaxTemp?>&deg;F</h3>
        <h3>Low: <?php echo $todayMinTemp?>&deg;F</h3>
        <br>
        <p>Sunrise: <?php echo date_format($todaySunrise, "h:i") ?> AM</p>
        <p>Sunset: <?php echo date_format($todaySunset, "h:i") ?> PM</p>
        <p>Chance of Precipitation: <?php echo $todayPrecipChance ?>&percnt;</p>
        <p>Precipitation Total: <?php echo $todayPrecipTotal ?> inches</p>
        <p>Rain Total: <?php echo $todayRainTotal ?> inches</p>
        <p>Snow Total: <?php echo $todaySnowTotal ?> inches</p>
        <p>Humidity Max: <?php echo $todayHumidMax ?>&percnt;</p>
        <p>Humidity Min: <?php echo $todayHumidMin ?>&percnt;</p>
        <p>Max Wind Speed: <?php echo $todayWindSpeedMax ?> MPH</p>
        <p>Max Wind Gust: <?php echo $todayWindGustMax ?> MPH</p>
        <p>Moonrise: <?php echo date_format($todayMoonrise, "h:i") ?> PM</p>
        <p>Moonset: <?php echo date_format($todayMoonset, "h:i") ?> AM</p>

        <button onClick = "showTimeframe()">Show More</button>

      </div>

      <div id="timeframe">
        <div class="midnight">
          <h3>Midnight</h3>
          <span id="icon"><img src="../public/images/icons/<?php echo $midnightIcon ?>"></span>
          <p> <?php echo $midnightDescription ?></p>
          <p>Temperature: <?php echo $midnightTemp ?>&deg;F</p>
          <p>Feels Like: <?php echo $midnightFeelsLike ?>&deg;F</p>
          <p>Precipitation: <?php echo $midnightPrecip ?> inches</p>
          <p>Wind Direction: <?php echo $midnightWindDirectionFrom ?></p>
          <p>Wind Speed: <?php echo $midnightWindSpeed ?> MPH</p>
          <p>Cloud Total: <?php echo $midnightCloudTotal ?>&percnt;</p>
        </div>

        <div class="three">
          <h3>3 AM</h3>
          <span id="icon"><img src="../public/images/icons/<?php echo $threeIcon ?>"></span>
          <p> <?php echo $threeDescription ?></p>
          <p>Temperature: <?php echo $threeTemp ?>&deg;F</p>
          <p>Feels Like: <?php echo $threeFeelsLike ?>&deg;F</p>
          <p>Precipitation: <?php echo $threePrecip ?> inches</p>
          <p>Wind Direction: <?php echo $threeWindDirectionFrom ?></p>
          <p>Wind Speed: <?php echo $threeWindSpeed ?> MPH</p>
          <p>Cloud Total: <?php echo $threeCloudTotal ?>&percnt;</p>
        </div>

        <div class="six">
          <h3>6 AM</h3>
          <span id="icon"><img src="../public/images/icons/<?php echo $sixIcon ?>"></span>
          <p> <?php echo $sixDescription ?></p>
          <p>Temperature: <?php echo $sixTemp ?>&deg;F</p>
          <p>Feels Like: <?php echo $sixFeelsLike ?>&deg;F</p>
          <p>Precipitation: <?php echo $sixPrecip ?> inches</p>
          <p>Wind Direction: <?php echo $sixWindDirectionFrom ?></p>
          <p>Wind Speed: <?php echo $sixWindSpeed ?> MPH</p>
          <p>Cloud Total: <?php echo $sixCloudTotal ?>&percnt;</p>
        </div>

        <div class="nine">
          <h3>9 AM</h3>
          <span id="icon"><img src="../public/images/icons/<?php echo $nineIcon ?>"></span>
          <p> <?php echo $nineDescription ?></p>
          <p>Temperature: <?php echo $nineTemp ?>&deg;F</p>
          <p>Feels Like: <?php echo $nineFeelsLike ?>&deg;F</p>
          <p>Precipitation: <?php echo $ninePrecip ?> inches</p>
          <p>Wind Direction: <?php echo $nineWindDirectionFrom ?></p>
          <p>Wind Speed: <?php echo $nineWindSpeed ?> MPH</p>
          <p>Cloud Total: <?php echo $nineCloudTotal ?>&percnt;</p>
        </div>

        <div class="noon">
          <h3>12 PM</h3>
          <span id="icon"><img src="../public/images/icons/<?php echo $noonIcon ?>"></span>
          <p> <?php echo $noonDescription ?></p>
          <p>Temperature: <?php echo $noonTemp ?>&deg;F</p>
          <p>Feels Like: <?php echo $noonFeelsLike ?>&deg;F</p>
          <p>Precipitation: <?php echo $noonPrecip ?> inches</p>
          <p>Wind Direction: <?php echo $noonWindDirectionFrom ?></p>
          <p>Wind Speed: <?php echo $noonWindSpeed ?> MPH</p>
          <p>Cloud Total: <?php echo $noonCloudTotal ?>&percnt;</p>
        </div>

        <div class="threePM">
          <h3>3 PM</h3>
          <span id="icon"><img src="../public/images/icons/<?php echo $threePMIcon ?>"></span>
          <p> <?php echo $threePMDescription ?></p>
          <p>Temperature: <?php echo $threePMTemp ?>&deg;F</p>
          <p>Feels Like: <?php echo $threePMFeelsLike ?>&deg;F</p>
          <p>Precipitation: <?php echo $threePMPrecip ?> inches</p>
          <p>Wind Direction: <?php echo $threePMWindDirectionFrom ?></p>
          <p>Wind Speed: <?php echo $threePMWindSpeed ?> MPH</p>
          <p>Cloud Total: <?php echo $threePMCloudTotal ?>&percnt;</p>
        </div>

        <div class="sixPM">
          <h3>6 PM</h3>
          <span id="icon"><img src="../public/images/icons/<?php echo $sixPMIcon ?>"></span>
          <p> <?php echo $sixPMDescription ?></p>
          <p>Temperature: <?php echo $sixPMTemp ?>&deg;F</p>
          <p>Feels Like: <?php echo $sixPMFeelsLike ?>&deg;F</p>
          <p>Precipitation: <?php echo $sixPMPrecip ?> inches</p>
          <p>Wind Direction: <?php echo $sixPMWindDirectionFrom ?></p>
          <p>Wind Speed: <?php echo $sixPMWindSpeed ?> MPH</p>
          <p>Cloud Total: <?php echo $sixPMCloudTotal ?>&percnt;</p>
        </div>

        <div class="ninePM">
          <h3>9 PM</h3>
          <span id="icon"><img src="../public/images/icons/<?php echo $ninePMIcon ?>"></span>
          <p> <?php echo $ninePMDescription ?></p>
          <p>Temperature: <?php echo $ninePMTemp ?>&deg;F</p>
          <p>Feels Like: <?php echo $ninePMFeelsLike ?>&deg;F</p>
          <p>Precipitation: <?php echo $ninePMPrecip ?> inches</p>
          <p>Wind Direction: <?php echo $ninePMWindDirectionFrom ?></p>
          <p>Wind Speed: <?php echo $ninePMWindSpeed ?> MPH</p>
          <p>Cloud Total: <?php echo $ninePMCloudTotal ?>&percnt;</p>
        </div>
        <button onclick="hideTimeframe()">Show Less</button>
      </div>

      <div id="tomorrow">
        <h1>Tomorrow: </h1>
        <h3>High: <?php echo $tomorrowMaxTemp?>&deg;F</h3>
        <h3>Low: <?php echo $tomorrowMinTemp?>&deg;F</h3>
        <br>
        <p>Sunrise: <?php echo date_format($tomorrowSunrise, "h:i") ?> AM</p>
        <p>Sunset: <?php echo date_format($tomorrowSunset, "h:i") ?> PM</p>
        <p>Chance of Precipitation: <?php echo $tomorrowPrecipChance ?>&percnt;</p>
        <p>Precipitation Total: <?php echo $tomorrowPrecipTotal ?> inches</p>
        <p>Rain Total: <?php echo $tomorrowRainTotal ?> inches</p>
        <p>Snow Total: <?php echo $tomorrowSnowTotal ?> inches</p>
        <p>Humidity Max: <?php echo $tomorrowHumidMax ?>&percnt;</p>
        <p>Humidity Min: <?php echo $tomorrowHumidMin ?>&percnt;</p>
        <p>Max Wind Speed: <?php echo $tomorrowWindSpeedMax ?> mph</p>
        <p>Max Wind Gust: <?php echo $tomorrowWindGustMax ?> mph</p>
        <p>Moonrise: <?php echo date_format($tomorrowMoonrise, "h:i") ?> PM</p>
        <p>Moonset: <?php echo date_format($tomorrowMoonset, "h:i") ?> AM</p>
      </div>

    </div>
  </body>
</html>
