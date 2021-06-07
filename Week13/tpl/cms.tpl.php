<html>
	<head>
		<title><?php echo (isset($cmsDataArray['title']) ? $cmsDataArray['title'] : ''); ?></title>
		<meta name="keywords" content="<?php echo (isset($cmsDataArray['keywords']) ? $cmsDataArray['keywords'] : ''); ?>"/>

		<style>
			body {
				background-color: navy;
				color: white;
			}
		</style>
	</head>
    <body>
		<h1><?php echo (isset($cmsDataArray['h1']) ? $cmsDataArray['h1'] : ''); ?></h1>
        <?php if (is_file(dirname(__FILE__) . "/../public/images/" . $cmsDataArray['cms_id'] . "_cms_banner.jpg")) { ?>
            <img src="images/<?php echo $cmsDataArray['cms_id'] . "_cms_banner.jpg"; ?>" width="100" height="50"/>
        <?php } ?>
		<p>
			<?php echo (isset($cmsDataArray['content']) ? $cmsDataArray['content'] : ''); ?>
		</p>

		<div>
			<h4>Check out the local news!</h4>
			<?php echo $newsWidgetHTML; ?>
		</div>

		<div>
			<h4>Check out the current weather!</h4>
			<?php echo $currentWeatherWidgetHTML; ?>
		</div>

		<div>
			<h4>Check out the 3 day forecast!</h4>
			<?php echo $forecastWeatherWidgetHTML; ?>
		</div>
    </body>
</html>
