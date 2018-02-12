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
- [Get Google Maps API key](https://developers.google.com/maps/documentation/static-maps/?refresh=1&pli=1) into `$googleMapsApiKey`
- set up `$mySqlConfig` array to cache loaded items
- configure `$realEstatesSearchConfig` array by commenting and uncommenting values you want or don't want
- got to `index.php` and follow instructions there:-)
