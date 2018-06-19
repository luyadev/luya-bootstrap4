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
    <div id="<?= $id ?>" class="carousel slide<?= $this->cfgValue('crossfade', null , ' carousel-fade'); ?><?= $this->cfgValue('row', null, ' row') ?>" data-ride="carousel">
        <div class="carousel-inner">
        <?php foreach ($images as $image): $counter++; if (isset($image['image'])): $indicators .= '<li data-target="#'.$id.'" data-slide-to="'.$counter.'" class="active"></li>'; ?>
            <div class="carousel-item<?= $counter == 1 ? ' active' : '' ?>">
                <img class="d-block w-100" src="<?= $image['image']->source ?>" alt="<?= $image['image']->caption; ?>">
                <?php if (!empty($image['title']) || !empty($image['image']->caption)): ?>
                    <div class="carousel-caption d-none d-md-block">
                        <?php if (!empty($image['title'])): ?>
                            <h5><?= $image['title'] ?></h5>
                        <?php endif;
                        if (!empty($image['image']->caption)): ?>
                            <p><?= $image['image']->caption ?></p>
                        <?php endif; ?>
                    </div>
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