<?php

namespace luya\bootstrap4\tests\src;

use luya\testsuite\cases\CmsBlockTestCase;

class BaseBootstrap4BlockTestCase extends CmsBlockTestCase
{
    public function getConfigArray()
    {
        return [
            'id' => 'bootstrap4test',
            'basePath' => dirname(__DIR__) . '/../',
            'aliases' => [
                '@app' => 'app_path',
            ],
            'components' => [
                'assetManager' => [
                    'basePath' => dirname(__DIR__) . '/assets',
                    'bundles' => [
                        'yii\web\JqueryAsset' => false,
                        'luya\bootstrap4\Bootstrap4Asset' => false,
                    ],
                ],
                'storage' => [
                    'class' => 'luya\admin\filesystem\DummyFileSystem',
                    'filesArray' => [],
                    'imagesArray' => [],
                ],
            ]
        ];
    }
}
