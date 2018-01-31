<?php

namespace luya\bootstrap4;

/**
 * Bootstrap 4 Active Field.
 *
 * @author Basil Suter <basil@nadar.io>
 */
class ActiveField extends \yii\widgets\ActiveField
{
    /**
     * @inheritdoc
     */
    public $hintOptions = ['class' => 'form-text text-muted', 'tag' => 'small'];

    /**
     * @inheritdoc
     */
    public $errorOptions = ['class' => 'invalid-feedback'];
}
