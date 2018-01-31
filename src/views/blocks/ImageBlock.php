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
 *
 * @var $this \luya\cms\base\PhpBlockView
 */

$align = $this->varValue('align', 'left');
?>

<?php if ($this->extraValue('image', false)): ?>
    <div class="image ">
        <figure class="figure d-block <?php if ($align === 'left'): ?>text-left<?php elseif ($align === 'right'): ?>text-right<?php else: ?>text-center<?php endif; ?>">
            <img src="<?= $this->extraValue('image')->source ?>" class="figure-img img-fluid" <?php if ($this->extraValue('image')->caption): ?>alt="<?= $this->extraValue('image')->caption ?>"<?php endif; ?>>
            <?php if ($this->varValue('showCaption', false) && $this->extraValue('image')->caption): ?>
                <figcaption class="figure-caption"><?= $this->extraValue('image')->caption ?></figcaption>
            <?php endif; ?>
        </figure>
    </div>
<?php endif; ?>
