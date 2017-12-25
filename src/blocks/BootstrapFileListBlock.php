<?php

namespace luya\bootstrap4\blocks;

use luya\cms\helpers\BlockHelper;
use luya\bootstrap4\Module;
use luya\bootstrap4\blockgroups\BootstrapGroup;

/**
 * Block created with Luya Block Creator Version 1.0.0-beta6-dev at 02.08.2016 16:34
 */
class BootstrapFileListBlock extends \luya\cms\base\PhpBlock
{
    public $module = 'bootstrap4';
    /**
     * @var bool Choose whether block is a layout/container/segmnet/section block or not, Container elements will be optically displayed
     * in a different way for a better user experience. Container block will not display isDirty colorizing.
     */
    public $isContainer = false;

    /**
     * @var bool Choose whether a block can be cached trough the caching component. Be careful with caching container blocks.
     */
    public $cacheEnabled = false;

    /**
     * @var int The cache lifetime for this block in seconds (3600 = 1 hour), only affects when cacheEnabled is true
     */
    public $cacheExpiration = 3600;

    public function name()
    {
        return Module::t('block_file_list.block_name');
    }

    public function blockGroup()
    {
        return BootstrapGroup::className();
    }

    public function icon()
    {
        return 'view_list';
    }

    public function config()
    {
        return [
            'vars' => [
                ['var' => 'files', 'label' => Module::t('block_file_list.files_label'), 'type' => 'zaa-file-array-upload'],
            ],
            'cfgs' => [
                ['var' => 'showType', 'label' => Module::t('block_file_list.show_type_label'), 'initvalue' => 0, 'type' => 'zaa-checkbox'],
                ['var' => 'showTypeIcon', 'label' => Module::t('block_file_list.show_type_icon'), 'initvalue' => 0, 'type' => 'zaa-checkbox'],
                ['var' => 'showFileSize', 'label' => Module::t('block_file_list.show_file_size'), 'initvalue' => 0, 'type' => 'zaa-checkbox'],
            ],
        ];
    }

    /**
     * Return an array containing all extra vars. Those variables you can access in the Twig Templates via {{extras.*}}.
     */
    public function extraVars()
    {
        return [
            'fileList' => BlockHelper::fileArrayUpload($this->getVarValue('files')),
        ];
    }

    public function admin()
    {
        return 'Dateien';
    }
}
