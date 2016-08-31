<?php

/*
 *
 * Array (
 * [id] => 1
 * [folderId] => 0
 * [name] => Crystal24UG.pdf
 * [systemFileName] => crystal24ug_e4e32ddd.pdf
 * [source] => /luya/envs/dev/public_html/en/file/1/e4e32ddd/Crystal24UG.pdf
 * [httpSource] => /luya/envs/dev/public_html/storage/crystal24ug_e4e32ddd.pdf
 * [serverSource] => /Users/roland/Websites/luya/envs/dev/public_html/storage/crystal24ug_e4e32ddd.pdf
 * [isImage] =>
 * [mimeType] => application/pdf
 * [extension] => pdf
 * [uploadTimestamp] => 1470171832
 * [size] => 549076
 * [sizeReadable] => 536.21 KB
 * [captionArray] => Array ( [en] => )
 * [caption] => Manual )
 */

?>

<?php if (count($extras['fileList'])): ?>
<ul>
    <?php foreach ($extras['fileList'] as $file): ?>
        <li>
            <a href="<?= $file['source'] ?>">
                <?= $file['caption'] ?: $file['name'] ?>
                <?php if ($cfgs['showType']): ?>
                    <span><?= $file['extension'] ?></span>
                <?php endif; ?>
                <?php if ($cfgs['showFileSize']): ?>
                    <span><?= $file['sizeReadable'] ?></span>
                <?php endif; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>
