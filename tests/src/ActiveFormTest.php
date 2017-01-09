<?php

namespace luya\bootstrap4\tests\src;

use Yii;
use luya\bootstrap4\tests\Bootstrap4TestCase;
use luya\bootstrap4\ActiveForm;
use yii\base\Model;

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

class ActiveFromTest extends Bootstrap4TestCase
{
	private function trimmer($text) 
	{
		$text = trim(preg_replace('/\s+/', ' ', $text));
		
		return str_replace(['> ', ' <'], ['>', '<'], $text);
	}
	
	public function testLayout()
	{
		Yii::setAlias('@webroot', dirname(__DIR__));
		$model = new StubModel();
		ob_start();
		ob_implicit_flush(false);
		
		$form = ActiveForm::begin(['layout' => 'horizontal']);
		echo $form->field($model, 'firstname');
		ActiveForm::end();
		
		$this->assertContains('<div class="form-group row field-stubmodel-firstname"><label class="col-sm-2 col-form-label" for="stubmodel-firstname">Firstname</label><div class="col-sm-10"><input type="text" id="stubmodel-firstname" class="form-control" name="StubModel[firstname]"></div><div class="text-muted text-help"></div></div>', $this->trimmer(ob_get_clean()));
	}
}

/*
<div class="form-group row field-dynamicmodel-wunsch">
	<label class="col-sm-2 col-form-label" for="dynamicmodel-wunsch">Wunsch</label>
	<div class="col-sm-10">
		<textarea id="dynamicmodel-wunsch" name="DynamicModel[wunsch]"></textarea>
	</div>
	<div class="text-muted text-help"></div>
</div>
 * 
<div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
      </div>
    </div>
 */