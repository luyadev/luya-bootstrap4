<?

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

<? if (count($extras['fileList'])): ?>
<ul>
    <? foreach($extras['fileList'] as $file): ?>
        <li>
            <a href="<?= $file['source'] ?>">
                <?= $file['caption'] ?: $file['name'] ?>
                <? if ($cfgs['showType']): ?>
                    <span><?= $file['extension'] ?></span>
                <? endif; ?>
                <? if ($cfgs['showFileSize']): ?>
                    <span><?= $file['sizeReadable'] ?></span>
                <? endif; ?>
            </a>
        </li>
    <? endforeach; ?>
</ul>
<? endif; ?>
