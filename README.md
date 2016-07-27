# Bootstrap4 CSS for LUYA

Wrapper classes for new [Bootstrap 4](http://v4-alpha.getbootstrap.com) CSS Framework for [Yii2](https://github.com/yiisoft/yii2) and/or [LUYA](https://github.com/luyadev/luya).

+ ActiveForm Widget (Yii2 ActiveForm Widget matching the Bootstrap 4 Form builder)
+ ActiveField Widget
+ CMS Blocks
+ Asset File (contains precompiled bootstrap4 css and js files)

## Installation

Add the composer package to your project:

```sh
composer require luyadev/luya-bootstrap4:^1.0@dev
```

AS this extension is only a library with "helper" classes you can now use the helpers.

# Usage

### Assets Resources of Bootstrap

To use the css and js files of bootstrap just register the `Bootstrap4Asset` into your layout file with the following code of your layout.php file:

```php
bootstrap4\Bootstrap4Asset::register($this)
```

At the top section of your layout file. This will include all required css and js files to use bootstrap 4 and set the right depenecy with jquery.

### ActiveForm Usage

A common way to build forms is the use thy Yii2 ActiveForm widget, to match all bootstrap4 components use it like following:

```php
<?php
use bootstrap4\ActiveForm;
?>
<h1>Your Bootstrap4 ActiveForm</h1>
<?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= \yii\helpers\Html::submitButton('Login', ['class' => 'btn btn-primary-outline']) ?>
<?php ActiveForm::end() ?>
```
