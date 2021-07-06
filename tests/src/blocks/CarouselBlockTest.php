<?php

namespace luya\bootstrap4\tests\src\blocks;

use Yii;
use luya\bootstrap4\tests\src\BaseBootstrap4BlockTestCase;
use luya\admin\image\Item;

class CarouselBlockTest extends BaseBootstrap4BlockTestCase
{
    public $blockClass = 'luya\bootstrap4\blocks\CarouselBlock';

    public function testWithoutImageArray()
    {
        $this->assertSameTrimmed('',
            $this->renderFrontendNoSpace()
        );

        $this->assertSameTrimmed('', $this->renderAdminNoSpace());
    }

    public function testEmptyImageArray()
    {
        $this->block->addExtraVar('images', []);

        $this->assertSameTrimmed(
            '',
            $this->renderFrontendNoSpace()
        );

        $this->assertSameTrimmed('', $this->renderAdminNoSpace());
    }

    public function testImageArrayWithEmptyImageInArray()
    {
        $this->block->addExtraVar('images', [
            []
        ]);

        $this->assertSameTrimmed(
            '',
            $this->renderFrontendNoSpace()
        );

        $this->assertSameTrimmed('', $this->renderAdminNoSpace());
    }

    public function testImageArrayWithEmptyImagesInArray()
    {
        $this->block->addExtraVar('images', [
            [],
            [],
            []
        ]);

        $this->assertSameTrimmed(
            '',
            $this->renderFrontendNoSpace()
        );

        $this->assertSameTrimmed('', $this->renderAdminNoSpace());
    }

    public function testImageArrayWithSingleImageInArray()
    {
        Yii::$app->storage->addDummyFile(['id' => 1]);
        Yii::$app->storage->insertDummyFiles();

        $this->block->addExtraVar('images', [
            [
                'image' => Item::create(['caption' => 'cap-title', 'file_id' => 1, 'filter_id' => 0]),
                'title' => 'title',
                'link' => 'foobar',
                'caption' => 'caption'
            ]
        ]);

        $this->assertSameTrimmed(
            '<div id="carousel_d41d8cd98f00b204e9800998ecf8427e" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="foobar" title="title">
                            <img class="d-block w-100" src="app_path/storage/http-path' . DIRECTORY_SEPARATOR . '0_6" alt="title">
                            <div class="carousel-caption">
                                <h5 class="carousel-caption-title">title</h5>
                                <p class="carousel-caption-text">caption</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>',
            $this->renderFrontendNoSpace()
        );

        $this->assertSameTrimmed('<div class="row"><div class="col"><img src="app_path/storage/http-path'. DIRECTORY_SEPARATOR .'0_6" class="img-fluid" /></div></div>', $this->renderAdminNoSpace());
    }

    public function testImageArrayWithEmptyFirstAndSingleImageInArray()
    {
        Yii::$app->storage->addDummyFile(['id' => 1]);
        Yii::$app->storage->insertDummyFiles();

        $this->block->addExtraVar('images', [
            [],
            [
                'image' => Item::create(['caption' => 'cap-title', 'file_id' => 1, 'filter_id' => 0]),
                'title' => 'title',
                'link' => 'foobar',
                'caption' => 'caption'
            ],
        ]);

        $this->assertSameTrimmed(
            '<div id="carousel_d41d8cd98f00b204e9800998ecf8427e" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="foobar" title="title">
                            <img class="d-block w-100" src="app_path/storage/http-path' . DIRECTORY_SEPARATOR . '0_6" alt="title">
                            <div class="carousel-caption">
                                <h5 class="carousel-caption-title">title</h5>
                                <p class="carousel-caption-text">caption</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>',
            $this->renderFrontendNoSpace()
        );

        $this->assertSameTrimmed('<div class="row"><div class="col"><img src="app_path/storage/http-path'. DIRECTORY_SEPARATOR .'0_6" class="img-fluid" /></div></div>', $this->renderAdminNoSpace());
    }

    public function testImageArrayWithMultipleImagesInArray()
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
        
