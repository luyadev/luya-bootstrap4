<?php

namespace luya\bootstrap4\widgets;

/**
 * Breadcrumbs for Bootstrap 4.
 *
 * Example Html
 *
 * ```html
 * <ol class="breadcrumb">
 *   <li class="breadcrumb-item active">Home</li>
 * </ol>
 * <ol class="breadcrumb">
 *   <li class="breadcrumb-item"><a href="#">Home</a></li>
 *   <li class="breadcrumb-item active">Library</li>
 * </ol>
 * <ol class="breadcrumb">
 *   <li class="breadcrumb-item"><a href="#">Home</a></li>
 *   <li class="breadcrumb-item"><a href="#">Library</a></li>
 *   <li class="breadcrumb-item active">Data</li>
 * </ol>
 * ```
 *
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.0
 */
class Breadcrumbs extends \yii\widgets\Breadcrumbs
{
    /**
     * @var string the name of the breadcrumb container tag.
     */
    public $tag = 'ol';
    
    /**
     * @var array the HTML attributes for the breadcrumb container tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = ['class' => 'breadcrumb'];
    
    /**
     * @var string the template used to render each inactive item in the breadcrumbs. The token `{link}`
     * will be replaced with the actual HTML link for each inactive item.
     */
    public $itemTemplate = "<li class=\"breadcrumb-item\">{link}</li>\n";
    
    /**
     * @var string the template used to render each active item in the breadcrumbs. The token `{link}`
     * will be replaced with the actual HTML link for each active item.
     */
    public $activeItemTemplate = "<li class=\"breadcrumb-item active\">{link}</li>\n";
}
