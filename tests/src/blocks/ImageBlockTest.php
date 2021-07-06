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
            <div class="image">
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
            <div class="image">
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
            <div class="image">
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
            <div class="image">
                <figure class="figure d-block text-right">
                    <img src="luya.jpg" class="figure-img img-fluid" alt="Test">
                    <figcaption class="figure-caption">Test</figcaption>
                </figure>
            </div>', $this->renderFrontendNoSpace());
    }

    public function testCaptionConfigSetWithEmptyCaptionValue()
    {
        $this->block->setVarValues(['align' => 'center', 'showCaption' => true]);
        $this->block->addExtraVar('image', (object) ['source' => 'luya.jpg']);

        $this->assertContainsTrimmed('
            <div class="image">
                <figure class="figure d-block text-center">
                    <img src="luya.jpg" class="figure-img img-fluid">
                </figure>
            </div>', $this->renderFrontendNoSpace());
    }

    public function testLazyLoad()
    {
        $this->block->addExtraVar('image', (object) ['source' => 'luya.jpg', 'caption' => 'Test', 'itemArray' => [ 'resolution_width' => 2, 'resolution_height' => 1]]);
        $this->block->setCfgValues(['lazyload' => 1]);

        $this->assertContainsTrimmed('<div class="image"><figure class="figure d-block text-left"><div class="lazyimage-wrapper figure-img img-fluid"><img class="js-lazyimage lazyimage figure-img img-fluid" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Test" title="Test" data-src="luya.jpg" data-width="2" data-height="1" data-replace-placeholder="1"><div class="lazyimage-placeholder"><div style="display: block; height: 0px; padding-bottom: 50%;"></div><div class="loader"></div></div><noscript><img class="loaded figure-img img-fluid" src="luya.jpg" /></noscript></div></figure></div>', $this->renderFrontendNoSpace());
    }


    public function testLazyLoadWithEmptyCaption()
    {
        $this->block->setVarValues(['align' => 'left', 'showCaption' => true]);
        $this->block->addExtraVar('image', (object) ['source' => 'luya.jpg', 'itemArray' => [ 'resolution_width' => 2, 'resolution_height' => 1]]);
        $this->block->setCfgValues(['lazyload' => 1]);

        $this->assertContainsTrimmed('<div class="image"><figure class="figure d-block text-left"><div class="lazyimage-wrapper figure-img img-fluid"><img class="js-lazyimage lazyimage figure-img img-fluid" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="luya.jpg" data-width="2" data-height="1" data-replace-placeholder="1"><div class="lazyimage-placeholder"><div style="display: block; height: 0px; padding-bottom: 50%;"></div><div class="loader"></div></div><noscript><img class="loaded figure-img img-fluid" src="luya.jpg" /></noscript></div></figure></div>', $this->renderFrontendNoSpace());
    }
}
