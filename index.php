<?php

require_once './vendor/autoload.php';

use Suntao\RobotApi\FeiShu;

$obj = new FeiShu('91804075-a933-4e65-a8b9-a4b2f9429ae4');
//$res = $obj->sendText("测试一下");
//var_dump($res);

$header = [
    'title' => [
        'tag' => 'plain_text',
        'content' => '这是一个标题...',
    ],
    'template' => 'red',
];
$elements = [
    [
        'tag' => 'markdown',
        'content' => '***报错信息***',
    ],
    [
        'tag' => 'action',
        'actions' => [
            [
                'tag' => 'button',
                'text' => [
                    'content' => '查看具体错误信息',
                    'tag' => 'lark_md',
                ],
                'url' => 'https://www.baidu.com',
                'type' => 'default',
            ]
        ]
    ]
];
$res = $obj->sendCard($header, $elements);
var_dump($res);