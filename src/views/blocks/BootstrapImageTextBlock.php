<?php if (isset($vars['imagePosition'])): ?>
    <div class="clearfix image-text">
        <?php if ($vars['imagePosition'] == 'left'): ?>
            <div class="image-text__wrapper">
                <div class="col-sm-12 p-a-0">


                                        <?= var_dump($extras['file']['source']); ?>

                    <div class="image-text__wrapper__image hidden-xs-down" style="float:left;<?php if (isset($cfgs['imageWidth'])):?>width: <?= $cfgs['imageWidth']?>; <?php endif ?> max-width:100%;">

                        <? if ($vars['fileDownload'] == 0 ): ?>

                            <? if (isset($extras['link']) && (!empty($extras['link']))):?> <a href="<?= $extras['link'] ?>"><? endif; ?>

                        <? elseif ($vars['fileDownload'] == 1 ): ?>

                            <? if (isset($extras['file']) && (!empty($extras['file']))):?><a href="<?= $extras['file']['source']?>" download><? endif; ?>

                        <? endif; ?>

                            <img src="<?= $extras['imageId']['source'] ?>" style="padding-right:10px;" alt="<? if (isset($vars['imageCaption'])): echo $vars['imageCaption']; endif; ?>" class="img-fluid img-responsive <?= $vars['imageShapes'] ?>"/>

                        <? if (isset($extras['link']) || ($extras['file'])):?></a><? endif; ?>

                        <?php if (isset($vars['imageCaption']) && (!empty($vars['imageCaption']))): ?>
                            <div class="image-text__wrapper__image__caption <?php if (isset($cfgs['imageCaptionVisibility']) && ($cfgs['imageCaptionVisibility'] == 0)): ?>  hidden-xs-up <?php endif ?>" style="padding-right:10px;">
                                <?= $vars['imageCaption'] ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <?= $extras['text'] ?>
                    <div class="image-text__wrapper_small hidden-sm-up">
                        <? if ($vars['fileDownload'] == 0 ): ?>

                            <? if (isset($extras['link']) && (!empty($extras['link']))):?> <a href="<?= $extras['link'] ?>"><? endif; ?>

                        <? elseif ($vars['fileDownload'] == 1 ): ?>

                            <? if (isset($extras['file']) && (!empty($extras['file']))):?><a href="<?= $extras['file']['source']?>" download><? endif; ?>

                        <? endif; ?>

                        <img src="<?= $extras['imageId']['source'] ?>" alt="<?php if (isset($vars['imageCaption']) && (!empty($vars['imageCaption']))): ?> <?= $vars['imageCaption'] ?> <?php endif ?>" style="margin:auto; padding-top:10px;" class="img-fluid img-responsive <?= $vars['imageShapes'] ?>"/>

                        <? if (isset($extras['link']) || ($extras['file']))  :?></a><? endif; ?>

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

                        <? if ($vars['fileDownload'] == 0 ): ?>

                            <? if (isset($extras['link']) && (!empty($extras['link']))):?> <a href="<?= $extras['link'] ?>"><? endif; ?>

                        <? elseif ($vars['fileDownload'] == 1 ): ?>

                            <? if (isset($extras['file']) && (!empty($extras['file']))):?><a href="<?= $extras['file']['source']?>" download><? endif; ?>

                        <? endif; ?>


                        <img src="<?= $extras['imageId']['source'] ?>" style="padding-left: 10px;" alt="<?php if (isset($vars['imageCaption']) && (!empty($vars['imageCaption']))): ?> <?= $vars['imageCaption'] ?> <?php endif ?>" class="img-fluid img-responsive <?= $vars['imageShapes'] ?>"/>

                        <? if (isset($extras['link']) || ($extras['file']))  :?></a><? endif; ?>

                        <?php if (isset($vars['imageCaption']) && (!empty($vars['imageCaption']))): ?>
                            <div class="image-text__wrapper__image__caption <?php if (isset($cfgs['imageCaptionVisibility']) && ($cfgs['imageCaptionVisibility'] == 0)): ?>  hidden-xs-up <?php endif ?>" style="padding-left:10px;" >
                                <?= $vars['imageCaption'] ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <?= $extras['text'] ?>
                    <div class="image-text__wrapper_small hidden-sm-up">

                        <? if ($vars['fileDownload'] == 0 ): ?>

                            <? if (isset($extras['link']) && (!empty($extras['link']))):?> <a href="<?= $extras['link'] ?>"><? endif; ?>

                        <? elseif ($vars['fileDownload'] == 1 ): ?>

                            <? if (isset($extras['file']) && (!empty($extras['file']))):?><a href="<?= $extras['file']['source']?>" download><? endif; ?>

                        <? endif; ?>


                        <img src="<?= $extras['imageId']['source'] ?>" alt="<?php if (isset($vars['imageCaption']) && (!empty($vars['imageCaption']))): ?> <?= $vars['imageCaption'] ?> <?php endif ?>" style="margin:auto; padding-top:10px;" class="img-fluid img-responsive <?= $vars['imageShapes'] ?>"/>

                        <? if (isset($extras['link']) || ($extras['file']))  :?></a><? endif; ?>

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
