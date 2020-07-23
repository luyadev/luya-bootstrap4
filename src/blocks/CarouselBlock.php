<?php

namespace luya\bootstrap4\blocks;

use luya\bootstrap4\blockgroups\BootstrapGroup;
use luya\bootstrap4\Module;
use luya\cms\helpers\BlockHelper;
use luya\bootstrap4\BaseBootstrap4Block;
use luya\helpers\Json;

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
                    ['var' => 'link', 'type' => self::TYPE_LINK, 'label' => Module::t('block_carousel.image_link')]
                ]],
            ],
            'cfgs' => [
                ['var' => 'blockCssClass', 'type' => self::TYPE_TEXT, 'label' => Module::t('block_carousel.config_block_css_class')],
                ['var' => 'captionCssClass', 'type' => self::TYPE_TEXT, 'label' => Module::t('block_carousel.config_caption_css_class')],
                ['var' => 'controls', 'type' => self::TYPE_CHECKBOX, 'label' => Module::t('block_carousel.config_controls'), 'initvalue' => 1],
                ['var' => 'indicators', 'type' => self::TYPE_CHECKBOX, 'label' => Module::t('block_carousel.config_indicators'), 'initvalue' => 1],
                ['var' => 'crossfade', 'type' => self::TYPE_CHECKBOX, 'label' => Module::t('block_carousel.config_crossfade'), 'initvalue' => 1],
                ['var' => 'interval', 'type' => self::TYPE_NUMBER, 'label' => Module::t('block_carousel.config_interval')],
                ['var' => 'keyboard', 'type' => self::TYPE_CHECKBOX, 'label' => Module::t('block_carousel.config_keyboard'), 'initvalue' => 1],
                ['var' => 'pause', 'type' => self::TYPE_TEXT, 'label' => Module::t('block_carousel.config_pause')],
                ['var' => 'ride', 'type' => self::TYPE_TEXT, 'label' => Module::t('block_carousel.config_ride')],
                ['var' => 'wrap', 'type' => self::TYPE_CHECKBOX, 'label' => Module::t('block_carousel.config_wrap'), 'initvalue' => 0],
                ['var' => 'row', 'type' => self::TYPE_CHECKBOX, 'label' => Module::t('block_carousel.config_row'), 'initvalue' => 0],
                ['var' => 'lazyload', 'label' => Module::t('block_carousel.lazyload'), 'type' => self::TYPE_CHECKBOX]
            ]
        ];
    }

    public function getFieldHelp()
    {
        return [
            'blockCssClass' => 'Adds a class to the root contianer of the carousel.',
            'captionCssClass' => 'Adds a class to the carousel item caption element.',
            'controls' => 'Adds the previous and next controls arrows on the left and right side of the image.',
            'indicators' => 'Indicators are additional controls which displays all slides with an indicator which is clickable. The indicator is placed in the middle of the image.',
            'crossfade' => 'Add crossfase to your carousel to animate slides with a fade transition instead of a slide.',
            'interval' => 'The amount of time to delay between automatically cycling an item. If false, carousel will not automatically cycle.',
            'keyboard' => 'Whether the carousel should react to keyboard events.',
            'pause' => 'If set to "hover", pauses the cycling of the carousel on mouseenter and resumes the cycling of the carousel on mouseleave. If set to false, hovering over the carousel won\'t pause it. On touch-enabled devices, when set to "hover", cycling will pause on touchend (once the user finished interacting with the carousel) for two intervals, before automatically resuming. Note that this is in addition to the above mouse behavior.',
            'ride' => 'Autoplays the carousel after the user manually cycles the first item. If "carousel", autoplays the carousel on load.',
            'wrap' => 'Whether the carousel should cycle continuously or have hard stops.',
            "row" => 'Adds the row class to the carousel container.',
        ];
    }

    /**
     * Get all carousel images (slides)
     *
     * @return array images
     */
    public function images()
    {
        $images = [];
        foreach ($this->getVarValue('images', []) as $item) {
            $image = BlockHelper::imageUpload($item['image'], false, true);
            if ($image) {
                $images[] = [
                    'image' => $image,
                    'title' => isset($item['title']) ? $item['title'] : null,
                    'caption' => isset($item['caption']) ? $item['caption'] : null,
                    'link' => isset($item['link'])  ? BlockHelper::linkObject($item['link']) : null,
                ];
            }
        }
        return $images;
    }

    /**
     * Returns the carousel javascript configuration
     *
     * @return string Json encoded configuration
     */
    public function getJsConfig()
    {
        return Json::encode([
            'interval' => $this->getCfgValue('interval', 5000),
            'keyboard' => $this->getCfgValue('keyboard', 1) == 1 ? true : false,
            'pause' => $this->getCfgValue('pause', 'hover'),
            'ride' => $this->getCfgValue('ride', false),
            'wrap' => $this->getCfgValue('wrap', 1) == 1 ? true : false,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function extraVars()
    {
        return [
            'images' => $this->images(),
            'id' => 'carousel_'.md5($this->getEnvOption('id')),
            'jsConfig' => $this->getJsConfig()
        ];
    }
    
    /**
     * @inheritdoc
     */
    // Todo: Needs adjustment to display correct
    public function admin()
    {
        return '
        {% if extras.images %}
            {% set hasImage = false %}
            {% for image in extras.images %}
                {% if image.image.source %}
                    {% set hasImage = true %}
                {% endif %}
            {% endfor %}
            {% if hasImage %}
                <div class="row">
                    {% for image in extras.images %}
                        {% if image.image.source %}
                            <div class="col">
                                  <img src="{{image.image.source}}" class="img-fluid" />
                            </div>
                        {% endif %}
                    {% endfor %}
                </div>
            {% endif %}
        {% endif %}';
    }
}
