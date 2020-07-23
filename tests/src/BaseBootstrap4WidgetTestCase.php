<?php

namespace luya\bootstrap4\tests\src;


use luya\testsuite\cases\WebApplicationTestCase;
use luyatests\data\modules\unitmodule\Module;

class BaseBootstrap4WidgetTestCase extends WebApplicationTestCase
{
    public function getConfigArray()
    {
        return [
            'id' => 'bs4app',
            'basePath' => dirname(__DIR__) . '/../',
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
                'composition' => null
            ]
        ];
    }
}