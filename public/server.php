<?php
use EasyWeChat\Factory;

$options = [
    'app_id'    => 'wx2ce91af1e4c4689e',
    'secret'    => 'c53700123509519131341ce7dab989ea',
    'token'     => 'xuanzhiwuyu',
    'log' => [
        'level' => 'debug',
        'file'  => '/tmp/easywechat.log',
    ],
    // ...
];

$app = Factory::officialAccount($options);

$server = $app->server;
$user = $app->user;

$server->push(function($message) use ($user) {
    $fromUser = $user->get($message['FromUserName']);

    return "{$fromUser->nickname} welcome to overtrue!";
});

$server->serve()->send();
?>