<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
require(__DIR__ . '/../../vendor/autoload.php');
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../../common/config/bootstrap.php');
require(__DIR__ . '/../config/bootstrap.php');
$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../common/config/main.php'),
    // /../../common/config/main-local.php перекрывает настройки /../config/main.php
// вместо /../../common/config/main-local.php используем common/config/db.php
//    require(__DIR__ . '/../../common/config/main-local.php'),
    require(__DIR__ . '/../config/main.php'),
    require(__DIR__ . '/../config/main-local.php')
);
//(new yii\web\Application($config))->run();

/*
// 1 variant
$service = new \yii\di\ServiceLocator();
$service->set('cache', 'yii\caching\FileCache');

$application = new yii\web\Application($config);
$application->set('locator', $service);
$application->run();

// is identical to

*/
// 2 variant
$application = new yii\web\Application($config);
$application->set('locator', 'yii\caching\FileCache');
$application->run();