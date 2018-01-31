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
    /**
     * @inheritdoc
     */
    public static function onLoad()
    {
        Yii::setAlias('@bootstrap4', static::staticBasePath());
        
        self::registerTranslation('bootstrap4*', static::staticBasePath() . '/messages', [
            'bootstrap4' => 'bootstrap4.php',
        ]);
    }

    /**
     * Translations
     *
     * @param string $message
     * @param array $params
     * @return string
     */
    public static function t($message, array $params = [])
    {
        return parent::baseT('bootstrap4', $message, $params);
    }
}
