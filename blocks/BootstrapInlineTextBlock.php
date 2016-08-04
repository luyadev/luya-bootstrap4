<?php

namespace bootstrap4\blocks;

use Yii;
use cms\helpers\TagParser;
use bootstrap4\Module;
use bootstrap4\blockgroups\BootstrapGroup;

/**
 * Bootstrap inline Block with Markdown text
 *
 * @author Silvan Hahn (silvan.hahn@zephir.ch)
 */
class BootstrapInlineTextBlock extends \cmsadmin\base\PhpBlock
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

    /**
     * @var int The cache lifetime for this block in seconds (3600 = 1 hour), only affects when cacheEnabled is true
     */
    public $cacheExpiration = 3600;

    public function name()
    {
        return Module::t('block_inlinetext.name');
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
                 ['var' => 'colsm', 'label' => Module::t('block_inlinetext.size-sm'), 'initvalue' => 'col-sm-12', 'type' => 'zaa-select', 'options' => [
                        ['value' => 'col-sm-12', 'label' => Module::t('block_inlinetext.size-full')]
                    ]
                 ],
                 ['var' => 'colmd', 'label' => Module::t('block_inlinetext.size-md'), 'initvalue' => 'col-md-6', 'type' => 'zaa-select', 'options' => [
                        ['value' => 'col-md-4', 'label' => '1/3'.' '.Module::t('block_inlinetext.size')],
                        ['value' => 'col-md-6', 'label' => '1/2'.' '.Module::t('block_inlinetext.size')],
                        ['value' => 'col-md-8', 'label' => '2/3'.' '.Module::t('block_inlinetext.size')],
                        ['value' => 'col-md-12', 'label' => Module::t('block_inlinetext.size-full')],

                    ]
                ],
                ['var' => 'collg', 'label' => 'Grösse Desktop', 'initvalue' => 'col-lg-4', 'type' => 'zaa-select', 'options' => [
                        ['value' => 'col-lg-4', 'label' => '1/3'.' '.Module::t('block_inlinetext.size')],
                        ['value' => 'col-lg-6', 'label' => '1/2'.' '.Module::t('block_inlinetext.size')],
                        ['value' => 'col-lg-8', 'label' => '2/3'.' '.Module::t('block_inlinetext.size')],
                        ['value' => 'col-lg-12', 'label' => Module::t('block_inlinetext.size-full')],
                    ]
                ],
                ['var' => 'text', 'label' => 'Text', 'type' => 'zaa-textarea'],
                ['var' => 'textType', 'label' => 'Textformat', 'initvalue' => 1, 'type' => 'zaa-select', 'options' => [
                        ['value' => 0, 'label' => 'Standard'],
                        ['value' => 1, 'label' => 'Markdown'],
                    ],
                ],
           ],
        ];
    }

    public function getFieldHelp()
    {
        return [
            'textType' => Module::t('block_inlinetext.help')
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

    /**
     * Return an array containg all extra vars. Those variables you can access in the Twig Templates via {{extras.*}}.
     */
    public function extraVars()
    {
        return [
            'text' => $this->getText(),
        ];
    }

    public function admin()
    {
        return $this->getText();
    }
}
