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
        ['//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js', ['integrity' => 'sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ', 'crossorigin' => 'anonymous']],
        ['//stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js', ['integrity' => 'sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm', 'crossorigin' => 'anonymous']],  '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js',
    ];
    
    public $css = [
        ['//stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css', ['integrity' => 'sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4', 'crossorigin' => 'anonymous']], 
    ];
        
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
