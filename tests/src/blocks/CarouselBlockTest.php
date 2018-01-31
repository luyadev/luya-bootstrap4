<?php

namespace luya\bootstrap4\tests\src\blocks;


use luya\bootstrap4\tests\src\BaseBootstrap4BlockTestCase;

class CarouselBlockTest extends BaseBootstrap4BlockTestCase
{
    public $blockClass = 'luya\bootstrap4\blocks\CarouselBlock';
    
    public function testEmptyFrontend()
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
        
        $this->assertSame('', $this->renderAdminNoSpace());
    }
    
    public function testVarsFrontend()
    {
        $this->block->setVarValues(['title' => 'my title', 'caption' => 'caption']);
        $this->block->addExtraVar('image', (object) ['source' => 'image.jpg']);
        
        $this->assertContainsTrimmed('
            <div id="d41d8cd98f00b204e9800998ecf8427e" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="image.jpg" alt="my title">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>my title</h5>
                            <p>caption</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#d41d8cd98f00b204e9800998ecf8427e" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#d41d8cd98f00b204e9800998ecf8427e" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>', $this->renderFrontendNoSpace());
        
        
        $this->assertContainsTrimmed('<div><img src="image.jpg" class="img-fluid" /></div>', $this->renderAdminNoSpace());
    }
    
    public function testBlockName()
    {
        $this->app->language = 'de';
        $this->assertSame('Carousel', $this->block->name());
    }
}
