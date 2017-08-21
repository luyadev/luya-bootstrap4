<?php

namespace luya\bootstrap4;

use Yii;

/**
 * Bootstrap4 Module
 *
 * When adding this module to your configuration the bootstrap4 block will be added to your
 * cmsadministration by running the `import` command.
 *
 * @author Basil Suter <basil@nadar.io>
 */
class Module extends \luya\base\Module
{
    public $translations = [
        [
            'prefix' => 'bootstrap4*',
            'basePath' => '@bootstrap4/messages',
            'fileMap' => [
                'bootstrap4' => 'bootstrap4.php',
            ],
        ],
    ];

    /**
     * Translations for CMS Module.
     *
     * @param unknown $message
     * @param array $params
     */
    public static function t($message, array $params = [])
    {
        return Yii::t('bootstrap4', $message, $params);
    }
}
