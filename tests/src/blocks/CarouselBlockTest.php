<?php

namespace luya\bootstrap4\tests\src\blocks;


use luya\bootstrap4\tests\src\BaseBootstrap4BlockTestCase;

class CarouselBlockTest extends BaseBootstrap4BlockTestCase
{
    public $blockClass = 'luya\bootstrap4\blocks\CarouselBlock';
    
    public function testAdminAndFrontendRender()
    {
        $this->assertContainsTrimmed('
            <div id="d41d8cd98f00b204e9800998ecf8427e" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner"></div>
                <a class="carousel-control-prev" href="#d41d8cd98f00b204e9800998ecf8427e" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#d41d8cd98f00b204e9800998ecf8427e" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>', $this->renderFrontendNoSpace());
    }
}
