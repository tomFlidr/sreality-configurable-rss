<?php

	include_once(__DIR__ . "/../vendor/autoload.php");
	\Tracy\Debugger::enable(FALSE, __DIR__."/../logs");
	date_default_timezone_set('Europe/Prague');
	
	include_once(__DIR__ . "/../config.php");

	include_once(__DIR__ . "/global_variales.php");
	include_once(__DIR__ . "/global_functions.php");
	
	$db = createDatabaseAndTableIfNecessary();