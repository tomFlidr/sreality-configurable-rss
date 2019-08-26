# Sreality.cz - FREE Configurable RSS Channel
Sreality.cz FREE Custom Configurable RSS Channel With Images And Google Maps.

[![Latest Stable Version](https://img.shields.io/badge/Stable-v2.0.0-brightgreen.svg?style=plastic)](https://github.com/tomflidr/sreality-configurable-rss/releases)
![PHP Version](https://img.shields.io/badge/PHP->=5.3-brightgreen.svg?style=plastic)

## Instalation
```shell
# load project into 'development' directory, if directory doesn't exists, create it
composer create-project tomflidr/sreality-configurable-rss
```

- create single database with single table in your MySQL/MariaDB server to cache loaded items:
  ```
  CREATE DATABASE `sreality` /*!40100 COLLATE 'utf8_general_ci' */
  USE `sreality`;
  CREATE TABLE `rss_estates` (
     `id` VARCHAR(255) NOT NULL,
     `data` TEXT NOT NULL,
     INDEX `id` (`id`)
  ) COLLATE='utf8_general_ci' ENGINE=InnoDB;
  ```
- open `config.php` in your favorite text editor
  - set up `$mySqlConfig` array to connect into database for cached items
  - [Get and copy Google Maps API key](https://developers.google.com/maps/documentation/static-maps/?refresh=1&pli=1) into `$googleMapsApiKey`
  - configure `$realEstatesSearchConfig` array by commenting and uncommenting values you want or don't want
- call `index.php` over HTTP(s) in your favorite web server (Apache/IIS/Nginx) and follow instructions there:-)

## TODO
- implement RSS items date property
  - before previous data are truncated in db, select them, compare guids from old items and new items
    and if there is the same guid, transfer date from previous item already in database into new item.
	For items without any date - add current time(). Then truncate previous data and insert new items.
