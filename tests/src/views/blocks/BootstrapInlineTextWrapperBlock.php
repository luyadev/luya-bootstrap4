<?php
// <!-- RC2 UPDATE FIX!
$vars = $this->context->getVarValues();
$cfgs = $this->context->getCfgValues();
$extras = $this->context->getExtraVarValues();
$placeholders = $this->context->getPlaceholderValues();
// -->
?>
<div class="inline-text-wrapper container clearfix p-a-0">
    <?= $placeholders['textblocks'] ?>
</div>
