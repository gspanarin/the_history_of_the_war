<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules'=>[
        'pdfjs' => [
            'class' => '\yii2assets\pdfjs\Module',
        ],
    ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=' . env('DB_HOST') . ';dbname=' . env('DB_NAME'),
            'username' => env('DB_USER'),
            'password' => env('DB_PASS'),
            'charset' => 'utf8mb4',
        ],
		'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
			'transport' => [
				'class' => 'Swift_SmtpTransport',
				'host' => env('COMMON.EMAIL.HOST'),
				'username' => env('COMMON.EMAIL.USERNAME'),
				'password' => env('COMMON.EMAIL.PASSWORD'),
				'port' => env('COMMON.EMAIL.PORT'),
				//'encryption' => 'ssl',
			],
			'useFileTransport' => false,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class'           => 'yii\rbac\DbManager', 
            'itemTable'       => 'auth_item',
            'itemChildTable'  => 'auth_item_child',
            'assignmentTable' => 'auth_assignment',
            'ruleTable'       => 'auth_rule',
            //'defaultRoles'    => ['guest'],// роль которая назначается всем пользователям по умолчанию
        ],
        'session' => [
			'class' => 'yii\web\DbSession',
			'writeCallback' => function ($session) {
				return [
				   'user_id' => Yii::$app->user->id,
				   'last_write' => time(),
			   ];
			},
		],
        
        'storage' => [
            'class' => 'common\components\storage', 
            'path' => [
                'storage1'
            ]
        ]
    ],
];
