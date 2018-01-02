# Sreality.cz - FREE Configurable RSS Channel
Sreality.cz FREE Custom Configurable RSS Channel With Images And Google Maps.

[![Latest Stable Version](https://img.shields.io/badge/Stable-v1.0.0-brightgreen.svg?style=plastic)](https://github.com/tomflidr/sreality-configurable-rss/releases)
![PHP Version](https://img.shields.io/badge/PHP->=5.3-brightgreen.svg?style=plastic)

- [**MvcCore**](https://github.com/mvccore/mvccore) basic website project, recomanded to pack with [**Packager**](https://github.com/mvccore/packager) only to some mixed mode with hard drive, because all assets are not linked with [**MvcCore Extension - View Helper Assets**](https://github.com/mvccore/ext-view-helper-assets).
- Project lists only homepage template content and **it tries to list tables** from MySQL `cdcol` database, with root/1234 credentials by config.ini if possible.

## Instalation
```shell
# load project into 'development' directory, if directory doesn't exists, create it
composer create-project tomflidr/sreality-configurable-rss
```
- open `index.php` and configure `$config` array.
