<?php

namespace luya\bootstrap4;

/**
 * Bootstrap 4 Active Form.
 *
 * There are two types of layouts:
 *
 * + default: Default layout with labels at the top of the fields.
 * + horizontal: Horizontal layout set the labels left to the fields.
 *
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.0
 */
class ActiveForm extends \yii\widgets\ActiveForm
{
    /**
     * @var string Using different style themes:
     *
     * + default: Default layout with labels at the top of the fields.
     * + horizontal: Horizontal layout set the labels left to the fields.
     */
    public $layout = 'default';
    
    /**
     * @var string Change the validation state to the input field.
     */
    public $validationStateOn = self::VALIDATION_STATE_ON_INPUT;
    
    /**
     * @var string The error Summary alert class
     */
    public $errorSummaryCssClass = 'error-summary alert alert-danger';
    
    /**
     * @inheritdoc
     */
    public $fieldClass = 'luya\bootstrap4\ActiveField';
    
    /**
     * @inheritdoc
     */
    public $errorCssClass = 'is-invalid';
    
    /**
     * @inheritdoc
     */
    public $successCssClass = 'is-valid';
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->layout == 'horizontal') {
            $this->provideHorizontalLayout();
        }
        
        parent::init();
    }
    
    /**
     * Change the configuration of the active field and form based on the horizontal inputs.
     *
     * Bootstrap 4 Example Output:
     *
     * ```php
     * <div class="form-group row">
     *     <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
     *     <div class="col-sm-10">
     *         <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
     *     </div>
     * </div>
     * ```
     */
    protected function provideHorizontalLayout()
    {
        $this->options = ['class' => 'form-group row'];
        $this->fieldConfig = [
            'options' => [
                'class' => 'form-group row',
            ],
            'labelOptions' => [
                'class' => 'col-sm-2 col-form-label',
            ],
            'template' => "{label}\n<div class=\"col-sm-10\">{input}\n{hint}\n{error}</div>",
        ];
    }
}
