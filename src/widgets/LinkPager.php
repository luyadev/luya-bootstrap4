<?php

namespace luya\bootstrap4\widgets;

/**
 * Link Pager Widget.
 *
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.0
 */
class LinkPager extends \yii\widgets\LinkPager
{
    /**
     * @var array HTML attributes for the pager container tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = ['class' => 'pagination'];
    
    /**
     * @var array HTML attributes for the link in a pager container tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $linkOptions = ['class' => 'page-link'];
    /**
     * @var string the CSS class for the each page button.
     * @since 2.0.7
     */
    public $pageCssClass = 'page-item';
    /**
     * @var string the CSS class for the "first" page button.
     */
    public $firstPageCssClass = '';
    /**
     * @var string the CSS class for the "last" page button.
     */
    public $lastPageCssClass = '';
    /**
     * @var string the CSS class for the "previous" page button.
     */
    public $prevPageCssClass = 'page-item';
    /**
     * @var string the CSS class for the "next" page button.
     */
    public $nextPageCssClass = 'page-item';
    /**
     * @var string the CSS class for the active (currently selected) page button.
     */
    public $activePageCssClass = 'active';
    /**
     * @var string the CSS class for the disabled page buttons.
     */
    public $disabledPageCssClass = 'disabled';
    
    /**
     * @inheritdoc
     */
    public $disabledListItemSubTagOptions = ['class' => 'page-link', 'tag' => 'a'];
    
    /**
     * @var int maximum number of page buttons that can be displayed. Defaults to 10.
     */
    public $maxButtonCount = 10;
    /**
     * @var string|bool the label for the "next" page button. Note that this will NOT be HTML-encoded.
     * If this property is false, the "next" page button will not be displayed.
     */
    public $nextPageLabel = '&raquo;';
    /**
     * @var string|bool the text label for the previous page button. Note that this will NOT be HTML-encoded.
     * If this property is false, the "previous" page button will not be displayed.
     */
    public $prevPageLabel = '&laquo;';
    /**
     * @var string|bool the text label for the "first" page button. Note that this will NOT be HTML-encoded.
     * If it's specified as true, page number will be used as label.
     * Default is false that means the "first" page button will not be displayed.
     */
    public $firstPageLabel = false;
    /**
     * @var string|bool the text label for the "last" page button. Note that this will NOT be HTML-encoded.
     * If it's specified as true, page number will be used as label.
     * Default is false that means the "last" page button will not be displayed.
     */
    public $lastPageLabel = false;
}
