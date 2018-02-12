<?php
	
	include_once(__DIR__ . '/bin/startup.php');
	
	/*******************************************************************************************/
	
	// load first page:
	list($totalCount, $perPageCount, $estates) = loadEstates($realEstatesSearchConfig, 1);
	//bdump([$totalCount, $perPageCount, $estates]);
	
	// load all next pages if necessary:
	if ($totalCount > $perPageCount) {
		$totalPages = (int)ceil($totalCount / $perPageCount);
		for ($page = 2; $page <= $totalPages; $page += 1) {
			list($totalCount, $perPageCount, $nextEstates) = loadEstates($realEstatesSearchConfig, $page);
			$estates = array_merge($estates, $nextEstates);
		}
	};
	
	$sqlItems = array();
	$sqlParams = array();
	$counter = 0;
	foreach ($estates as $estate) {
		$link = completeDetailLink($estate);
		$images = array();
		foreach ($estate->_links->images as $image) {
			$images[] = $image->href;
		};
		$labels = completeDetailLabels($estate);
		$item = (object) array(
			'guid'		=> md5($link),
			'title' 	=> completeDetailTitle($estate),
			'link'		=> $link,
			'images'	=> $images,
			'labels'	=> $labels,
			'price'		=> $estate->price,
			'locality'	=> $estate->locality,
			'gps'		=> (object) array(
				'lat'	=> $estate->gps->lat,
				'lon'	=> $estate->gps->lon,
			),
		);
		$sqlItems[] = "('".$item->guid . "',:data".$counter.")";
		$sqlParams[':data'.$counter] = serialize($item);
		$counter++;
	};
	
	$truncate = $db->prepare("TRUNCATE TABLE `".$mySqlConfig->table."`;");
	$truncateResult = $truncate->execute();
	
	$insert = $db->prepare("INSERT INTO `".$mySqlConfig->table."` (`id`, `data`) VALUES " . implode(',', $sqlItems) . ";");
	$insertResult = $insert->execute($sqlParams);
	
	@header('Content-Type: text/plain; charset=utf-8');
	echo "Loaded items: " . $counter;
	exit;
