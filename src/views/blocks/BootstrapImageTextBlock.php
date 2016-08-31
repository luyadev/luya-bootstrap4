<?php if (isset($vars['imagePosition'])): ?>
    <div class="clearfix image-text">
        <?php if ($vars['imagePosition'] == 'left'): ?>
            <div class="image-text__wrapper">
                <div class="col-sm-12 p-a-0">
                    <div class="image-text__wrapper__image hidden-xs-down" style="float:left;<?php if (isset($cfgs['imageWidth'])):?>width: <?= $cfgs['imageWidth']?>; <?php endif ?> max-width:100%;">
                        <img src="<?= $extras['imageId']['source'] ?>" style="padding-right:10px;" alt="<?= $vars['imageCaption'] ?>" class="img-fluid <?= $vars['imageShapes'] ?>"/>
                        <?php if (isset($vars['imageCaption']) && (!empty($vars['imageCaption']))): ?>
                            <div class="image-text__wrapper__image__caption <?php if (isset($cfgs['imageCaptionVisibility']) && ($cfgs['imageCaptionVisibility'] == 0)): ?>  hidden-xs-up <?php endif ?>" style="padding-right:10px;">
                                <?= $vars['imageCaption'] ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <?= $extras['text'] ?>
                    <div class="image-text__wrapper_small hidden-sm-up">
                        <img src="<?= $extras['imageId']['source'] ?>" alt="<?php if (isset($vars['imageCaption']) && (!empty($vars['imageCaption']))): ?> <?= $vars['imageCaption'] ?> <?php endif ?>" style="margin:auto; padding-top:10px;" class="img-fluid <?= $vars['imageShapes'] ?>"/>
                        <?php if (isset($vars['imageCaption']) && (!empty($vars['imageCaption']))): ?>
                            <div class="image-text__wrapper__image__caption <?php if (isset($cfgs['imageCaptionVisibility']) && ($cfgs['imageCaptionVisibility'] == 0)): ?>  hidden-xs-up <?php endif ?>">
                                <?= $vars['imageCaption'] ?>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        <?php elseif ($vars['imagePosition'] == 'right'): ?>
            <div class="image-text__wrapper">
                <div class="col-sm-12 p-a-0">
                    <div class="image-text__wrapper__image hidden-xs-down" style="float:right;<?php if (isset($cfgs['imageWidth'])):?>width: <?= $cfgs['imageWidth']?>; <?php endif ?> max-width:100%;">
                        <img src="<?= $extras['imageId']['source'] ?>" style="padding-left: 10px;" alt="<?php if (isset($vars['imageCaption']) && (!empty($vars['imageCaption']))): ?> <?= $vars['imageCaption'] ?> <?php endif ?>" class="img-fluid <?= $vars['imageShapes'] ?>"/>
                        <?php if (isset($vars['imageCaption']) && (!empty($vars['imageCaption']))): ?>
                            <div class="image-text__wrapper__image__caption <?php if (isset($cfgs['imageCaptionVisibility']) && ($cfgs['imageCaptionVisibility'] == 0)): ?>  hidden-xs-up <?php endif ?>" style="padding-left:10px;" >
                                <?= $vars['imageCaption'] ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <?= $extras['text'] ?>
                    <div class="image-text__wrapper_small hidden-sm-up">
                        <img src="<?= $extras['imageId']['source'] ?>" alt="<?php if (isset($vars['imageCaption']) && (!empty($vars['imageCaption']))): ?> <?= $vars['imageCaption'] ?> <?php endif ?>" style="margin:auto; padding-top:10px;" class="img-fluid <?= $vars['imageShapes'] ?>"/>
                        <?php if (isset($vars['imageCaption']) && (!empty($vars['imageCaption']))): ?>
                            <div class="image-text__wrapper__image__caption <?php if (isset($cfgs['imageCaptionVisibility']) && ($cfgs['imageCaptionVisibility'] == 0)): ?>  hidden-xs-up <?php endif ?>">
                                <?= $vars['imageCaption'] ?>
                            </div>
                        <?php endif ?>
                    </div>

                </div>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
