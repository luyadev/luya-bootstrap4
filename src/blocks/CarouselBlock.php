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
                ['var' => 'images', 'label' => Module::t('block_carousel.items'), 'type' => self::TYPE_MULTIPLE_INPUTS, 'options' => [
                    ['var' => 'title', 'type' => self::TYPE_TEXT, 'label' => Module::t('block_carousel.title')],
                    ['var' => 'caption', 'type' => self::TYPE_TEXTAREA, 'label' => Module::t('block_carousel.caption')],
                    ['var' => 'image', 'type' => self::TYPE_IMAGEUPLOAD, 'label' => Module::t('block_carousel.image')],
                    ['var' => 'alt', 'type' => self::TYPE_TEXT, 'label' => Module::t('block_carousel.alt')],
                    ['var' => 'link', 'type' => self::TYPE_LINK, 'label' => Module::t('block_carousel.image_link')]
                ]],
                ['var' => 'controls', 'type' => self::TYPE_CHECKBOX, 'label' => Module::t('block_carousel.config_controls'), 'initvalue' => 1],
                ['var' => 'indicators', 'type' => self::TYPE_CHECKBOX, 'label' => Module::t('block_carousel.config_indicators'), 'initvalue' => 1],
                ['var' => 'crossfade', 'type' => self::TYPE_CHECKBOX, 'label' => Module::t('block_carousel.config_crossfade'), 'initvalue' => 1],
                ['var' => 'interval', 'type' => self::TYPE_NUMBER, 'label' => Module::t('block_carousel.config_interval')],
                ['var' => 'keyboard', 'type' => self::TYPE_CHECKBOX, 'label' => Module::t('block_carousel.config_keyboard'), 'initvalue' => 1],
                ['var' => 'pause', 'type' => self::TYPE_TEXT, 'label' => Module::t('block_carousel.config_pause')],
                ['var' => 'ride', 'type' => self::TYPE_TEXT, 'label' => Module::t('block_carousel.config_ride')],
                ['var' => 'wrap', 'type' => self::TYPE_CHECKBOX, 'label' => Module::t('block_carousel.config_wrap'), 'initvalue' => 1]
            ]
        ];
    }

    public function images($image = null)
    {
        $imagesInput = $image != null ? $image : $this->getVarValue('images', []);
        $images = [];
        foreach ($imagesInput as $item) {
            $images[] = [
                'image'             => isset($item['image']) ? BlockHelper::imageUpload($item['image'], false, true) : null,
                'alt'               => isset($item['alt']) ? $item['alt'] : 'no-alt-text-set',
                'title'             => isset($item['title']) ? $item['title'] : '',
                'caption'             => isset($item['caption']) ? $item['caption'] : '',
                'link'              => isset($item['link']) ? BlockHelper::linkObject($item['link']) : null,
            ];
        }

        return $images;
    }

    /**
     * {@inheritdoc}
     */
    public function extraVars()
    {
        return [
            'images' => $this->images(),
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
