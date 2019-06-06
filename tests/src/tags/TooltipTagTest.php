<?php

namespace luya\bootstrap4\tests\src\tags;

use luya\testsuite\cases\WebApplicationTestCase;
use luya\bootstrap4\tags\TooltipTag;

class TooltipTagTest extends WebApplicationTestCase
{
    public function getConfigArray()
    {
        return [
            'id' => 'mytestapp',
            'basePath' => dirname(__DIR__),
            'aliases' => [
                '@app' => 'app_path',
            ],
            'components' => [
                'assetManager' => [
                    'basePath' => dirname(__DIR__) . '/../assets',
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

    public function testTag()
    {
        $tag = new TooltipTag();
        $this->assertSame('<span class="tooltip-info-span" title="text" data-toggle="tooltip" data-placement="top">link</span>', $tag->parse('link', 'text'));
    }
}
