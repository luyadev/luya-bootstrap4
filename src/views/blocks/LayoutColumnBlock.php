<?php
/**
 * View file for block: LayoutColumnBlock 
 *
 * File has been created with `block/create` command. 
 *
 * @param $this->placeholderValue('content');
 * @param $this->extraValue('columns');
 * @param $this->extraValue('columnClass');
 *
 * @var $this \luya\cms\base\PhpBlockView
 */

?>

<div class="<?= $this->extraValue('columnClass') ?>">
    <?= $this->placeholderValue('content') ?>
</div>