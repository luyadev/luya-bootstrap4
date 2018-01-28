<?php

namespace luya\bootstrap4\blocks;

use luya\cms\base\PhpBlock;
use luya\bootstrap4\blockgroups\BootstrapGroup;
use luya\bootstrap4\Module;

/**
 * Bootstrap 4 Carousel Component.
 * 
 * @author Basil Suter <basil@nadar.io>
 */
class CarouselBlock extends PhpBlock
{
	public $module = 'bootstrap4';
	
	public $isContainer = true;
	
	public function name()
	{
		return Module::t('carousel_block_name');
	}
	
	public function blockGroup()
	{
		return BootstrapGroup::class;
	}
	
	public function icon()
	{
		return 'view_carousel';
	}
	
	public function config()
	{
		return [
			'vars' => [
				['type' => self::TYPE_TEXT, 'var' => 'title'],
				['type' => self::TYPE_TEXTAREA, 'var' => 'caption'],
				['type' => self::TYPE_IMAGEUPLOAD, 'var' => 'image']
			]
		];
	}
	
	public function admin()
	{
		return 'Bootstrap 4 Carousel Container';
	}
}