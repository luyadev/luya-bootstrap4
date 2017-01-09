<?php

namespace luya\bootstrap4;

/**
 *
 * @author Basil Suter <basil@nadar.io>
 */
class ActiveForm extends \yii\widgets\ActiveForm
{
	/**
	 * @var string Using different style themes:
	 * 
	 * + default: 
	 */
	public $layout = 'default';
	
    public $fieldClass = 'luya\bootstrap4\ActiveField';
    
    public $errorCssClass = 'has-danger';
    
    public $successCssClass = 'has-success';
    
    public function init()
    {
    	
    	
    	if ($this->layout == 'horizontal') {
    		$this->provideHorizontalLayout();
    	}
    	
    	parent::init();
    }
    	
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
    		'template' => "{label}\n<div class=\"col-sm-10\">{input}</div>\n{hint}\n{error}",
    	];
    }
}
