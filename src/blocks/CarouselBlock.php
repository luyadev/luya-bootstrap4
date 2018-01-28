<?php

namespace luya\bootstrap4\blocks;

use luya\cms\base\PhpBlock;
use luya\bootstrap4\blockgroups\BootstrapGroup;
use luya\bootstrap4\Module;
use luya\cms\helpers\BlockHelper;

/**
 * Bootstrap 4 Carousel Component.
 * 
 * @author Basil Suter <basil@nadar.io>
 */
class CarouselBlock extends PhpBlock
{
	public $module = 'bootstrap4';
	
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
				['type' => self::TYPE_TEXT, 'var' => 'title', 'label' => 'Title'],
				['type' => self::TYPE_TEXTAREA, 'var' => 'caption', 'label' => 'Caption'],
				['type' => self::TYPE_IMAGEUPLOAD, 'var' => 'image', 'label' => 'IMage']
			]
		];
	}
	
	public function extraVars()
	{
		return [
			'image' => BlockHelper::imageUpload($this->getVarValue('image'), false, true),
			'id' => md5($this->getEnvOption('blockId')),
		];
	}
	
	public function admin()
	{
		return 'Bootstrap 4 Carousel Container';
	}
}