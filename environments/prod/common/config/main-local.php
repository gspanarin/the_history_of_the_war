<?php

return [
    'components' => [
        //'db' => [
        //    'class' => 'yii\db\Connection',
        //    'dsn' => 'mysql:host=localhost;dbname=warhistory',
        //    'username' => 'root',
        //    'password' => '',
        //    'charset' => 'utf8',
        //],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
    ],
];
