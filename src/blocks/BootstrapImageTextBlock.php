<?php

namespace luya\bootstrap4\blocks;

use Yii;
use luya\cms\helpers\BlockHelper;
use luya\TagParser;
use luya\bootstrap4\blockgroups\BootstrapGroup;
use luya\bootstrap4\Module;

/**
 * Positioning of images and mark down text based on Bootstrap 4 columns, image shapes are also available out of the box.
 * Please keep in mind, that Boostrap 4 needs to be installed in your project.
 *
 * @author Silvan Hahn (silvan.hahn@zephir.ch)
 */
class BootstrapImageTextBlock extends \luya\cms\base\PhpBlock
{
    public $module = 'bootstrap4';

    /**
     * @var bool Choose whether a block can be cached trough the caching component. Be carefull with caching container blocks.
     */
    public $cacheEnabled = true;

    public function name()
    {
        return Module::t('block_image_text.block_name');
    }

    public function blockGroup()
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
               ['var' => 'imageCaption', 'label' => Module::t('block_image_text.image.caption'), 'type' => 'zaa-text'],
               ['var' => 'text', 'label' => 'Text', 'type' => 'zaa-textarea'],
               ['var' => 'textType', 'label' => 'Textformat', 'initvalue' => 1, 'type' => 'zaa-select', 'options' => [
                       ['value' => 0, 'label' => 'Standard'],
                       ['value' => 1, 'label' => 'Markdown'],
                   ],
               ],

               ['var' => 'link', 'label' => Module::t('block_image_text.link'), 'type' => 'zaa-link'],
               ['var' => 'file', 'label' => Module::t('block_image_text.file'), 'type' => 'zaa-file-upload'],
               ['var' => 'fileDownload', 'label' => Module::t('block_image_text.file_download'), 'type' => 'zaa-checkbox'],
           ],

           'cfgs' => [

               ['var' => 'imageWidth', 'label' => Module::t('block_image_text.image.width'), 'initvalue' => '50%', 'type' => 'zaa-select', 'options' => [
                       ['value' => '8.3333%', 'label' => '1/12'],
                       ['value' => '16.6666%', 'label' => '2/12'],
                       ['value' => '25%', 'label' => '3/12'],
                       ['value' => '33.3333%', 'label' => '4/12'],
                       ['value' => '41.6666%', 'label' => '5/12'],
                       ['value' => '50%', 'label' => '6/12'],
                       ['value' => '58.333%', 'label' => '7/12'],
                       ['value' => '66.6666%', 'label' => '8/12'],
                       ['value' => '75%', 'label' => '9/12'],
                       ['value' => '83.3333%', 'label' => '10/12'],
                       ['value' => '91.666%', 'label' => '11/12'],
                       ['value' => '100%', 'label' => '12/12'],
                   ],

                ],

             ['var' => 'imageCaptionVisibility', 'label' => Module::t('block_image_text.image.caption.visibility'), 'initvalue'=>'1', 'type' => 'zaa-checkbox'],

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
            $this->_source = $img ? $img->httpSource : false;
        }

        return $this->_source;
    }

    public function getLinkTarget()
    {
        $linkData = $this->getVarValue('link', null);
        $data = null;

        if ($linkData) {
            if ($linkData) {
                if ($linkData['type'] == '1') {
                    $menu = Yii::$app->menu->find()->where(['nav_id' => $linkData['value']])->one();
                    if ($menu) {
                        $data = $menu->getLink();
                    }
                }

                if ($linkData['type'] == '2') {
                    $data = $linkData['value'];
                }
            }

            return $data;
        }
    }

    public function getFileUrl()
    {
        $fileData = BlockHelper::fileUpload($this->getVarValue('file'));
        $data = null;

        if ($fileData) {
            $data = $fileData;
        }

        return $data;
    }

    /**
     * Return an array containg all extra vars. Those variables you can access in the Twig Templates via {{extras.*}}.
     */
    public function extraVars()
    {
        return [
            'link' => $this->getLinkTarget(),
            'file' => $this->getFileUrl(),
            'imageId' => BlockHelper::imageUpload($this->getVarValue('imageId')),
            'text' => $this->getText(),
            'thumbnail' => BlockHelper::imageUpload($this->getVarValue('imageId'), 'small-thumbnail'),
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
            '<div class="left-image">'.'<img src="{{extras.thumbnail.source}}" style="max-width:50%; float:left;" class="img-fluid {{vars.imagePosition}}" />'.'</div>'.
            '{% if vars.text is not empty %} <div class="right-text">'.'{{extras.text}}'.'</div>'.'{% endif %}'.
        '{% endif %}'.
        '{% if vars.imagePosition == "right" %}'.
            '<div class="right-image">'.'<img src="{{extras.thumbnail.source}}" style="max-width:50%; float:right;" class="img-fluid {{vars.imagePosition}}" />'.'</div>'.
            '{% if vars.text is not empty %} <div class="left-text">'.'{{extras.text}}'.'</div>'.'{% endif %}'.
        '{% endif %}'.
        '{% if vars.imagePosition == "centered" %}'.
            '<div class="center-image" style="text-align:center;">'.'<img src="{{extras.thumbnail.source}}" style="max-width:50%; float:none; clear:both;" class="img-fluid {{vars.imagePosition}}" />'.'</div>'.
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
