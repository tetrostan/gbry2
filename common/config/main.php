<?php
return [
    'name' => 'Advert Project',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [

        'db' => require(dirname(__DIR__)."/config/db.php"),
        'cache' => [
//            'class' => 'yii\caching\FileCache',
            'class' => 'common\cache\Base64Cache',
        ],

        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
];
