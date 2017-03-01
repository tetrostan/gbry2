<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db' => require(dirname(__DIR__) . '/config/db.php'),
            'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
