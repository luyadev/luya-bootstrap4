<?php

namespace luya\bootstrap4;

/**
 *
 * @author Basil Suter <basil@nadar.io>
 */
class ActiveForm extends \yii\widgets\ActiveForm
{
    public $fieldClass = 'luya\bootstrap4\ActiveField';
    
    public $errorCssClass = 'has-danger';
    
    public $successCssClass = 'has-success';
}
