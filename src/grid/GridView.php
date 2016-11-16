<?php

namespace luya\bootstrap4\grid;

/**
 * GridView Bootstrap4 Widget.
 * 
 * @author Basil Suter <basil@nadar.io>
 */
class GridView extends \yii\grid\GridView
{
	/**
     * @var array the HTML attributes for the grid table element.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $tableOptions = ['class' => 'table table-striped table-bordered'];
}
