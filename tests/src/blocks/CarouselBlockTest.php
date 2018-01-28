<?php

namespace luya\bootstrap4\tests\src\blocks;

use luya\testsuite\cases\CmsBlockTestCase;

class CarouselBlockTest extends CmsBlockTestCase
{
	public $blockClass = 'luya\bootstrap4\blocks\CarouselBlock';
	
     public function getConfigArray()
     {
         return [
             'id' => 'carouselBlockTest',
             'basePath' => dirname(__DIR__),
         ];
     }     
		     
     public function testAdminAndFrontendRender()
     {
    	$this->assertSame('<p>Removes spaces and br from frontend view.</p>', $this->renderFrontendNoSpace());
    	$this->assertSame('<p>Admin View</p>', $this->renderAdminNoSpace());
     }
}