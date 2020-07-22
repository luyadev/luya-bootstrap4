<?php

namespace luya\bootstrap4\tests\src\widgets;

use luya\bootstrap4\widgets\LinkPager;

class LinkPagerTest extends \luya\bootstrap4\tests\src\BaseBootstrap4WidgetTestCase
{
    public function testDefaultOutput()
    {
        $pag = new \yii\data\Pagination();
        ob_start();
        ob_implicit_flush(false);
        echo LinkPager::widget(['pagination' => $pag]);

        $this->assertContainsTrimmed('', ob_get_clean());
    }

    public function testDefaultOutputWithTotalCount()
    {
        $pag = new \yii\data\Pagination([
            'totalCount' => 20
        ]);
        ob_start();
        ob_implicit_flush(false);
        echo LinkPager::widget(['pagination' => $pag]);

        $this->assertContainsTrimmed('', ob_get_clean());
    }

    public function testDefaultOutputWithPageSize()
    {
        $pag = new \yii\data\Pagination([
            'pageSize' => 5
        ]);
        ob_start();
        ob_implicit_flush(false);
        echo LinkPager::widget(['pagination' => $pag]);

        $this->assertContainsTrimmed('', ob_get_clean());
    }

    public function testDefaultOutputWithCurrentPage1()
    {
        $pag = new \yii\data\Pagination([
            'page' => 1
        ]);
        ob_start();
        ob_implicit_flush(false);
        echo LinkPager::widget(['pagination' => $pag]);

        $this->assertContainsTrimmed('', ob_get_clean());
    }

    public function testDefaultOutputWithCurrentPage4()
    {
        $pag = new \yii\data\Pagination([
            'page' => 4
        ]);
        ob_start();
        ob_implicit_flush(false);
        echo LinkPager::widget(['pagination' => $pag]);

        $this->assertContainsTrimmed('', ob_get_clean());
    }

    public function testDefaultOutputWithCurrentPage7()
    {
        $pag = new \yii\data\Pagination([
            'page' => 7
        ]);
        ob_start();
        ob_implicit_flush(false);
        echo LinkPager::widget(['pagination' => $pag]);

        $this->assertContainsTrimmed('', ob_get_clean());
    }

    public function testDefaultOutputCombinedPage0of0()
    {
        $pag = new \yii\data\Pagination([
            'totalCount' => 5,
            'pageSize' => 5,
            'page' => 0
        ]);
        ob_start();
        ob_implicit_flush(false);
        echo LinkPager::widget(['pagination' => $pag]);

        $this->assertContainsTrimmed('', ob_get_clean());
    }

    public function testDefaultOutputCombinedPage0of1()
    {
        $pag = new \yii\data\Pagination([
            'totalCount' => 10,
            'pageSize' => 5,
            'page' => 0
        ]);
        ob_start();
        ob_implicit_flush(false);
        echo LinkPager::widget(['pagination' => $pag]);

        $this->assertContainsTrimmed('<ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link">«</a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="/?page=1&amp;per-page=5" data-page="0">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="/?page=2&amp;per-page=5" data-page="1">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="/?page=2&amp;per-page=5" data-page="1">»</a>
                </li>
            </ul>', ob_get_clean());
    }

//    public function testDefaultOutputCombinedPage0of7()
//    {
//        $pag = new \yii\data\Pagination([
//            'totalCount' => 40,
//            'pageSize' => 5,
//            'page' => 0
//        ]);
//        ob_start();
//        ob_implicit_flush(false);
//        echo LinkPager::widget(['pagination' => $pag]);
//
//        $this->assertContainsTrimmed('', ob_get_clean());
//    }
//
//    public function testDefaultOutputCombinedPage3of7()
//    {
//        $pag = new \yii\data\Pagination([
//            'totalCount' => 40,
//            'pageSize' => 5,
//            'page' => 3
//        ]);
//        ob_start();
//        ob_implicit_flush(false);
//        echo LinkPager::widget(['pagination' => $pag]);
//
//        $this->assertContainsTrimmed('', ob_get_clean());
//    }
//
//    public function testDefaultOutputCombinedPage6of7()
//    {
//        $pag = new \yii\data\Pagination([
//            'totalCount' => 40,
//            'pageSize' => 5,
//            'page' => 6
//        ]);
//        ob_start();
//        ob_implicit_flush(false);
//        echo LinkPager::widget(['pagination' => $pag]);
//
//        $this->assertContainsTrimmed('', ob_get_clean());
//    }
}