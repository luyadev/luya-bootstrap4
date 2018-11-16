<?php

namespace luya\bootstrap4\tests\src\blocks;


use Yii;
use luya\bootstrap4\tests\src\BaseBootstrap4BlockTestCase;
use luya\admin\image\Item;

class CarouselBlockTest extends BaseBootstrap4BlockTestCase
{
    public $blockClass = 'luya\bootstrap4\blocks\CarouselBlock';

    /**
     * Test without anything in image array.
     * Should therefore not output anything.
     */
    public function testWithoutImageInArray()
    {
        $this->assertSame('', $this->renderFrontendNoSpace());
        
        $this->assertSame('', $this->renderAdminNoSpace());
    }

    /**
     * Test with one image item without image in array.
     * Default configuration.
     * @todo Image item without image test
     * @todo Add admin test
     */
    public function testOneImageItemWithoutImageInArray()
    {
        Yii::$app->storage->addDummyFile(['id' => 1]);
        Yii::$app->storage->insertDummyFiles();
        
        $this->block->addExtraVar('images', [
            [
                'image' => Item::create(['caption' => 'cap-title', 'file_id' => 1, 'filter_id' => 0]),
                'title' => 'title',
                'link' => 'foobar',
                
            ]
        ]);

        $this->assertSameTrimmed(
            '<div id="d41d8cd98f00b204e9800998ecf8427e" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                            <img class="d-block w-100" src="app_path/storage/http-path/0_6" alt="cap-title">
                        <div class="carousel-caption d-none d-md-block">
                        <h5>title</h5>
                        <p>cap-title</p>
                        </div>
                    </div>
                </div>
            </div>', $this->renderFrontendNoSpace());
    }

    /**
     * Test with single image in array.
     * Default configuration.
     * @todo single image test
     * @todo Add admin test
     */
    public function testSingleImageInArray()
    {

    }

    /**
     * Test with multiple images in array.
     * Default configuration.
     * @todo multiple images test
     * @todo Add admin test
     */
    public function testMultipleImagesInArray()
    {
        Yii::$app->storage->addDummyFile(['id' => 1]);
        Yii::$app->storage->addDummyFile(['id' => 2]);
        Yii::$app->storage->insertDummyFiles();
        
        $this->block->addExtraVar('images', [
            [
                'image' => Item::create(['caption' => 'caption',  'file_id' => 1, 'filter_id' => 0]),
                'title' => 'title',
                'caption' => 'caption',
                'link' => 'foobar',
                
            ],
            [
                'image' => Item::create(['caption' => 'caption',  'file_id' => 2, 'filter_id' => 0]),
                'title' => 'title',
                'link' => 'foobar',
                
            ]
        ]);
        
        $this->assertSameTrimmed('

    <div id="d41d8cd98f00b204e9800998ecf8427e" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="app_path/storage/http-path/0_6" alt="caption">
                <div class="carousel-caption d-none d-md-block">
                    <h5>title</h5><p>caption</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="app_path/storage/http-path/0_6" alt="caption">
                <div class="carousel-caption d-none d-md-block">
                    <h5>title</h5><p>caption</p>
                </div>
            </div>
        </div>
    </div>
            
', $this->renderFrontendNoSpace());
        
        $this->assertSameTrimmed('<div class="row"><div class="col"><img src="app_path/storage/http-path/0_6" class="img-fluid" /></div><div class="col"><img src="app_path/storage/http-path/0_6" class="img-fluid" /></div></div>', $this->renderAdminNoSpace());
    }

    /**
     * Test vars
     * @todo correct vars test
     * @todo Add admin test
     */
    public function testVars()
    {
        /*
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
        */
    }

    /**
     * Test indicator configuration
     * @todo indicator configuration test
     * @todo Add admin test
     */
    public function testIndicatorConfiguration()
    {

    }

    /**
     * Test controls configuration
     * @todo controls configuration test
     * @todo Add admin test
     */
    public function testControlsConfiguration()
    {

    }

    /**
     * Test crossfade configuration
     * @todo crossfade configuration test
     * @todo Add admin test
     */
    public function testCrossfadeConfiguration()
    {

    }

    /**
     * Test row configuration
     * @todo: row configuration test
     * @todo Add admin test
     */
    public function testRowConfiguration()
    {

    }
    
    public function testBlockName()
    {
        $this->app->language = 'de';
        $this->assertSame('Carousel', $this->block->name());
    }
}
