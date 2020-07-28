<p align="center">
  <img src="https://raw.githubusercontent.com/luyadev/luya/master/docs/logo/luya-logo-0.2x.png" alt="LUYA Logo"/>
</p>

# Bootstrap 4

[![LUYA](https://img.shields.io/badge/Powered%20by-LUYA-brightgreen.svg)](https://luya.io)
![Tests](https://github.com/luyadev/luya-bootstrap4/workflows/Tests/badge.svg)
[![Test Coverage](https://api.codeclimate.com/v1/badges/a5356371e27bf46c2329/test_coverage)](https://codeclimate.com/github/luyadev/luya-bootstrap4/test_coverage)
[![Latest Stable Version](https://poser.pugx.org/luyadev/luya-bootstrap4/v/stable)](https://packagist.org/packages/luyadev/luya-bootstrap4)
[![Total Downloads](https://poser.pugx.org/luyadev/luya-bootstrap4/downloads)](https://packagist.org/packages/luyadev/luya-bootstrap4)
[![Forum Support](https://img.shields.io/badge/Slack-luyadev-yellowgreen.svg)](https://forum.luya.io/)

Wrapper classes for new [Bootstrap 4](https://getbootstrap.com/) CSS Framework for [Yii](https://yiiframework.com) and/or [LUYA](https://luya.io).

> As of Bootstrap 4, the grid is completely written in FLEX. Check the [Browser Support](http://caniuse.com/#search=flex) to decide if you want to use Bootstrap 4 for your project.

This package contains the following components:

+ Widgets
   + ActiveForm Widget (Yii ActiveForm Widget matching the Bootstrap 4 form styles)
   + Breadcrumbs
   + LinkPager
   + ActiveField Widget
   + Grid View / Action Column
+ Tags
   + Tooltips
+ CMS Blocks
   + Image
   + Carousel
+ Asset File (contains precompiled bootstrap4 css and js files via cdn)

## Installation

Add the package to your project via composer

```sh
composer require luyadev/luya-bootstrap4:^1.0
```

## Assets Bundle

To use the css and js files of bootstrap just register the `Bootstrap4Asset` into your layout file with the following code of your layout.php file:

```php
luya\bootstrap4\Bootstrap4Asset::register($this)
```

At the top section of your layout file. This will include all required css and js files to use bootstrap 4 and set the right depenecy with jquery.

## Active Form

A common way to build forms is the use thy Yii ActiveForm widget, to match all bootstrap4 components use it like following:

```php
<?php
use luya\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this luya\web\View */
/* @var $form luya\bootstrap4\ActiveForm */
?>
<h1>Bootstrap 4 ActiveForm</h1>
<?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= Html::submitButton('Login', ['class' => 'btn btn-primary-outline']) ?>
<?php ActiveForm::end() ?>
```

Tip: In order to style required fields with asterisks, you can use the following CSS:

```css
div.required label.control-label:after {
   content: " *";
   color: red;
}
```
