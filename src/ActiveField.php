<?php

namespace luya\bootstrap4;

use luya\helpers\Html;

/**
 * Bootstrap 4 Active Field.
 *
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.0
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

    /**
     * Checkbox rendered as switch
     *
     * @param array $options
     * @return self
     * @see https://getbootstrap.com/docs/4.2/components/forms/#switches
     * @since 1.0.4
     */
    public function checkboxSwitch($options = [])
    {
        $this->label(false);
        $this->parts['{input}'] = '<div class="custom-control custom-switch">
        '.Html::activeCheckbox($this->model, $this->attribute, array_merge(['label' => null, 'class' => 'custom-control-input'], $options)).'
        <label class="custom-control-label" for="'.Html::getInputId($this->model, $this->attribute).'">'.Html::activeLabel($this->model, $this->attribute, $options).'</label>
        </div>';

        return $this;
    }
}
