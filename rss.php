<?php

	include_once(__DIR__ . '/bin/startup.php');
	
	/*******************************************************************************************/
	
	$pageStr = "1";
	if (isset($_GET['page'])) $pageStr = $_GET['page'];
	$pageStr = preg_replace("#[^0-9]#", "", $_GET['page']);
	$page = strlen($pageStr) > 0 ? intval($pageStr) : 0 ;
	if ($page < 1) $page = 1;
	
	$limitStr = "10";
	if (isset($_GET['limit'])) $limitStr = $_GET['limit'];
	$limitStr = preg_replace("#[^0-9]#", "", $_GET['limit']);
	$limit = strlen($limitStr) > 0 ? intval($limitStr) : 10 ;
	
	$offset = ($page - 1) * $limit;
	
	$selectCount = $db->prepare("SELECT COUNT(`id`) FROM `".$mySqlConfig->table."`;");
	$selectCount->execute();
	$totalCount = $selectCount->fetch(\PDO::FETCH_COLUMN);
	
	if ($offset > $totalCount) {
		$estates = array();
	} else {
		$select = $db->prepare("SELECT `id`, `data` FROM `".$mySqlConfig->table."` ORDER BY `id` ASC LIMIT $offset, $limit;");
		$select->execute();
		$rawData = $select->fetchAll(\PDO::FETCH_ASSOC);
		$estates = array();
		foreach ($rawData as $rawItem) {
			$estates[] = unserialize($rawItem['data']);
		}
	}
	header('Content-Type: application/xml; charset=utf-8');

	
	//if (count($estates) === 0) errorResult("No estates to display - source is empty.", 0);
	include_once(__DIR__ . '/bin/rss_template.php');