<?php
/**
 * View file for block: ImageBlock
 *
 * File has been created with `block/create` command.
 *
 * @param $this->extraValue('image');
 * @param $this->varValue('align');
 * @param $this->varValue('showCaption');
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
            <?php
            if (!empty($image->caption)) {
                $caption = $image->caption;
            } else {
                $caption = '';
            }
            if ($this->cfgValue('lazyload', false)):
                $options['src'] = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
                if (!empty($caption)) {
                    $options['alt'] = $caption;
                    $options['title'] = $caption;
                }
                echo LazyLoad::widget([
                    'src' => $image->source,
                    'extraClass' => 'figure-img img-fluid',
                    'width' => $image->itemArray['resolution_width'],
                    'height' => $image->itemArray['resolution_height'],
                    'options' => $options
                ]);
            else: ?>
                <img src="<?= $image->source ?>" class="figure-img img-fluid"<?php if (!empty($caption)): ?> alt="<?= $caption ?>"<?php endif; ?>>
            <?php endif; ?>
            <?php if ($this->varValue('showCaption', false) && !empty($caption)): ?>
                <figcaption class="figure-caption"><?= $caption ?></figcaption>
            <?php endif; ?>
        </figure>
    </div>
<?php endif; ?>
