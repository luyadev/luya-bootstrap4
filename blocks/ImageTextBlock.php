<?php

namespace bootstrap4\blocks;

use Yii;
use cms\helpers\TagParser;
use bootstrap4\blockgroups\BootstrapGroup;
use bootstrap4\Module;

/**
 * Block created with Luya Block Creator Version 1.0.0-beta8-dev at 02.08.2016 16:15
 */
class ImageTextBlock extends \cmsadmin\base\PhpBlock
{

    public $module = 'bootstrap4';

    /**
     * @var bool Choose whether block is a layout/container/segmnet/section block or not, Container elements will be optically displayed
     * in a different way for a better user experience. Container block will not display isDirty colorizing.
     */
    public $isContainer = false;

    /**
     * @var bool Choose whether a block can be cached trough the caching component. Be carefull with caching container blocks.
     */
    public $cacheEnabled = false;
    private $defaultMargin = '20px';

    /**
     * @var int The cache lifetime for this block in seconds (3600 = 1 hour), only affects when cacheEnabled is true
     */
    public $cacheExpiration = 3600;

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
               ['var' => 'imagePosition', 'label' => 'Bildposition', 'type' => 'zaa-select', 'initvalue'=>'pull-xs-left', 'options' => [
                       ['value' => 'pull-xs-left', 'label' => 'Links'],
                       ['value' => 'pull-xs-right', 'label' => 'Rechts'],
                       ['value' => 'm-x-auto d-block', 'label' => 'Zentriert'],
                   ],
               ],
               ['var' => 'imageShapes', 'label' => 'Bildformen', 'initvalue' => 0, 'type' => 'zaa-select', 'options' => [
                       ['value' => '0', 'label' => 'Keine Form'],
                       ['value' => '1', 'label' => 'Runde Ecken'],
                       ['value' => '2', 'label' => 'Thumbnail mit Rahmen'],
                       ['value' => '3', 'label' => 'Kreis'],
                   ],
               ],
               ['var' => 'imageId', 'label' => 'Bild', 'type' => 'zaa-image-upload', 'options' => ['no_filter' => false]],
               ['var' => 'text', 'label' => 'Text', 'type' => 'zaa-textarea'],
               ['var' => 'textType', 'label' => 'Textformat', 'initvalue' => 0, 'type' => 'zaa-select', 'options' => [
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
            'textType' => 'Hilfe',
        ];
    }

    public function getText()
    {
        $text = $this->getVarValue('text');

        if ($this->getCfgValue('textType')) {
            return TagParser::convertWithMarkdown($text);
        }
     return $text;
    }

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
        return '{% if vars.imagePosition == "pull-xs-left" %}'.
        '<div class="left-image">'.'<img src="{{extras.imageId.source}}" style="max-width:50%; float:left;" class="img-fluid {{vars.imagePosition}}" />'.
        '</div>'.
        '<div class="right-text">'.'{{extras.text}}'.
        '</div>'.
        '{% endif %}'.
        '{% if vars.imagePosition == "pull-xs-right" %}'.
        '<div class="right-image">'.'<img src="{{extras.imageId.source}}" style="max-width:50%; float:right;" class="img-fluid {{vars.imagePosition}}" />'.
        '</div>'.
        '<div class="left-text">'.'{{extras.text}}'.
        '</div>'.
        '{% endif %}'.
        '{% if vars.imagePosition == "m-x-auto d-block" %}'.
        '<div class="center-image" style="text-align:center;">'.'<img src="{{extras.imageId.source}}" style="max-width:50%; float:none; clear:both;" class="img-fluid {{vars.imagePosition}}" />'.
        '</div>'.
        '<div class="center-text">'.'{{extras.text}}'.
        '</div>'.
        '{% endif %}';
    }
}
