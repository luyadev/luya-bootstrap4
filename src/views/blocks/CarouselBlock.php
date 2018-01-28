<?php
/* @var $this \luya\cms\base\PhpBlockView */

if (!$this->isPrevEqual) {
	$id = md5($this->context->getEnvOption('id'));

	$this->appView->registerJs("$('.carousel').carousel()");
}
?>
<?php if (!$this->getIsPrevEqual()): ?>
<div id="carousel_<?= $id; ?>" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
<?php endif; ?>
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?= $this->varValue('image'); ?>" alt="<?= $this->varValue('title'); ?>">
    </div>
<?php if (!$this->isNextEqual): ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php endif; ?>