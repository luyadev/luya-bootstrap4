<?php

namespace luya\bootstrap4\blocks;

use luya\bootstrap4\blockgroups\BootstrapGroup;
use luya\bootstrap4\Module;
use luya\cms\helpers\BlockHelper;
use luya\bootstrap4\BaseBootstrap4Block;

/**
 * Bootstrap 4 Carousel Component.
 *
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.0
 */
class CarouselBlock extends BaseBootstrap4Block
{
    public $module = 'bootstrap4';
    
    /**
     * @inheritdoc
     */
    public function name()
    {
        return Module::t('block_carousel.block_name');
    }
    
    /**
     * @inheritdoc
     */
    public function blockGroup()
    {
        return BootstrapGroup::class;
    }
    
    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'view_carousel';
    }
    
    /**
     * @inheritdoc
     */
    public function config()
    {
        return [
            'vars' => [
                ['type' => self::TYPE_TEXT, 'var' => 'title', 'label' => Module::t('block_carousel.title')],
                ['type' => self::TYPE_TEXTAREA, 'var' => 'caption', 'label' => Module::t('block_carousel.caption')],
                ['type' => self::TYPE_IMAGEUPLOAD, 'var' => 'image', 'label' => Module::t('block_carousel.image')]
            ]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function extraVars()
    {
        return [
            'image' => BlockHelper::imageUpload($this->getVarValue('image'), false, true),
            'id' => md5($this->getEnvOption('blockId')),
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function admin()
    {
        return '{% if extras.image %}<div>
              <img src="{{extras.image.source}}" class="img-fluid" />
      </div>{% endif %}';
    }
}
