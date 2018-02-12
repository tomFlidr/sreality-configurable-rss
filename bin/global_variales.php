<?php

	$srealityApiUrl = "https://www.sreality.cz/api/cs/v3/estates?";
	$srealityWebDetailUrl = "https://www.sreality.cz/detail/";
	$requestUri = 'http' 
		. ((isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? 's' : '') 
		. '://' . $_SERVER['SERVER_NAME'] 
		. $_SERVER['REQUEST_URI'];