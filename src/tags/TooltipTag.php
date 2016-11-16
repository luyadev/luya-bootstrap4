<?php

namespace luya\bootstrap4\tags;

use luya\tag\BaseTag;
use luya\web\View;
use yii\helpers\Html;

class TooltipTag extends BaseTag
{
    public $position = 'top';
  
    public function init()
    {
        parent::init();
        $this->view->registerJs('$(\'[data-toggle="tooltip"]\').tooltip()', View::POS_READY);
    }
    
    public function readme()
    {
        return 'Generate a Tooltip element over a text (span) Element.';
    }

    public function parse($value, $sub)
    {
        return Html::tag('span', $value, ['data-toggle' => 'tooltip', 'title' => $sub, 'data-placement' => $this->position]);
    }
}
