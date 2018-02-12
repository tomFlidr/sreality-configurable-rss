<?php

	function buildQuery($params) {
		$data = array();
		foreach ($params as $paramName => $paramValues) {
			if (gettype($paramValues) == 'array') {
				$paramKeys = array_keys($paramValues);
				if (count($paramKeys) > 1) {
					$paramValue = implode('|', $paramKeys);
				} else {
					$paramValue = current($paramKeys);
				}
			} else {
				$paramValue = (string)$paramValues;
			}
			$data[$paramName] = $paramValue;
		}
		return http_build_query($data);
	};
	
	function loadData ($url) {
		$curl = curl_init($url); 
		curl_setopt($curl, CURLOPT_FAILONERROR, true); 
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); 
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
		
		// do not verify host - this script will be probably used on some shit hosting environments,
		// where could not be updated php certificate information - so do not verify
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); 
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);   
		
		$data = curl_exec($curl);
		$result = (object) array(
			'success'	=> TRUE,
			'data'		=> '',
			'error'		=> 0,
			'message'	=> '',
		);
		if ($data === FALSE) {
			$result->success = FALSE;
			$result->error = curl_errno($curl);
			$result->message = curl_error($curl);
		} else {
			$result->data = $data;
		}
		curl_close($curl);
		return $result; 
	};
	
	function errorResult ($message, $error) {
		try {
			throw new Exception($message, $error);
		} catch (Exception $e) {
			\Tracy\Debugger::log($e);
		}
		header('Content-Type: text/xml; charset=utf-8');
		echo '<?xml version="1.0" ?>
<rss version="2.0" xmlns="http://purl.org/rss/1.0/">
    <channel>
        <image>
            <url>https://www.sreality.cz/img/sreality-logo.png</url>
            <link>https://www.sreality.cz/</link>
        </image>
        <link>https://www.sreality.cz/</link>
        <description>Sreality RSS - chyba ' . $error . ': ' . $message . '</description>
        <title>Sreality RSS - chyba ' . $error . ': ' . $message . '</title>
    </channel>
</rss>';
		die();
	};
	
	function decodeJson (& $jsonStr) {
		$result = (object) array(
			'success'	=> TRUE,
			'data'		=> null,
			'errorData'	=> array(),
		);
		$jsonData = @json_decode($jsonStr);
		$errorCode = json_last_error();
		if ($errorCode == JSON_ERROR_NONE) {
			$result->data = $jsonData;
		} else {
			$result->success = FALSE;
			$result->errorData = array(json_last_error_msg(), $errorCode);
		}
		return $result;
	};
	
	function loadEstates ($config, $page = 1) {
		global $srealityApiUrl;
		$localConfig = array_merge(array('page' => $page), $config);
		$link = $srealityApiUrl . buildQuery($localConfig);
		//echo str_replace('%7C', '|', $link);
		
		$response = loadData($link);
		if (!$response->success) errorResult($response->message, $response->error);
		
		$decodeResult = decodeJson($response->data);
		if (!$decodeResult->success) errorResult($response->message, $response->error);
		
		//bdump($decodeResult->data);
		$totalCount = $decodeResult->data->result_size;
		$perPageCount = $decodeResult->data->per_page;
		$estates = $decodeResult->data->_embedded->estates;
		
		return array($totalCount, $perPageCount, $estates);
	};
	
	function completeDetailLink (& $estate) {
		global $realEstatesSearchConfig, $srealityWebDetailUrl;
		$categoryTypeCbSeoValues = array(
			1	=> "prodej",
			2	=> "pronajem",
			3	=> "Dražby",
		);
		$categoryMainCbSeoValues = array(
			1 => "byt",
			2 => "dum",
			3 => "pozemek",
			4 => "komercni",
			5 => "ostatni",
		);
		$categoryTypeCbSeoValue = $categoryTypeCbSeoValues[$estate->seo->category_type_cb];
		$categoryMainCbSeoValue = $categoryMainCbSeoValues[$estate->seo->category_main_cb];
		$categorySubCbSeoValue = $realEstatesSearchConfig['category_sub_cb'][$estate->seo->category_sub_cb];
		$categorySubCbSeoValue = \Nette\Utils\Strings::webalize($categorySubCbSeoValue, '+');
		return $srealityWebDetailUrl . implode('/', array(
			$categoryTypeCbSeoValue,
			$categoryMainCbSeoValue,
			$categorySubCbSeoValue,
			$estate->seo->locality,
			$estate->hash_id
		));
	};
	
	function completeDetailTitle (& $estate) {
		$title = $estate->name;
		if ($estate->locality) $title .= ' [' . $estate->locality . ']';
		return $title;
	};
	
	function completeDetailLabels (& $estate) {
		if (count($estate->labels) > 0) {
			return implode(', ', $estate->labels);
		} else {
			$result = '';
			if (count($estate->labelsAll[0]) > 0) $result .= implode(', ', $estate->labelsAll[0]);
			if (count($estate->labelsAll[1]) > 0) {
				if (count($estate->labelsAll[0]) > 0) $result .= ' (';
				$result .= implode(', ', $estate->labelsAll[1]);
				if (count($estate->labelsAll[0]) > 0) $result .= ')';
			}
			return $result;
		}
	};
	
	function completeMapImageUrl (& $estate, $zoom, $w, $h) {
		global $googleMapsApiKey;
		return 'https://maps.googleapis.com/maps/api/staticmap'
			.'?center=' . $estate->gps->lat . ',' . $estate->gps->lon
			.'&zoom=' . $zoom
			.'&size=' . $w . 'x' . $h
			.'&maptype=roadmap'
			.'&markers=color:red|label:C|' . $estate->gps->lat . ',' . $estate->gps->lon
			.'&key=' . $googleMapsApiKey;
	};
	
	function createDatabaseAndTableIfNecessary () {
		global $mySqlConfig;
		try {
			$db = new \PDO(
				'mysql:host='.$mySqlConfig->host.';dbname='.$mySqlConfig->dbname, 
				$mySqlConfig->user, 
				$mySqlConfig->pass, 
				$mySqlConfig->params
			);
		} catch (Exception $e) {
			if ($e->getCode() == 1049) {
				// unknown database name:
				$db = new \PDO(
					'mysql:host='.$mySqlConfig->host, 
					$mySqlConfig->user, 
					$mySqlConfig->pass, 
					$mySqlConfig->params
				);
				$initCmd = $db->prepare("CREATE DATABASE `".$mySqlConfig->dbname."` /*!40100 COLLATE 'utf8_general_ci' */;");
				$success = $initCmd->execute();
				if (!$success) die("Database '".$mySqlConfig->dbname."' was not possible to create.");
				$db = new \PDO(
					'mysql:host='.$mySqlConfig->host.';dbname='.$mySqlConfig->dbname, 
					$mySqlConfig->user, 
					$mySqlConfig->pass, 
					$mySqlConfig->params
				);
			} else {
				throw $e;
			}
		}
		$selectCount = $db->prepare("SELECT t.TABLE_NAME FROM information_schema.`TABLES` t WHERE t.TABLE_SCHEMA = :dbname;");
		$selectCount->execute(array(':dbname' => $mySqlConfig->dbname));
		$rawTables = $selectCount->fetchAll(\PDO::FETCH_COLUMN);
		$matchedTable = '';
		if ($rawTables) {
			foreach ($rawTables as $rawTable) {
				if ($rawTable == $mySqlConfig->table) {
					$matchedTable = $rawTable;
					break;
				}
			}
		}
		if (!$rawTables || !$matchedTable) {
		$cmd = $db->prepare("CREATE TABLE `".$mySqlConfig->table."` (`id` VARCHAR(255) NOT NULL,`data` TEXT NOT NULL,INDEX `id` (`id`)) COLLATE='utf8_general_ci' ENGINE=InnoDB;");
			$success = $cmd->execute();
			if (!$success) die("Database table '".$mySqlConfig->table."' was not possible to create.");
		}
		return $db;
	};
	