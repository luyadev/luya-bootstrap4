<?php
/**
 * View file for block: ImageBlock
 *
 * File has been created with `block/create` command.
 *
 * @param $this->extraValue('image');
 * @param $this->varValue('align');
 * @param $this->varValue('fluid');
 * @param $this->varValue('image');
 * @param $this->cfgValue('lazyload');
 *
 * @var $this \luya\cms\base\PhpBlockView
 */
use luya\lazyload\LazyLoad;

$align = $this->varValue('align', 'left');
?>

<?php if ($image = $this->extraValue('image', false)): ?>
    <div class="image">
        <figure class="figure d-block <?php if ($align === 'left'): ?>text-left<?php elseif ($align === 'right'): ?>text-right<?php else: ?>text-center<?php endif; ?>">
            <?php if ($this->cfgValue('lazyload', false)):
                echo LazyLoad::widget([
                    'src' => $image->source,
                    'extraClass' => 'figure-img img-fluid',
                    'width' => $image->itemArray['resolution_width'],
                    'height' => $image->itemArray['resolution_height'],
                    'options' => [
                        'src' => 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==',
                        'alt' => $image->caption,
                        'title' => $image->caption,
                    ]
                ]);
            else: ?>
                <img src="<?= $this->extraValue('image')->source ?>" class="figure-img img-fluid" <?php if ($this->extraValue('image')->caption): ?>alt="<?= $this->extraValue('image')->caption ?>"<?php endif; ?>>
            <?php endif; ?>
            <?php if ($this->varValue('showCaption', false) && $this->extraValue('image')->caption): ?>
                <figcaption class="figure-caption"><?= $this->extraValue('image')->caption ?></figcaption>
            <?php endif; ?>
        </figure>
    </div>
<?php endif; ?>
