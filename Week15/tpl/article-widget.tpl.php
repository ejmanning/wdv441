<style>
	.proprietary-news-widget-div {
		border: thin solid black;
		width: 10%;
		margin: auto;
		background-color: black;
		border: thin solid white;
		float: left;
    color: white;
	}

	ul li {
		list-style-type: circle;
	}
</style>
<div class="proprietary-news-widget-div">
	<ul class="proprietary-news-widget-ul">
		<?php foreach ($articleList as $articleInfo) { ?>
			<?php if ($articleCount++ >= $articleLimit) break; ?>
			<li class="proprietary-news-widget-ul"><?= $articleInfo["articleTitle"]; ?></li>
		<?php } ?>
	</ul>
</div><br><br><br><br><br>
