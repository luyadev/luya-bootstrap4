# Bootstrap4 CSS for LUYA

Wrapper classes for new [Bootstrap 4](http://v4-alpha.getbootstrap.com) CSS Framework for [Yii 2](https://github.com/yiisoft/yii2) and/or [LUYA](https://github.com/luyadev/luya).

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

### Using Bootstrap 4 Blocks

If you like to use all the Bootstrap 4 blocks (which are by default matching the theme and styling of new bootstrap 4) then you have to inlcude the Module to your project and run the import command. Otherwhise the CMS can not find the blocks (and groups).

To include the Boostrap4 Module just added the following line to your project configuration modules section:

```php
return [
    'modules' => [
        // ...
        'bootstrap4' => 'luya\bootstrap4\Module',
        // ...
    ],
    // ...
];
```

Now run the [import command](https://luya.io/guide/luya-console) and alle blocks and groups are ready to use.

### Assets Resources of Bootstrap

To use the css and js files of bootstrap just register the `Bootstrap4Asset` into your layout file with the following code of your layout.php file:

```php
luya\bootstrap4\Bootstrap4Asset::register($this)
```

At the top section of your layout file. This will include all required css and js files to use bootstrap 4 and set the right depenecy with jquery.

### ActiveForm Usage

A common way to build forms is the use thy Yii2 ActiveForm widget, to match all bootstrap4 components use it like following:

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
