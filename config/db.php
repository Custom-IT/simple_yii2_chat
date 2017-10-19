<?php

return [
    'class' => 'yii\db\Connection',
    // 'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'dsn' => 'sqlite:' . __DIR__  .'/../chat.db',
    // 'username' => 'root',
    // 'password' => '',
    'charset' => 'utf8',
];
