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
        ['//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js', 'integrity' => 'sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm', 'crossorigin' => 'anonymous'],
    ];
    
    public $css = [
        ['//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', 'integrity' => 'sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh', 'crossorigin' => 'anonymous'],
    ];
    
        
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
