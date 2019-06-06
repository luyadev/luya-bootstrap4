<?php

namespace luya\bootstrap4;

/**
 * Bootstrap 4 CDN Asset Bundle.
 *
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.0
 */
class Bootstrap4Asset extends \yii\web\AssetBundle
{
    public $js = [
        ['//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js', 'integrity' => 'sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o', 'crossorigin' => 'anonymous'],
    ];
    
    public $css = [
        ['//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', 'integrity' => 'sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T', 'crossorigin' => 'anonymous'], 
    ];
    
        
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
