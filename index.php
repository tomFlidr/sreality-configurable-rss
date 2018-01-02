<?php
	
	// Google Static API Maps KEY: https://developers.google.com/maps/documentation/static-maps/?refresh=1&pli=1
	$googleMapsApiKey = ''; 
	
	// Comment out values you don't want and that's it:
	$config = array(
	
	
	
		// Typ inzerátu
		"category_type_cb" => array(
			1	=> "Prodej",
			/*2	=> "Pronájem",
			3	=> "Dražby",*/
		),
		
		
		
		// Typy nemovitosti
		"category_main_cb" => array(
			//1 => "Byty",
			2 => "Domy",
			/*3 => "Pozemky",
			4 => "Komerční",
			5 => "Ostatní",*/
		),
		
		
		
		/* 1. Volby pro byty *************************/
		// Typ bytů
		/*"category_sub_cb" => array(
			47	=> "Pokoj",
			2	=> "1+kk",
			3	=> "1+1",
			4	=> "2+kk",
			5	=> "2+1",
			6	=> "3+kk",
			7	=> "3+1",
			8	=> "4+kk",
			9	=> "4+1",
			10	=> "5+kk",
			11	=> "5+1",
			12	=> "6 a více",
			16	=> "Atypický",
		),
		// Další volby k bytu:
		"something_more1" => array(
			3090	=> "Balkón",
			3110	=> "Terasa",
			3100	=> "Lodžie",
			3120	=> "Sklep",
		),
		/*"something_more2"  => array(
			3140	=> "Parkování",
			3150	=> "Garáž",
		),
		"something_more3"  => array(
			3310	=> "Výtah",
			1820	=> "Bezbariérový",
		),
		// Stavba bytu
		"building_type_search" => array(
			1	=> "Panel",
			2	=> "Cihla",
			3	=> "Ostatní",
		),
		// Vlastnictví bytu
		"ownership"=> array(
			1	=> "Osobní",
			2	=> "Družstevní",
			3	=> "Státní/obecní",
		),
		// Patro bytu (zadej jako interval do klíčů pole)
		"floor_number" => array(
			0	=> "Patro od",
			100	=> "Patro do",
		),*/
		
		
		
		/* 2. Volby pro domy *************************/
		// Velikost
		"room_count_cb"	 => array(
			//1 => "1 pokoj",
			//2 => "2 pokoje",
			//3 => "3 pokoje",
			4 => "4 pokoje",
			5 => "5 a více pokojů",
			6 => "Atypický",
		),
		// Typ
		"category_sub_cb" => array(
			37 => "Rodinný",
			39 => "Vila",
			43 => "Chalupa",
			/*33 => "Chata",
			40 => "Na klíč",
			44 => "Zemědělská usedlost",
			35 => "Památka a jiné",*/
		),
		// Typ domu
		/*"object_type" => array(
			1	=> "Přízemní",
			2	=> "Patrový",
		),*/
		// Další volby k domu:
		"object_kind_search" => array(
			1	=> "Samostatný",
			//2	=> "V bloku/řadový",
		),
		"something_more2"  => array(
			//3140	=> "Parkování",
			3150	=> "Garáž",
			//3130	=> "Bazén",
		),
		/*"something_more4" => array(
			2123	=> "Nízkoenergetický",
			100111	=> "Dřevostavba",
		),*/
		
		
		
		/* 3. Volby pro pozemky **********************/
		
		// Typ pozemku
		/*"category_sub_cb" => array(
			19	=> "Bydlení",
			18	=> "Komerční",
			20	=> "Pole",
			22	=> "Louky",
			21	=> "Lesy",
			46	=> "Rybníky",
			48	=> "Sady/vinice",
			23	=> "Zahrady",
			24	=> "Ostatní",
		),*/
		
		
		
		/* 4. Volby pro komerční nemovitosti *********/
		
		// Typ komerční nemovitosti
		/*"category_sub_cb" => array(
			25	=> "Kanceláře",
			26	=> "Sklady",
			27	=> "Výroba",
			28	=> "Obchodní prostory",
			29	=> "Ubytování",
			30	=> "Restaurace",
			31	=> "Zemědělský",
			38	=> "Činžovní dům",
			32	=> "Ostatní",
		),
		// Další volby ke komerční nemovitosti
		"something_more2"  => array(
			//3140	=> "Parkování",
			3150	=> "Garáž",
		),*/
		
		
		
		/* 5. Volby pro ostatní nemovitosti **********/
		
		// Typ ostatní nemovitosti
		/*"category_sub_cb" => array(
			34	=> "Garáž",
			52	=> "Garážové stání",
			53	=> "Mobilheim",
			50	=> "Vinný sklep",
			51	=> "Půdní prostor",
			36	=> "Ostatní",
		),*/
		
		
		
		/* Další volby pro všechny typy nemovitostí */
		
		// Stav objektu (byt, dům, komerční)
		"building_condition" => array(
			1	=> "Velmi dobrý",
			2	=> "Dobrý",
			3	=> "Špatný",
			4	=> "Ve výstavbě",
			//5	=> "Developerské projekty",
			6	=> "Novostavba",
			//7	=> "K demolici",
			8	=> "Před rekonstrukcí",
			9	=> "Po rekonstrukci",
		),
		// Cena od do (zadávej jako Kč, klíč v poli je hodnota v Kč)
		// (byt, dům, pozemky, komerční, ostatní)
		"czk_price_summary_order2" => array(
			900000	=> "od",
			3500000	=> "do",
		),
		// Užitná plocha (zadej jako interval do klíčů pole)
		// (byt, dům)
		/*"usable_area" => array(
			0	=> "Neomezeno",
			10000000000	=> "Neomezeno",
		),*/
		// Plocha pozemku (zadej jako interval do klíčů pole)
		// (dům, pozemky)
		/*"estate_area" => array(
			0	=> "Neomezeno",
			10000000000	=> "Neomezeno",
		),*/
		// Vybavení (byt, dům)
		/*"furnished" => array(
			1	=> "Ano",
			2	=> "Ne",
			3	=> "Částečně",
		),*/
		// Stáří inzerátu (byt, dům, pozemky, komerční, ostatní)
		/*"estate_age" => array(
			//0	=> "bez omezení",
			//2	=> "den",
			//8	=> "posledních 7 dní",
			31	=> "posledních 30 dní",
		),*/
		
		
		
		/* Geografické volby pro všechny typy nemovitostí */
		
		// Zěmě
		"locality_country_id" => array(
			//10001	=> "Vše",
			112	=> "Česká republika",
			/*10000	=> "V zahraničí",
			100	=> "Bulharsko",
			499	=> "Černá Hora",
			191	=> "Chorvatsko",
			818	=> "Egypt",
			246	=> "Finsko",
			250	=> "Francie",
			380	=> "Itálie",
			132	=> "Kapverdy",
			196	=> "Kypr",
			484	=> "Mexiko",
			276	=> "Německo",
			616	=> "Polsko",
			620	=> "Portugalsko",
			40	=> "Rakousko",
			300	=> "Řecko",
			643	=> "Rusko",
			214	=> "Slovenská Republika",
			724	=> "Španělsko",
			784	=> "Spojené arabské emiráty",
			840	=> "Spojené státy americké",
			756	=> "Švýcarsko",*/
		),
		// Kraj ČR
		/*"locality_region_id" => array(
			1	=> "Jihočeský",
			14	=> "Jihomoravský",
			3	=> "Karlovarský",
			6	=> "Královéhradecký",
			5	=> "Liberecký",
			12	=> "Moravskoslezský",
			8	=> "Olomoucký",
			7	=> "Pardubický",
			2	=> "Plzeňský",
			10	=> "Praha",
			11	=> "Středočeský",
			4	=> "Ústecký",
			13	=> "Vysočina",
			9	=> "Zlínský",
		),*/
		// Okresy ČR
		"locality_district_id" => array(
			/*
			56	=> "Praha-východ",
			57	=> "Praha-západ",
			5001	=> "Praha 1",
			5002	=> "Praha 2",
			5003	=> "Praha 3",
			5004	=> "Praha 4",
			5005	=> "Praha 5",
			5006	=> "Praha 6",
			5007	=> "Praha 7",
			5008	=> "Praha 8",
			5009	=> "Praha 9",
			5010	=> "Praha 10",
			1	=> "České Budějovice",
			2	=> "Český Krumlov",
			3	=> "Jindřichův Hradec",
			4	=> "Písek",
			5	=> "Prachatice",
			6	=> "Strakonice",
			7	=> "Tábor",*/
			71	=> "Blansko",
			74	=> "Břeclav",
			//72	=> "Brno-město",
			73	=> "Brno-venkov",
			//75	=> "Hodonín",
			76	=> "Vyškov",
			/*77	=> "Znojmo",
			9	=> "Cheb",
			10	=> "Karlovy Vary",
			16	=> "Sokolov",
			28	=> "Hradec Králové",
			30	=> "Jičín",
			31	=> "Náchod",
			33	=> "Rychnov nad Kněžnou",
			36	=> "Trutnov",
			18	=> "Česká Lípa",
			21	=> "Jablonec nad Nisou",
			22	=> "Liberec",
			34	=> "Semily",
			60	=> "Bruntál",
			61	=> "Frýdek-Místek",
			62	=> "Karviná",
			63	=> "Nový Jičín",
			64	=> "Opava",
			65	=> "Ostrava-město",
			46	=> "Jeseník",
			42	=> "Olomouc",
			43	=> "Přerov",*/
			40	=> "Prostějov",
			/*44	=> "Šumperk",
			29	=> "Chrudim",
			32	=> "Pardubice",*/
			35	=> "Svitavy",
			/*37	=> "Ústí nad Orlicí",
			8	=> "Domažlice",
			11	=> "Klatovy",
			13	=> "Plzeň-jih",
			12	=> "Plzeň-město",
			14	=> "Plzeň-sever",
			15	=> "Rokycany",
			17	=> "Tachov",
			48	=> "Benešov",
			49	=> "Beroun",
			50	=> "Kladno",
			51	=> "Kolín",
			52	=> "Kutná Hora",
			54	=> "Mělník",
			53	=> "Mladá Boleslav",
			55	=> "Nymburk",
			58	=> "Příbram",
			59	=> "Rakovník",
			20	=> "Chomutov",
			19	=> "Děčín",
			23	=> "Litoměřice",
			24	=> "Louny",
			25	=> "Most",
			26	=> "Teplice",
			27	=> "Ústí nad Labem",
			66	=> "Havlíčkův Brod",
			67	=> "Jihlava",
			68	=> "Pelhřimov",
			69	=> "Třebíč",*/
			70	=> "Žďár nad Sázavou",
			/*39	=> "Kroměříž",
			41	=> "Uherské Hradiště",
			45	=> "Vsetín",
			38	=> "Zlín",*/
		),
	);
	
	
	
	/*******************************************************************************************/
	
	
	include_once "vendor/autoload.php";
	\Tracy\Debugger::enable(FALSE, __DIR__ . '/logs');
	date_default_timezone_set('Europe/Prague');
	
	$apiUrl = "https://www.sreality.cz/api/cs/v1/estates?";
	$detailUrl = "https://www.sreality.cz/detail/";
	
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
		global $apiUrl;
		$localConfig = array_merge(array('page' => $page), $config);
		$link = $apiUrl . buildQuery($localConfig);
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
		global $config, $detailUrl;
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
		$categorySubCbSeoValue = $config['category_sub_cb'][$estate->seo->category_sub_cb];
		$categorySubCbSeoValue = \Nette\Utils\Strings::webalize($categorySubCbSeoValue, '+');
		return $detailUrl . implode('/', array(
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
	
	/*******************************************************************************************/
	
	// load first page:
	list($totalCount, $perPageCount, $estates) = loadEstates($config, 1);
	//bdump([$totalCount, $perPageCount, $estates]);
	
	// load all next pages if necessary:
	if ($totalCount > $perPageCount) {
		$totalPages = (int)ceil($totalCount / $perPageCount);
		for ($page = 2; $page <= $totalPages; $page += 1) {
			list($totalCount, $perPageCount, $nextEstates) = loadEstates($config, $page);
			$estates = array_merge($estates, $nextEstates);
		}
	}
	
	header('Content-Type: application/xml; charset=utf-8');

	if (count($estates) === 0) errorResult("No estates to display - source is empty.", 0);
	
?><?xml version="1.0" encoding="utf-8"?>
<?xml-stylesheet type="text/xsl" href="preview.xsl"?>
<rss version="2.0">
    <channel>
        <image>
            <url>https://www.sreality.cz/img/sreality-logo.png</url>
            <link>https://www.sreality.cz/</link>
        </image>
        <link><?php echo 'http',
			((isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? 's' : ''), 
			$_SERVER['SERVER_NAME'],
			$_SERVER['REQUEST_URI']; ?></link>
        <title>Sreality.cz RSS</title>
        <description>Sreality.cz Custom Configurable RSS Channel.</description>
		<lastBuildDate><?php echo date('D, d M Y H:i:s T', time()); ?></lastBuildDate>
		<generator>tomflidr/sreality-rss</generator>
    </channel><?php 
		foreach ($estates as $estate): 
			$link = completeDetailLink($estate);
			$title = completeDetailTitle($estate);
	?><item>
		<title><?php echo $title; ?></title>
		<link><?php echo $link; ?></link>
		<description><![CDATA[
		<a href="<?php echo $link; ?>">
			<?php foreach ($estate->_links->images as $image): ?>
				<img src="<?php echo $image->href; ?>" width="400" height="300" />
			<?php endforeach; ?>
		</a>
		<br />
		<a href="<?php echo $link; ?>"><?php echo $title; ?></a>
		<br />
		Cena: <?php echo $estate->price; ?>Kč<br />
		Nálepky: <?php echo completeDetailLabels($estate); ?><br />
		Lokalita: <?php echo $estate->locality; ?><br />
		<?php if ($googleMapsApiKey): ?>
			<br />
			<img src="<?php echo completeMapImageUrl($estate, 8, 400, 300); ?>" width="400" height="300" />
			<img src="<?php echo completeMapImageUrl($estate, 15, 400, 300); ?>" width="400" height="300" />
		<?php endif; ?>
		]]></description>
		<guid isPermaLink="false"><?php echo md5($link); ?></guid>
		<?php /*<pubDate>Mon, 01 Jan 2018 15:43:06 GMT</pubDate>*/ ?>
	</item><?php 
		endforeach; 
	?>
</rss>