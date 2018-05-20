<?php
// <!-- RC2 UPDATE FIX!
$vars = $this->context->getVarValues();
$cfgs = $this->context->getCfgValues();
$extras = $this->context->getExtraVarValues();
$placeholders = $this->context->getPlaceholderValues();
// -->
?>
<?php if (!empty($extras['text'])): ?>
    <div class="<?= $vars['colsm'].' '.$vars['colmd'].' '.$vars['collg'] ?>">
        <?= $extras['text'] ?>
    </div>
<?php endif; ?>
