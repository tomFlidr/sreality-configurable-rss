<?php
	include_once(__DIR__ . '/bin/startup.php');
?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Sreality.cz - FREE Configurable RSS Channel</title>
	<link rel="stylesheet" href="bin/style.css" />
</head>
<body>
	<h1>Sreality.cz - FREE Configurable RSS Channel</h1>
	<hr />
	<p>
		<b>Add link bellow to CRON and run the task every hour: </b><br />
		<a href="<?php echo $requestUri; ?>cron.php"><?php echo $requestUri; ?>cron.php</a>
	</p>
	<p>
		<b>Add this link to feed reader: </b><br />
		<a href="<?php echo $requestUri; ?>rss.php?page=1&limit=10"><?php echo $requestUri; ?>rss.php?page=1&limit=10</a>
	</p>
</body>
</html>