# Sreality.cz - FREE Configurable RSS Channel
Sreality.cz FREE Custom Configurable RSS Channel With Images And Google Maps.

[![Latest Stable Version](https://img.shields.io/badge/Stable-v2.0.0-brightgreen.svg?style=plastic)](https://github.com/tomflidr/sreality-configurable-rss/releases)
![PHP Version](https://img.shields.io/badge/PHP->=5.3-brightgreen.svg?style=plastic)

## Instalation
```shell
# load project into 'development' directory, if directory doesn't exists, create it
composer create-project tomflidr/sreality-configurable-rss
```
- open `config.php`
- [Get and copy Google Maps API key](https://developers.google.com/maps/documentation/static-maps/?refresh=1&pli=1) into `$googleMapsApiKey`
- create single table in your mysql server to cache loaded items
  ```
  CREATE TABLE `rss_estates` (
     `id` VARCHAR(255) NOT NULL,
     `data` TEXT NOT NULL,
     INDEX `id` (`id`)
  ) COLLATE='utf8_general_ci' ENGINE=InnoDB;
  ```
- set up `$mySqlConfig` array to connect into database for cached items
- configure `$realEstatesSearchConfig` array by commenting and uncommenting values you want or don't want
- got to `index.php` and follow instructions there:-)

## TODO
- implement RSS items date property
  - before previous data are truncated in db, select them, compare guids from old items and new items
    and if there is the same guid, transfer date from previous item already in database into new item.
	For items without any date - add current time(). Then truncate previous data and insert new items.
