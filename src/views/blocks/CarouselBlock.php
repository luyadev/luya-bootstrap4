<?php

/* @var $this \luya\cms\base\PhpBlockView */

$images = $this->extraValue('images');
$indicators = null;
$counter = 0;

if ($images):
    $this->registerJs("$('.carousel').carousel(".$this->extraValue('jsConfig', '').")");
    $id = $this->extraValue('id');
    $hasImages = false;
    ?>
    <div id="<?= $id ?>" class="carousel <?= $this->cfgValue('blockCssClass') ?> slide<?= $this->cfgValue('crossfade', null , ' carousel-fade'); ?><?= $this->cfgValue('row', null, ' row') ?>" data-ride="carousel">
        <div class="carousel-inner">
        <?php foreach ($images as $image): $counter++; if (isset($image['image'])): $indicators .= '<li data-target="#'.$id.'" data-slide-to="'.$counter.'" class="active"></li>'; ?>
            <div class="carousel-item<?= $counter == 1 ? ' active' : '' ?>">
                <?php if (!empty($image['link'])): ?>
                    <a href="<?= $image['link'] ?>" title="<?= $image['title'] ?>">
                <?php endif; ?>
                <img class="d-block w-100" src="<?= $image['image']->source ?>" alt="<?= $image['title'] ?>">
                <?php if (!empty($image['title']) || !empty($image['caption'])): ?>
                    <div class="carousel-caption <?= $this->cfgValue('captionCssClass') ?>">
                        <?php if (!empty($image['title'])): ?>
                            <h5 class="carousel-caption-title"><?= $image['title'] ?></h5>
                        <?php endif;
                        if (!empty($image['caption'])): ?>
                            <p class="carousel-caption-text"><?= $image['caption'] ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif;
                if (!empty($image['link'])): ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php $hasImages = true; endif;  endforeach;?>
        </div>

        <?php if ($hasImages): ?>
            <?= $this->cfgValue('indicators', null, '<ol class="carousel-indicators">'.$indicators.'</ol>') ?>

            <?= $this->cfgValue('controls', null,
                '<a class="carousel-control-prev" href="#'.$this->extraValue('id').'" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#'.$this->extraValue('id').'" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>') ?>
        <?php endif; ?>
    </div>
<?php endif; ?>