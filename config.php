<?php
	
	// Google Static API Maps KEY: https://developers.google.com/maps/documentation/static-maps/?refresh=1&pli=1
	$googleMapsApiKey = 'AIza***********************************';
	
	// mysql items cache
	$mySqlConfig = (object) array(
		'host'		=> 'localhost',
		'user'		=> 'root',
		'pass'		=> '', // empty string means no pass
		'dbname'	=> 'sreality',
		'table'		=> 'rss_estates',
		'params'	=> array(
			\PDO::ATTR_EMULATE_PREPARES			=> FALSE, // let params inserting on database
			\PDO::MYSQL_ATTR_MULTI_STATEMENTS	=> TRUE,
			\PDO::MYSQL_ATTR_INIT_COMMAND		=> "SET NAMES 'UTF8'",
		),
	);
	
	// real estates search params:
	$realEstatesSearchConfig = array(
	
	
	
		// Typ inzerátu
		"category_type_cb" => array(
			//1	=> "Prodej",
			2	=> "Pronájem",
			//3	=> "Dražby",
		),
		
		
		
		// Typy nemovitosti
		"category_main_cb" => array(
			1 => "Byty",
			/*2 => "Domy",
			3 => "Pozemky",
			4 => "Komerční",
			5 => "Ostatní",*/
		),
		
		
		
		/* 1. Volby pro byty *************************/
		// Typ bytů
		"category_sub_cb" => array(
			47	=> "Pokoj",
			2	=> "1+kk",
			3	=> "1+1",
			/*4	=> "2+kk",
			5	=> "2+1",
			6	=> "3+kk",
			7	=> "3+1",
			8	=> "4+kk",
			9	=> "4+1",
			10	=> "5+kk",
			11	=> "5+1",
			12	=> "6 a více",
			16	=> "Atypický",*/
		),
		// Další volby k bytu:
		/*"something_more1" => array(
			3090	=> "Balkón",
			3110	=> "Terasa",
			3100	=> "Lodžie",
			3120	=> "Sklep",
		),
		"something_more2"  => array(
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
		/*"room_count_cb"	 => array(
			1 => "1 pokoj",
			2 => "2 pokoje",
			3 => "3 pokoje",
			4 => "4 pokoje",
			5 => "5 a více pokojů",
			6 => "Atypický",
		),
		// Typ
		"category_sub_cb" => array(
			37 => "Rodinný",
			39 => "Vila",
			43 => "Chalupa",
			33 => "Chata",
			40 => "Na klíč",
			44 => "Zemědělská usedlost",
			35 => "Památka a jiné",
		),
		// Typ domu
		"object_type" => array(
			1	=> "Přízemní",
			2	=> "Patrový",
		),
		// Další volby k domu:
		"object_kind_search" => array(
			1	=> "Samostatný",
			2	=> "V bloku/řadový",
		),
		"something_more2"  => array(
			3140	=> "Parkování",
			3150	=> "Garáž",
			3130	=> "Bazén",
		),
		"something_more4" => array(
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
			3140	=> "Parkování",
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
		/*"building_condition" => array(
			1	=> "Velmi dobrý",
			2	=> "Dobrý",
			3	=> "Špatný",
			4	=> "Ve výstavbě",
			5	=> "Developerské projekty",
			6	=> "Novostavba",
			7	=> "K demolici",
			8	=> "Před rekonstrukcí",
			9	=> "Po rekonstrukci",
		),*/
		// Cena od do (zadávej jako Kč, klíč v poli je hodnota v Kč)
		// (byt, dům, pozemky, komerční, ostatní)
		"czk_price_summary_order2" => array(
			1000	=> "od",
			5000	=> "do",
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
			0	=> "bez omezení",
			2	=> "den",
			8	=> "posledních 7 dní",
			31	=> "posledních 30 dní",
		),*/
		
		
		
		/* Geografické volby - pro všechny typy nemovitostí */
		
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
			7	=> "Tábor",
			71	=> "Blansko",
			74	=> "Břeclav",*/
			72	=> "Brno-město",
			73	=> "Brno-venkov",
			/*75	=> "Hodonín",
			76	=> "Vyškov",
			77	=> "Znojmo",
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
			43	=> "Přerov",
			40	=> "Prostějov",
			44	=> "Šumperk",
			29	=> "Chrudim",
			32	=> "Pardubice",
			35	=> "Svitavy",
			37	=> "Ústí nad Orlicí",
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
			69	=> "Třebíč",
			70	=> "Žďár nad Sázavou",
			39	=> "Kroměříž",
			41	=> "Uherské Hradiště",
			45	=> "Vsetín",
			38	=> "Zlín",
			*/
		),
	);	
	
