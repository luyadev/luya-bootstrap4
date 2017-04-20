<?php

namespace luya\bootstrap4\tests;

use PHPUnit\Framework\TestCase;
use luya\Boot;

class Bootstrap4TestCase extends TestCase
{
    public $app;
    
    protected function setUp()
    {
        $_SERVER['SCRIPT_FILENAME'] = 'index.php';
        $_SERVER['SCRIPT_NAME'] =  '/index.php';
        $_SERVER['REQUEST_URI'] = '/';
        $this->app = new Boot();
        $this->app->mockOnly = true;
        $this->app->setBaseYiiFile(__DIR__.'/../vendor/yiisoft/yii2/Yii.php');
        $this->app->setConfigArray(['id' => 'id', 'basePath' => dirname(__DIR__)]);
        $this->app->applicationWeb();
    }
}