        $this->assertSameTrimmed('<div id="carousel_d41d8cd98f00b204e9800998ecf8427e" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="foobar" title="title">
                        <img class="d-block w-100" src="app_path/storage/http-path'. DIRECTORY_SEPARATOR .'0_6" alt="title">
                        <div class="carousel-caption">
                            <h5 class="carousel-caption-title">title</h5>
                            <p class="carousel-caption-text">caption</p>
                        </div>
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="foobar" title="title">
                        <img class="d-block w-100" src="app_path/storage/http-path'. DIRECTORY_SEPARATOR .'0_6" alt="title">
                        <div class="carousel-caption">
                            <h5 class="carousel-caption-title">title</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>', $this->renderFrontendNoSpace());
        
        $this->assertSameTrimmed('<div class="row"><div class="col"><img src="app_path/storage/http-path'. DIRECTORY_SEPARATOR .'0_6" class="img-fluid" /></div><div class="col"><img src="app_path/storage/http-path'. DIRECTORY_SEPARATOR .'0_6" class="img-fluid" /></div></div>', $this->renderAdminNoSpace());
    }

    public function testImageArrayWithMultipleImagesAndEmptyImageInArray()
    {
        Yii::$app->storage->addDummyFile(['id' => 1]);
        Yii::$app->storage->addDummyFile(['id' => 2]);
        Yii::$app->storage->insertDummyFiles();

        $this->block->addExtraVar('images', [
            [],
            [
                'image' => Item::create(['caption' => 'caption',  'file_id' => 1, 'filter_id' => 0]),
                'title' => 'title',
                'caption' => 'caption',
                'link' => 'foobar',

            ],
            [],
            [
                'image' => Item::create(['caption' => 'caption',  'file_id' => 2, 'filter_id' => 0]),
                'title' => 'title',
                'link' => 'foobar',

            ]
        ]);

        $this->assertSameTrimmed('<div id="carousel_d41d8cd98f00b204e9800998ecf8427e" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="foobar" title="title">
                        <img class="d-block w-100" src="app_path/storage/http-path'. DIRECTORY_SEPARATOR .'0_6" alt="title">
                        <div class="carousel-caption">
                            <h5 class="carousel-caption-title">title</h5>
                            <p class="carousel-caption-text">caption</p>
                        </div>
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="foobar" title="title">
                        <img class="d-block w-100" src="app_path/storage/http-path'. DIRECTORY_SEPARATOR .'0_6" alt="title">
                        <div class="carousel-caption">
                            <h5 class="carousel-caption-title">title</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>', $this->renderFrontendNoSpace());

        $this->assertSameTrimmed('<div class="row"><div class="col"><img src="app_path/storage/http-path'. DIRECTORY_SEPARATOR .'0_6" class="img-fluid" /></div><div class="col"><img src="app_path/storage/http-path'. DIRECTORY_SEPARATOR .'0_6" class="img-fluid" /></div></div>', $this->renderAdminNoSpace());
    }

    public function testImageWithoutTitle()
    {
        Yii::$app->storage->addDummyFile(['id' => 1]);
        Yii::$app->storage->insertDummyFiles();

        $this->block->addExtraVar('images', [
            [
                'image' => Item::create(['caption' => 'cap-title', 'file_id' => 1, 'filter_id' => 0]),
                'link' => 'foobar',
                'caption' => 'caption'
            ]
        ]);

        $this->assertSameTrimmed(
            '<div id="carousel_d41d8cd98f00b204e9800998ecf8427e" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="foobar">
                            <img class="d-block w-100" src="app_path/storage/http-path' . DIRECTORY_SEPARATOR . '0_6">
                            <div class="carousel-caption">
                                <p class="carousel-caption-text">caption</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>',
            $this->renderFrontendNoSpace()
        );

        $this->assertSameTrimmed('<div class="row"><div class="col"><img src="app_path/storage/http-path'. DIRECTORY_SEPARATOR .'0_6" class="img-fluid" /></div></div>', $this->renderAdminNoSpace());
    }

    public function testImageWithEmptyTitle()
    {
        Yii::$app->storage->addDummyFile(['id' => 1]);
        Yii::$app->storage->insertDummyFiles();

        $this->block->addExtraVar('images', [
            [
                'image' => Item::create(['caption' => 'cap-title', 'file_id' => 1, 'filter_id' => 0]),
                'title' => '',
                'link' => 'foobar',
                'caption' => 'caption'
            ]
        ]);

        $this->assertSameTrimmed(
            '<div id="carousel_d41d8cd98f00b204e9800998ecf8427e" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="foobar">
                            <img class="d-block w-100" src="app_path/storage/http-path' . DIRECTORY_SEPARATOR . '0_6">
                            <div class="carousel-caption">
                                <p class="carousel-caption-text">caption</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>',
            $this->renderFrontendNoSpace()
        );

        $this->assertSameTrimmed('<div class="row"><div class="col"><img src="app_path/storage/http-path'. DIRECTORY_SEPARATOR .'0_6" class="img-fluid" /></div></div>', $this->renderAdminNoSpace());
    }

    public function testImageWithoutCaption()
    {
        Yii::$app->storage->addDummyFile(['id' => 1]);
        Yii::$app->storage->insertDummyFiles();

        $this->block->addExtraVar('images', [
            [
                'image' => Item::create(['caption' => 'cap-title', 'file_id' => 1, 'filter_id' => 0]),
                'title' => 'title',
                'link' => 'foobar'
            ]
        ]);

        $this->assertSameTrimmed(
            '<div id="carousel_d41d8cd98f00b204e9800998ecf8427e" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="foobar" title="title">
                            <img class="d-block w-100" src="app_path/storage/http-path' . DIRECTORY_SEPARATOR . '0_6" alt="title">
                            <div class="carousel-caption">
                                <h5 class="carousel-caption-title">title</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>',
            $this->renderFrontendNoSpace()
        );

        $this->assertSameTrimmed('<div class="row"><div class="col"><img src="app_path/storage/http-path'. DIRECTORY_SEPARATOR .'0_6" class="img-fluid" /></div></div>', $this->renderAdminNoSpace());
    }

    public function testImageWithEmptyCaption()
    {
        Yii::$app->storage->addDummyFile(['id' => 1]);
        Yii::$app->storage->insertDummyFiles();

        $this->block->addExtraVar('images', [
            [
                'image' => Item::create(['caption' => 'cap-title', 'file_id' => 1, 'filter_id' => 0]),
                'title' => 'title',
                'link' => 'foobar',
                'caption' => ''
            ]
        ]);

        $this->assertSameTrimmed(
            '<div id="carousel_d41d8cd98f00b204e9800998ecf8427e" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="foobar" title="title">
                            <img class="d-block w-100" src="app_path/storage/http-path' . DIRECTORY_SEPARATOR . '0_6" alt="title">
                            <div class="carousel-caption">
                                <h5 class="carousel-caption-title">title</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>',
            $this->renderFrontendNoSpace()
        );

        $this->assertSameTrimmed('<div class="row"><div class="col"><img src="app_path/storage/http-path'. DIRECTORY_SEPARATOR .'0_6" class="img-fluid" /></div></div>', $this->renderAdminNoSpace());
    }

    public function testImageWithoutLink()
    {
        Yii::$app->storage->addDummyFile(['id' => 1]);
        Yii::$app->storage->insertDummyFiles();

        $this->block->addExtraVar('images', [
            [
                'image' => Item::create(['caption' => 'cap-title', 'file_id' => 1, 'filter_id' => 0]),
                'title' => 'title',
                'caption' => 'caption'
            ]
        ]);

        $this->assertSameTrimmed(
            '<div id="carousel_d41d8cd98f00b204e9800998ecf8427e" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="app_path/storage/http-path' . DIRECTORY_SEPARATOR . '0_6" alt="title">
                        <div class="carousel-caption">
                            <h5 class="carousel-caption-title">title</h5>
                            <p class="carousel-caption-text">caption</p>
                        </div>
                    </div>
                </div>
            </div>',
            $this->renderFrontendNoSpace()
        );

        $this->assertSameTrimmed('<div class="row"><div class="col"><img src="app_path/storage/http-path'. DIRECTORY_SEPARATOR .'0_6" class="img-fluid" /></div></div>', $this->renderAdminNoSpace());
    }

    public function testImageWithEmptyLink()
    {
        Yii::$app->storage->addDummyFile(['id' => 1]);
        Yii::$app->storage->insertDummyFiles();

        $this->block->addExtraVar('images', [
            [
                'image' => Item::create(['caption' => 'cap-title', 'file_id' => 1, 'filter_id' => 0]),
                'title' => 'title',
                'link' => '',
                'caption' => 'caption'
            ]
        ]);

        $this->assertSameTrimmed(
            '<div id="carousel_d41d8cd98f00b204e9800998ecf8427e" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="app_path/storage/http-path' . DIRECTORY_SEPARATOR . '0_6" alt="title">
                        <div class="carousel-caption">
                            <h5 class="carousel-caption-title">title</h5>
                            <p class="carousel-caption-text">caption</p>
                        </div>
                    </div>
                </div>
            </div>',
            $this->renderFrontendNoSpace()
        );

        $this->assertSameTrimmed('<div class="row"><div class="col"><img src="app_path/storage/http-path'. DIRECTORY_SEPARATOR .'0_6" class="img-fluid" /></div></div>', $this->renderAdminNoSpace());
    }


    public function testImageWithoutImage()
    {
        $this->block->addExtraVar('images', [
            [
                'title' => 'title',
                'link' => 'foobar',
                'caption' => 'caption'
            ]
        ]);

        $this->assertSameTrimmed(
            '',
            $this->renderFrontendNoSpace()
        );

        $this->assertSameTrimmed('', $this->renderAdminNoSpace());
    }

//    /*
//     * @todo var value testing
//     */
//    public function testVars()
//    {
//        $this->block->setVarValues(['title' => 'my title', 'caption' => 'caption']);
//        $this->block->addExtraVar('image', (object) ['source' => 'image.jpg']);
//        $this->assertContainsTrimmed('
//            <div id="d41d8cd98f00b204e9800998ecf8427e" class="carousel slide" data-ride="carousel">
//                <div class="carousel-inner">
//                    <div class="carousel-item active">
//                        <img class="d-block w-100" src="image.jpg" alt="my title">
//                        <div class="carousel-caption d-none d-md-block">
//                            <h5>my title</h5>
//                            <p>caption</p>
//                        </div>
//                    </div>
//                </div>
//                <a class="carousel-control-prev" href="#d41d8cd98f00b204e9800998ecf8427e" role="button" data-slide="prev">
//                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
//                    <span class="sr-only">Previous</span>
//                </a>
//                <a class="carousel-control-next" href="#d41d8cd98f00b204e9800998ecf8427e" role="button" data-slide="next">
//                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
//                    <span class="sr-only">Next</span>
//                </a>
//            </div>', $this->renderFrontendNoSpace());
//        $this->assertContainsTrimmed('<div><img src="image.jpg" class="img-fluid" /></div>', $this->renderAdminNoSpace());
//    }

    public function testIndicatorConfig()
    {
        Yii::$app->storage->addDummyFile(['id' => 1]);
        Yii::$app->storage->addDummyFile(['id' => 2]);
        Yii::$app->storage->insertDummyFiles();

        $this->block->setCfgValues(['indicators' => true]);

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
                'link' => 'foobar'
            ]
        ]);

        $this->assertSameTrimmed('<div id="carousel_d41d8cd98f00b204e9800998ecf8427e" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="foobar" title="title">
                        <img class="d-block w-100" src="app_path/storage/http-path'. DIRECTORY_SEPARATOR .'0_6" alt="title">
                        <div class="carousel-caption">
                            <h5 class="carousel-caption-title">title</h5>
                            <p class="carousel-caption-text">caption</p>
                        </div>
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="foobar" title="title">
                        <img class="d-block w-100" src="app_path/storage/http-path'. DIRECTORY_SEPARATOR .'0_6" alt="title">
                        <div class="carousel-caption">
                            <h5 class="carousel-caption-title">title</h5>
                        </div>
                    </a>
                </div>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#carousel_d41d8cd98f00b204e9800998ecf8427e" data-slide-to="1" class="active"></li>
                <li data-target="#carousel_d41d8cd98f00b204e9800998ecf8427e" data-slide-to="2"></li>
            </ol>
        </div>', $this->renderFrontendNoSpace());

        $this->assertSameTrimmed('<div class="row"><div class="col"><img src="app_path/storage/http-path'. DIRECTORY_SEPARATOR .'0_6" class="img-fluid" /></div><div class="col"><img src="app_path/storage/http-path'. DIRECTORY_SEPARATOR .'0_6" class="img-fluid" /></div></div>', $this->renderAdminNoSpace());
    }

    public function testIndicatorConfigurationWithOneImage()
    {
        Yii::$app->storage->addDummyFile(['id' => 1]);
        Yii::$app->storage->insertDummyFiles();

        $this->block->setCfgValues(['indicators' => true]);

        $this->block->addExtraVar('images', [
            [
                'image' => Item::create(['caption' => 'caption',  'file_id' => 1, 'filter_id' => 0]),
                'title' => 'title',
                'caption' => 'caption',
                'link' => 'foobar',
            ]
        ]);

        $this->assertSameTrimmed('<div id="carousel_d41d8cd98f00b204e9800998ecf8427e" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="foobar" title="title">
                        <img class="d-block w-100" src="app_path/storage/http-path'. DIRECTORY_SEPARATOR .'0_6" alt="title">
                        <div class="carousel-caption">
                            <h5 class="carousel-caption-title">title</h5>
                            <p class="carousel-caption-text">caption</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>', $this->renderFrontendNoSpace());

        $this->assertSameTrimmed('<div class="row"><div class="col"><img src="app_path/storage/http-path'. DIRECTORY_SEPARATOR .'0_6" class="img-fluid" /></div></div>', $this->renderAdminNoSpace());
    }

    /*
     * @todo test other configs
     */

    public function testLazyLoadConfiguration()
    {
        Yii::$app->storage->addDummyFile(['id' => 1]);
        Yii::$app->storage->insertDummyFiles();
        $this->block->setCfgValues(['lazyload' => 1]);

        $this->block->addExtraVar('images', [
            [
                'image' => Item::create(['caption' => 'cap-title', 'file_id' => 1, 'filter_id' => 0, 'resolution_width' => 2, 'resolution_height' => 1]),
                'title' => 'title',
                'link' => 'foobar',
                'caption' => 'caption'
            ]
        ]);

        $this->assertSameTrimmed(
            '<div id="carousel_d41d8cd98f00b204e9800998ecf8427e" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="foobar" title="title">
                            <div class="lazyimage-wrapper d-block w-100">
                                <img class="js-lazyimage lazyimage d-block w-100" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="title" title="title" data-src="app_path/storage/http-path'. DIRECTORY_SEPARATOR .'0_6" data-width="2" data-height="1" data-replace-placeholder="1">
                                <div class="lazyimage-placeholder">
                                    <div style="display: block; height: 0px; padding-bottom: 50%;"></div>
                                    <div class="loader"></div>
                                </div>
                                <noscript>
                                    <img class="loaded d-block w-100" src="app_path/storage/http-path'. DIRECTORY_SEPARATOR .'0_6" />
                                </noscript>
                            </div>
                            <div class="carousel-caption">
                                <h5 class="carousel-caption-title">title</h5>
                                <p class="carousel-caption-text">caption</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>',
            $this->renderFrontendNoSpace()
        );
    }
    
    public function testBlockName()
    {
        $this->app->language = 'de';
        $this->assertSame('Carousel', $this->block->name());
    }
}
