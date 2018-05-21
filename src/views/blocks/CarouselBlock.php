<?php
/* @var $this \luya\cms\base\PhpBlockView */
$config = '';
if ($this->varValue('interval')) {
    $config .= 'interval: '.$this->varValue('interval').',';
}
if ($this->varValue('keyboard')) {
    $config .= 'keyboard: true,';
}
if ($this->varValue('pause')) {
    $config .= 'pause: '.$this->varValue('pause').',';
}
if ($this->varValue('ride')) {
    $config .= 'ride: '.$this->varValue('ride').',';
}
if ($this->varValue('wrap')==1) {
    $config .= 'wrap: true,';
}
$config = rtrim($config, ',');
$this->appView->registerJs("$('.carousel').carousel({".$config."})");
$id = $this->extraValue('id');
$images = $this->extraValue('images');
$first = true;
$indicators = '';
$counter = 0;
?>

<div id="<?= $id ?>" class="carousel slide <?= $this->varValue('crossfade') ? 'carousel-fade' : '' ?>" data-ride="carousel">
    <div class="carousel-inner">
    <?php if ($images):
        foreach ($images as $image):
            $indicators .= '<li data-target="#'.$id.'" data-slide-to="'.$counter.'" class="active"></li>';
            $counter++;?>
            <div class="carousel-item<?php
            if ($first):
                echo ' active';
                $first = false;
            endif; ?>">
                <img class="d-block w-100" src="<?= $image['image']->source ?>" alt="<?= $image['title']; ?>">
                <?php if ($image['title'] !== '' || $image['image']->caption !== ''): ?>
                    <div class="carousel-caption d-none d-md-block">
                        <?php if ($image['title'] !== '' ): ?>
                            <h5><?= $image['title'] ?></h5>
                        <?php endif;
                        if ($image['image']->caption !== ''): ?>
                            <p><?= $image['image']->caption ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php endif;?>
    </div>
    <?php if ($this->varValue('indicators')): ?>
        <ol class="carousel-indicators">
            <?= $indicators ?>
        </ol>
    <?php endif; ?>

    <?php if ($this->varValue('controls')): ?>
        <a class="carousel-control-prev" href="#<?= $this->extraValue('id'); ?>" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#<?= $this->extraValue('id'); ?>" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    <?php endif; ?>
</div>