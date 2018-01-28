<?php
/* @var $this \luya\cms\base\PhpBlockView */

if (!$this->isPrevEqual) {
	$this->appView->registerJs("$('.carousel').carousel()");
}
?>
<?php if (!$this->getIsPrevEqual()): ?>
<div id="<?= $this->extraValue('id'); ?>" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
<?php endif; ?>
	<?php if ($this->extraValue('image')): ?>
    <div class="carousel-item <?php if (!$this->getIsPrevEqual()): ?>active<?php endif; ?>">
      	<img class="d-block w-100" src="<?= $this->extraValue('image')->source; ?>" alt="<?= $this->varValue('title'); ?>">
      	<div class="carousel-caption d-none d-md-block">
    	<h5><?= $this->varValue('title')?></h5>
    	<p><?= $this->varValue('caption'); ?></p>
  		</div>
    </div>
    <?php endif;?>
<?php if (!$this->isNextEqual): ?>
  </div>
  <a class="carousel-control-prev" href="#<?= $this->extraValue('id'); ?>" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#<?= $this->extraValue('id'); ?>" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php endif; ?>