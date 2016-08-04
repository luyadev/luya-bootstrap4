<div class="container p-a-0">
    <? if ($vars['imagePosition'] == 'left'): ?>
        <div class="image-text__wrapper">
            <div class="col-sm-6 p-a-0">
                <img src="<?= $extras['imageId']['source'] ?>" class="img-fluid <?= $vars['imageShapes'] ?>"/>
            </div>
            <div class="col-sm-6 p-a-0">
                <?= $extras['text'] ?>
            </div>
        </div>
    <? elseif ($vars['imagePosition'] == 'right'): ?>
        <div class="image-text__wrapper">
            <div class="col-sm-6 p-a-0">
                <?= $extras['text'] ?>
            </div>
            <div class="col-sm-6 p-a-0">
                <img src="<?= $extras['imageId']['source'] ?>" class="img-fluid <?= $vars['imageShapes'] ?> ?>"/>
            </div>
        </div>
    <? elseif ($vars['imagePosition'] == 'centered'): ?>
        <div class="image-text__wrapper">
            <div class="col-sm-12 p-a-0 text-xs-center">
                <img src="<?= $extras['imageId']['source'] ?>" class="img-fluid m-x-auto d-block <?= $vars['imageShapes'] ?> ?>"/>
            </div>
            <div class="col-sm-12 p-a-0">
                <?= $extras['text'] ?>
            </div>
        </div>
    <? endif; ?>
</div>
