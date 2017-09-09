<?php

namespace luya\bootstrap4\tests\src;

use Yii;
use yii\base\Model;
use luya\bootstrap4\ActiveForm;
use luya\testsuite\cases\WebApplicationTestCase;

class Bootstrap4Test extends WebApplicationTestCase
{
    public function getConfigArray()
    {
        return [
            'id' => 'bs4app',
            'basePath' => dirname(__DIR__) . '/../',
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
        			<div class="form-control-feedback"></div>
        		</div>
        	</div>', ob_get_clean());
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
