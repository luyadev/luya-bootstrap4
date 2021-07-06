<?php

namespace luya\bootstrap4\tests\src;

use Yii;
use yii\base\Model;
use luya\bootstrap4\ActiveForm;
use luya\testsuite\cases\WebApplicationTestCase;

class ActiveFormTest extends WebApplicationTestCase
{
    public function getConfigArray()
    {
        return [
            'id' => 'bs4app',
            'basePath' => dirname(__DIR__) . '/../',
            'components' => [
                'assetManager' => [
                    'basePath' => dirname(__DIR__) . '/assets',
                    'bundles' => [
                        'yii\web\JqueryAsset' => false,
                        'luya\bootstrap4\Bootstrap4Asset' => false,
                    ],
                ],
                'storage' => [
                    'class' => 'luya\admin\filesystem\DummyFileSystem',
                    'filesArray' => [],
                    'imagesArray' => [],
                ],
            ]
        ];
    }
    
    public function testActiveFormLayout()
    {
        Yii::setAlias('@webroot', dirname(__DIR__));
        $model = new StubModel();
        ob_start();
        ob_implicit_flush(false);
        
        $form = ActiveForm::begin(['layout' => 'horizontal']);
        echo $form->field($model, 'firstname');
        ActiveForm::end();
        
        $this->assertContainsTrimmed('
        	<div class="form-group row field-stubmodel-firstname">
        		<label class="col-sm-2 col-form-label" for="stubmodel-firstname">Firstname</label>
        		<div class="col-sm-10">
        			<input type="text" id="stubmodel-firstname" class="form-control" name="StubModel[firstname]">
        			<div class="invalid-feedback"></div>
        		</div>
        	</div>', ob_get_clean());
    }
    public function testCheckboxSwitch()
    {
        Yii::setAlias('@webroot', dirname(__DIR__));
        $model = new StubModel();
        ob_start();
        ob_implicit_flush(false);
        
        $form = ActiveForm::begin(['layout' => 'horizontal']);
        echo $form->field($model, 'firstname')->checkboxSwitch();
        ActiveForm::end();
        
        $this->assertContainsTrimmed('
        <div class="form-group row field-stubmodel-firstname"><div class="col-sm-10"><div class="custom-control custom-switch"><input type="hidden" name="StubModel[firstname]" value="0"><input type="checkbox" id="stubmodel-firstname" class="custom-control-input" name="StubModel[firstname]" value="1"><label class="custom-control-label" for="stubmodel-firstname"><label for="stubmodel-firstname">Firstname</label></label></div><div class="invalid-feedback"></div></div></div></form>', ob_get_clean());
    }
    
    public function testActiveFormValidationError()
    {
        Yii::setAlias('@webroot', dirname(__DIR__));
        $model = new StubModel();
        $model->addError('firstname', 'Some error!');
        ob_start();
        ob_implicit_flush(false);
    
        $form = ActiveForm::begin(['layout' => 'horizontal']);
        echo $form->field($model, 'firstname');
        ActiveForm::end();
        ob_get_clean();
        
        $this->assertContainsTrimmed('
        	<div class="form-group row field-stubmodel-firstname">
        		<label class="col-sm-2 col-form-label" for="stubmodel-firstname">Firstname</label>
        		<div class="col-sm-10">
        			<input type="text" id="stubmodel-firstname" class="form-control is-invalid" name="StubModel[firstname]" aria-invalid="true">
        			<div class="invalid-feedback">Some error!</div>
        		</div>
        	</div>', (string) $form->field($model, 'firstname'));
    }
    
    public function testValidAndInvalidWthAttributeHints()
    {
        $model = new Stub2Model();
        $model->addError('lastname', 'Error!');
         
        ob_start();
        $form = ActiveForm::begin([
            'action' => '/something',
            'enableClientScript' => false,
            'validationStateOn' => ActiveForm::VALIDATION_STATE_ON_INPUT,
         ]);
        ActiveForm::end();
        ob_end_clean();
         
        $this->assertContainsTrimmed('
    	 	<div class="form-group field-stub2model-firstname">
    	 		<label class="control-label" for="stub2model-firstname">Firstname</label>
    	 		<input type="text" id="stub2model-firstname" class="form-control" name="Stub2Model[firstname]">
    	 		<div class="invalid-feedback"></div>
    	 	</div>', (string) $form->field($model, 'firstname'));
        $this->assertContainsTrimmed('
    	 	<div class="form-group field-stub2model-lastname">
    	 		<label class="control-label" for="stub2model-lastname">Lastname</label>
    	 		<input type="text" id="stub2model-lastname" class="form-control is-invalid" name="Stub2Model[lastname]" aria-invalid="true">
    	 		<div class="invalid-feedback">Error!</div>
    	 	</div>', (string) $form->field($model, 'lastname'));
        $this->assertContainsTrimmed('
    	 	<div class="form-group field-stub2model-info">
    	 		<label class="control-label" for="stub2model-info">Info</label>
    	 		<input type="text" id="stub2model-info" class="form-control" name="Stub2Model[info]">
    	 		<small class="form-text text-muted">some hint message</small>
    	 		<div class="invalid-feedback"></div>
    	 	</div>', (string) $form->field($model, 'info'));
    }
}

/* the inline stub model to use for the active form */

class StubModel extends Model
{
    public $firstname = null;

    public function rules()
    {
        return [
                [['firstname'], 'string'],
        ];
    }
}


class Stub2Model extends Model
{
    public $firstname = null;
    public $lastname;
    public $info;

    public function rules()
    {
        return [
                [['firstname', 'lastname', 'info'], 'string'],
        ];
    }

    public function attributeHints()
    {
        return ['info' => 'some hint message'];
    }
}
