<?php

namespace bootstrap4\blocks;

use Yii;
use cms\helpers\TagParser;
use bootstrap4\blockgroups\BootstrapGroup;
use bootstrap4\Module;

/**
 * Positioning of images and mark down text based on Bootstrap 4 columns, image shapes are also available out of the box.
 * Please keep in mind, that Boostrap 4 needs to be installed in your project.
 *
 * @author Silvan Hahn (silvan.hahn@zephir.ch)
 */
class ImageTextBlock extends \cmsadmin\base\PhpBlock
{
    public $module = 'bootstrap4';

    /**
     * @var bool Choose whether a block can be cached trough the caching component. Be carefull with caching container blocks.
     */
    public $cacheEnabled = true;

    public function name()
    {
        return Module::t('block_image_text.block_name');;
    }

    public function getBlockGroup()
    {
        return BootstrapGroup::className();
    }

    public function icon()
    {
        return 'extension'; // choose icon from: http://materializecss.com/icons.html
    }

    public function config()
    {
        return [
           'vars' => [
               ['var' => 'imagePosition', 'label' => Module::t('block_image_text.image_position'), 'type' => 'zaa-select', 'initvalue'=>'left', 'options' => [
                       ['value' => 'left', 'label' => Module::t('block_image_text.left')],
                       ['value' => 'right', 'label' => Module::t('block_image_text.right')],
                       ['value' => 'centered', 'label' => Module::t('block_image_text.center')],
                   ],
               ],
               ['var' => 'imageShapes', 'label' => Module::t('block_image_text.image_shape'), 'initvalue' => 'img-noshape', 'type' => 'zaa-select', 'options' => [
                       ['value' => 'img-noshape', 'label' => Module::t('block_image_text.no_shape')],
                       ['value' => 'img-rounded', 'label' => Module::t('block_image_text.rounded_corners')],
                       ['value' => 'img-thumbnail', 'label' => Module::t('block_image_text.thumbnail')],
                       ['value' => 'img-circle', 'label' => Module::t('block_image_text.circle')],
                   ],
               ],
               ['var' => 'imageId', 'label' => Module::t('block_image_text.image'), 'type' => 'zaa-image-upload', 'options' => ['no_filter' => false]],
               ['var' => 'text', 'label' => 'Text', 'type' => 'zaa-textarea'],
               ['var' => 'textType', 'label' => 'Textformat', 'initvalue' => '0', 'type' => 'zaa-select', 'options' => [
                       ['value' => '0', 'label' => 'Standard'],
                       ['value' => '1', 'label' => 'Markdown'],
                   ],
               ],
           ],
        ];
    }
    public function getFieldHelp()
    {
        return [
            'textType' => Module::t('block_image_text.help')
        ];
    }

    public function getText()
    {
        $text = $this->getVarValue('text');

        if ($this->getVarValue('textType')) {
            return TagParser::convertWithMarkdown($text);
        }

        return $text;
    }

    private $_source = null;

    public function getImageSource()
    {
        if ($this->_source === null) {
            $img = Yii::$app->storage->getImage($this->getVarValue('imageId'), 0);
            $this->_source = $img ? $img->source : false;
        }

        return $this->_source;
    }

    /**
     * Return an array containg all extra vars. Those variables you can access in the Twig Templates via {{extras.*}}.
     */
    public function extraVars()
    {
        return [
            'imageId' => $this->zaaImageUpload($this->getVarValue('imageId')),
            'text' => $this->getText(),
        ];
    }


    /**
     * Available twig variables:
     * @param {{vars.imagePosition}}
     * @param {{extras.imageId}}
     * @param {{vars.imageId}}
     * @param {{vars.text}}
     */
    public function admin()
    {
        return
        '{% if vars.imagePosition == "left" %}'.
            '<div class="left-image">'.'<img src="{{extras.imageId.source}}" style="max-width:50%; float:left;" class="img-fluid {{vars.imagePosition}}" />'.'</div>'.
            '{% if vars.text is not empty %} <div class="right-text">'.'{{extras.text}}'.'</div>'.'{% endif %}'.
        '{% endif %}'.
        '{% if vars.imagePosition == "right" %}'.
            '<div class="right-image">'.'<img src="{{extras.imageId.source}}" style="max-width:50%; float:right;" class="img-fluid {{vars.imagePosition}}" />'.'</div>'.
            '{% if vars.text is not empty %} <div class="left-text">'.'{{extras.text}}'.'</div>'.'{% endif %}'.
        '{% endif %}'.
        '{% if vars.imagePosition == "centered" %}'.
            '<div class="center-image" style="text-align:center;">'.'<img src="{{extras.imageId.source}}" style="max-width:50%; float:none; clear:both;" class="img-fluid {{vars.imagePosition}}" />'.'</div>'.
            '{% if vars.text is not empty %} <div class="center-text">'.'{{extras.text}}'.'</div>'.'{% endif %}'.
        '{% endif %}'.
        '{% if vars.imageId is empty %}'.
            '<p>'. Module::t('block_image_text.no_image') .'</p>'.
        '{% endif %}'.
        '{% if vars.text is empty %}'.
            '<p>'. Module::t('block_image_text.no_text') .'</p>'.
        '{% endif %}';
    }
}
