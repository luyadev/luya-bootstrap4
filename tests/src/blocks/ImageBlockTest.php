<?php

namespace luya\bootstrap4\tests\src\blocks;

use luya\bootstrap4\tests\src\BaseBootstrap4BlockTestCase;

class ImageBlockTest extends BaseBootstrap4BlockTestCase
{
    public $blockClass = 'luya\bootstrap4\blocks\ImageBlock';

    // Tests: default, align center, align right, align right with caption

    public function testEmpty()
    {
        $this->assertSame('', $this->renderFrontendNoSpace());
    }
             
    public function testDefaultOutput()
    {
        $this->block->addExtraVar('image', (object) ['source' => 'luya.jpg', 'caption' => 'Test']);

        $this->assertContainsTrimmed('
            <div class="image ">
                <figure class="figure d-block text-left">
                    <img src="luya.jpg" class="figure-img img-fluid" alt="Test">
                </figure>
            </div>', $this->renderFrontendNoSpace());
    }

    public function testAlignCenter()
    {
        $this->block->setVarValues(['align' => 'center']);
        $this->block->addExtraVar('image', (object) ['source' => 'luya.jpg', 'caption' => 'Test']);

        $this->assertContainsTrimmed('
            <div class="image ">
                <figure class="figure d-block text-center">
                    <img src="luya.jpg" class="figure-img img-fluid" alt="Test">
                </figure>
            </div>', $this->renderFrontendNoSpace());
    }

    public function testAlignRight()
    {
        $this->block->setVarValues(['align' => 'right']);
        $this->block->addExtraVar('image', (object) ['source' => 'luya.jpg', 'caption' => 'Test']);

        $this->assertContainsTrimmed('
            <div class="image ">
                <figure class="figure d-block text-right">
                    <img src="luya.jpg" class="figure-img img-fluid" alt="Test">
                </figure>
            </div>', $this->renderFrontendNoSpace());
    }

    public function testAlignRightCaption()
    {
        $this->block->setVarValues(['align' => 'right', 'showCaption' => true]);
        $this->block->addExtraVar('image', (object) ['source' => 'luya.jpg', 'caption' => 'Test']);

        $this->assertContainsTrimmed('
            <div class="image ">
                <figure class="figure d-block text-right">
                    <img src="luya.jpg" class="figure-img img-fluid" alt="Test">
                    <figcaption class="figure-caption">Test</figcaption>
                </figure>
            </div>', $this->renderFrontendNoSpace());
    }
}
