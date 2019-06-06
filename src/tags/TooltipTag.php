<?php

namespace luya\bootstrap4\tags;

use luya\tag\BaseTag;
use luya\web\View;
use yii\helpers\Html;

/**
 * Bootstrap 4 Tooltip Tag.
 *
 * Usage either trough add the module to the config or link the tag directly:
 *
 * ```php
 * 'tags' => [
 *     'tooltip' => ['class' => 'luya\bootstrap4\tags\TooltipTag'],
 * ],
 * ```
 *
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.0
 */
class TooltipTag extends BaseTag
{
    /**
     * @var string Whether it should possition: top, bottom, left, right. You can configure this while setup the tag.
     */
    public $position = 'top';
  
    /**
     * @inheritDoc
     */
    public function init()
    {
        parent::init();
        $this->view->registerJs('$(\'[data-toggle="tooltip"]\').tooltip()', View::POS_READY);
    }

    /**
     * @inheritDoc
     */
    public function example()
    {
        return 'tooltip[Tooltip on Top](This is the tooltip text!)';
    }
    
    /**
     * @inheritDoc
     */
    public function readme()
    {
        return 'Generate a Tooltip element over a text (span) Element.';
    }

    /**
     * @inheritDoc
     */
    public function parse($value, $sub)
    {
        return Html::tag('span', $value, [
            'data-toggle' => 'tooltip',
            'title' => $sub,
            'data-placement' => $this->position,
            'class' => 'tooltip-info-span',
        ]);
    }
}
