<?php

namespace luya\bootstrap4\tests\src\blocks;

use luya\bootstrap4\tests\src\BaseBootstrap4BlockTestCase;

class LayoutBlockTest extends BaseBootstrap4BlockTestCase
{
    public $blockClass = 'luya\bootstrap4\blocks\LayoutBlock';

    public function testEmptyRender()
    {
        $this->assertSame('<div class="row"></div>', $this->renderFrontendNoSpace());
    }

    public function testPlaceholderRender()
    {
        $this->block->setPlaceholderValues([
            'content' => '<p>Row content</p>'
        ]);
        $this->assertSame('<div class="row"><p>Row content</p></div>', $this->renderFrontendNoSpace());
    }
}
