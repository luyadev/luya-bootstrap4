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
        ['//stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js', 'integrity' => 'sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl', 'crossorigin' => 'anonymous'],
    ];
    
    public $css = [
        ['//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', 'integrity' => 'sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO', 'crossorigin' => 'anonymous'], 
    ];
        
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
