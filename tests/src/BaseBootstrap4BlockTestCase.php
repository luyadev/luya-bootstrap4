<?php

namespace luya\bootstrap4\tests\src;

use luya\testsuite\cases\CmsBlockTestCase;

class BaseBootstrap4BlockTestCase extends CmsBlockTestCase
{
    public function getConfigArray()
    {
        return [
            'id' => 'carouselBlockTest',
            'basePath' => dirname(__DIR__) . '/../',
            'components' => [
                'assetManager' => [
                    'basePath' => dirname(__DIR__) . '/assets',
                ],
                'storage' => [
                    'class' => 'luya\admin\filesystem\LocalFileSystem',
                    'filesArray' => [],
                    'imagesArray' => [],
                ],
            ]
        ];
    }
}
