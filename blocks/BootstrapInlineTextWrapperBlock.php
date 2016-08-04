<?php

namespace bootstrap4\blocks;

use Yii;
use bootstrap4\blockgroups\BootstrapGroup;
use bootstrap4\Module;
/**
 * Block created with Luya Block Creator Version 1.0.0-beta8-dev at 04.08.2016 12:19
 */
class BootstrapInlineTextWrapperBlock extends \cmsadmin\base\PhpBlock
{

    public $module = 'bootstrap4';

    /**
     * @var bool Choose whether block is a layout/container/segmnet/section block or not, Container elements will be optically displayed
     * in a different way for a better user experience. Container block will not display isDirty colorizing.
     */
    public $isContainer = true;

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
        return Module::t('block_inline_wrapper.name');
    }
    public function getBlockGroup() {
        return BootstrapGroup::className();
    }

    public function icon()
    {
        return 'extension'; // choose icon from: http://materializecss.com/icons.html
    }

    public function config()
    {
        return [
           'placeholders' => [
               ['var' => 'textblocks', 'label' => Module::t('block_inline_wrapper.label')],
           ],
        ];
    }

    /**
     * Return an array containg all extra vars. Those variables you can access in the Twig Templates via {{extras.*}}.
     */
    public function extraVars()
    {
        return [
        ];
    }


    /**
     * Available twig variables:
     * @param {{placeholders.textblock}}
     */
    public function Admin()
    {
        return '';
    }
}
