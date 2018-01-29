<?php

namespace luya\bootstrap4\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\LayoutGroup;
use luya\cms\helpers\BlockHelper;

/**
 * Layout Column Block.
 *
 * File has been created with `block/create` command.
 */
class LayoutColumnBlock extends PhpBlock
{
    /**
     * @var string The module where this block belongs to in order to find the view files.
     */
    public $module = 'bootstrap4';

    /**
     * @var boolean Choose whether block is a layout/container/segmnet/section block or not, Container elements will be optically displayed
     * in a different way for a better user experience. Container block will not display isDirty colorizing.
     */
    public $isContainer = false;

    public $columns = [
        1 => '1/12',
        2 => '2/12',
        3 => '3/12',
        4 => '4/12',
        5 => '5/12',
        6 => '6/12',
        7 => '7/12',
        8 => '8/12',
        9 => '9/12',
        10 => '10/12',
        11 => '11/12',
        12 => '12/12'
    ];

    /**
     * @inheritDoc
     */
    public function blockGroup()
    {
        return LayoutGroup::class;
    }

    /**
     * @inheritDoc
     */
    public function name()
    {
        return 'Layout: Column';
    }

    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'view_column'; // see the list of icons on: https://design.google.com/icons/
    }

    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
            'vars' => [
                ['var' => 'columnCount', 'label' => 'Size XS up', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption($this->columns)],
                ['var' => 'columnCountSM', 'label' => 'Size SM up', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption($this->columns)],
                ['var' => 'columnCountMD', 'label' => 'Size MD up', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption($this->columns)],
                ['var' => 'columnCountLG', 'label' => 'Size LG up', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption($this->columns)],
                ['var' => 'columnCountXL', 'label' => 'Size XL up', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption($this->columns)],
            ],
            'placeholders' => [
                 ['var' => 'content', 'label' => 'Column content'],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function extraVars()
    {
        return [
            'columns' => $this->getColumns(),
            'columnClass' => $this->getColumnClass()
        ];
    }

    /**
     * {@inheritDoc}
     *
     * @param {{placeholders.content}}
     * @param {{vars.columnCount}}
    */
    public function admin()
    {
        return '{% for key, column in extras.columns %}
                    {% if column %}
                        <span class="badge badge-dark">{{key}}: {{column}}</span>
                    {% endif %}
                {% endfor %}';
    }

    /**
     * Returns all columns by breakpoint (xs to xl)
     *
     * @return array
     */
    public function getColumns()
    {
        $allColumns = [
            'xs' => $this->getVarValue('columnCount', null),
            'sm' => $this->getVarValue('columnCountSM', null),
            'md' => $this->getVarValue('columnCountMD', null),
            'lg' => $this->getVarValue('columnCountLG', null),
            'xl' => $this->getVarValue('columnCountXL', null)
        ];

        $columns = [];

        foreach ($allColumns as $key => $column) {
            if ($column !== null) {
                $columns[$key] = $column;
            }
        }

        if (empty($columns)) {
            $columns['md'] = 6;
        }

        return $columns;
    }

    /**
     * Generates the css classes needed by bootstrap
     *
     * @return string
     */
    public function getColumnClass()
    {
        $columns = $this->getColumns();
        $columnClass = '';

        $i = 1;
        foreach($columns as $breakpoint => $columnCount) {

            if($breakpoint === 'xs') {
                $columnClass .= 'col-' . $columnCount;
            } else {
                $columnClass .= 'col-' . $breakpoint . '-' . $columnCount;
            }

            if (count($columns) > $i) {
                $columnClass .= ' ';
            }

            $i++;
        }

        return $columnClass;
    }
}