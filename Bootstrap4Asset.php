<?php

namespace bootstrap4;

/**
 * Bootstrap4 CDN assets depending on yii jquery asset
 *
 * @author nadar
 */
class Bootstrap4Asset extends \yii\web\AssetBundle
{
    public $js = [
        '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js',
    ];
    
    public $css = [
        '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css',
    ];
    
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
