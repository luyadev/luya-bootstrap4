# LUYA BOOTSTRAP 4 CHANGELOG

All notable changes to this project will be documented in this file. This project adheres to [Semantic Versioning](http://semver.org/).
In order to read more about upgrading and BC breaks have a look at the [UPGRADE Document](UPGRADE.md).

## 1.1.2 (9. December 2021)

+ Small changes in docs, translations, composer dependencies

## 1.1.1 (27. July 2021)

+ Allow LUYA Core Version 2.0

## 1.1.0 (28. July 2020)

+ [#30](https://github.com/luyadev/luya-bootstrap4/pull/30) Added widget tests
+ [#29](https://github.com/luyadev/luya-bootstrap4/pull/29) CarouselBlock: Added config variable to use LazyLoad; adjusted CarouselBlock tests
+ [#28](https://github.com/luyadev/luya-bootstrap4/issues/28) Image block: Added config variable to use LazyLoad; added `alt` and `title` attribute.
+ Adjust library requirements to `luyadev/luya-core >= 1.6` in composer dependencies.
+ Remove Travis and replaced by GitHub Actions

## 1.0.4 (6. May 2020)

+ Update CDN links from 4.3.1 to 4.4.1.
+ Added new `checkboxSwitch()` option for ActiveField in Bootstrap 4 Form Widget.
+ Added PHP 7.4 tests to Travis.

## 1.0.3 (22. October 2019)

+ [#25](https://github.com/luyadev/luya-bootstrap4/pull/26) Fixed bug with none unique accordion ids.
+ New PT translations.

## 1.0.2.2 (23. September 2019)

+ Fixed bug with Carousel block when multiple blocks are on the same Page.

## 1.0.2.1 (31. July 2019)

+ Fixed bug in carousel block when using indicators.

## 1.0.2 (6. June 2019)

+ Update to latest bootstrap 4.3.1 version.
+ Added field help info for carousel block.
+ Use {{DS}} separator for block paths.
+ [#22](https://github.com/luyadev/luya-bootstrap4/issues/22) Added the link (around the image). Changed the caption property away from image to slide. Added caption CSS class posibility.

## 1.0.1.1 (1. January 2019)

+ [#24](https://github.com/luyadev/luya-bootstrap4/issues/24) Fixed tooltip tag and added test.

## 1.0.1 (3. December 2018)

+ [#20](https://github.com/luyadev/luya-bootstrap4/pull/20) Russian translations.
+ [#19](https://github.com/luyadev/luya-bootstrap4/pull/19) Polish translations.
+ [#18](https://github.com/luyadev/luya-bootstrap4/issues/18) Update to Bootstrap version 4.1.3, use js bundle file.

## 1.0.0 (18. July 2018)

+ [#10](https://github.com/luyadev/luya-bootstrap4/issues/10) Update to Bootstrap 4.1
+ [#3](https://github.com/luyadev/luya-bootstrap4/issues/3) Use new Bootstrap 4 form validation classes.
+ [#7](https://github.com/luyadev/luya-bootstrap4/issues/7) Added Image block.
+ [#5](https://github.com/luyadev/luya-bootstrap4/issues/5) Add carousel block.
+ [#4](https://github.com/luyadev/luya-bootstrap4/issues/4) Move old blocks into luya legacy repo.

## 1.0.0-RC7 (28. January 2018)

+ Bootstrap 4 stable resources

## 1.0.0-RC6 (4. January 2018)

+ Bootstrap 4 beta 3 resources

## 1.0.0-RC5 (4. January 2018)

+ Bootstrap 4 beta 2 resources
+ Added block icons.
+ [#2](https://github.com/luyadev/luya-bootstrap4/issues/2) Fixed issue when using block without enable the module in the config, therefore the bootstrap4 alias is missing for the block view files.

## 1.0.0-RC4 (9. September 2017)

+ Fixed general issues for new LUYA RC4 release.
