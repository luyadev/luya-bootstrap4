<?php

namespace luya\bootstrap4\tests\src\blocks;

use luya\bootstrap4\tests\src\BaseBootstrap4BlockTestCase;

class LayoutColumnBlockTest extends BaseBootstrap4BlockTestCase
{
    public $blockClass = 'luya\bootstrap4\blocks\LayoutColumnBlock';
             
    public function testEmptyRender()
    {
        $this->assertSame('<div class="col-md-6"></div>', $this->renderFrontendNoSpace());
    }

    public function testCustomColumnRender()
    {
        $this->block->setVarValues([
            'columnCount' => '6',
            'columnCountSM' => '4',
            'columnCountMD' => '3',
            'columnCountLG' => '2',
            'columnCountXL' => '1'
        ]);

        $this->assertSame('<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-1"></div>', $this->renderFrontendNoSpace());
    }

    public function testPlaceholderOutput()
    {
        $this->block->setPlaceholderValues([
            'content' => '<p>Column content</p>'
        ]);

        $this->assertSame('<div class="col-md-6"><p>Column content</p></div>', $this->renderFrontendNoSpace());
    }
}