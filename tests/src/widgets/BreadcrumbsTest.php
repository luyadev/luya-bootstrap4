<?php

namespace luya\bootstrap4\tests\src\widgets;

use luya\bootstrap4\tests\src\BaseBootstrap4WidgetTestCase;
use luya\bootstrap4\widgets\Breadcrumbs;

class BreadcrumbsTest extends BaseBootstrap4WidgetTestCase
{
    public function testDefaultWidgetOutput()
    {
        ob_start();
        ob_implicit_flush(false);
        echo Breadcrumbs::widget();

        $this->assertContainsTrimmed('', ob_get_clean());
    }

    public function testWidgetOutputWithoutLink()
    {
        $links = [];

        ob_start();
        ob_implicit_flush(false);
        echo Breadcrumbs::widget(['links' => $links]);

        $this->assertContainsTrimmed('', ob_get_clean());
    }

    public function testWidgetOutputWithOneLink()
    {
        $links = [
            [
                'label' => 'Label 1',
                'url' => 'link1'
            ]
        ];

        ob_start();
        ob_implicit_flush(false);
        echo Breadcrumbs::widget(['links' => $links]);

        $this->assertContainsTrimmed('<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="link1">Label 1</a></li>
            </ol>', ob_get_clean());
    }

    public function testWidgetOutputWithMultipleLinks()
    {
        $links = [
            [
                'label' => 'Label 1',
                'url' => 'link1'
            ],
            [
                'label' => 'Label 2',
                'url' => 'link2'
            ],
        ];

        ob_start();
        ob_implicit_flush(false);
        echo Breadcrumbs::widget(['links' => $links]);

        $this->assertContainsTrimmed('<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="link1">Label 1</a></li>
                <li class="breadcrumb-item"><a href="link2">Label 2</a></li>
            </ol>', ob_get_clean());
    }

    public function testWidgetOutputWithoutHomeLink()
    {
        $links = [
            [
                'label' => 'Label 1',
                'url' => 'link1'
            ],
            [
                'label' => 'Label 2',
                'url' => 'link2'
            ],
        ];

        ob_start();
        ob_implicit_flush(false);
        echo Breadcrumbs::widget(['links' => $links, 'homeLink' => false]);

        $this->assertContainsTrimmed('<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="link1">Label 1</a></li>
                <li class="breadcrumb-item"><a href="link2">Label 2</a></li>
            </ol>', ob_get_clean());
    }
}