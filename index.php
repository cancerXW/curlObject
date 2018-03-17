<?php
/**
 * 入口文件
 */

//引入composer自动加载
require __DIR__ . '/vendor/autoload.php';

$str = 'www.baidu.com';

$nwr = new \lib\NetWorkRequest($str);
$result = $nwr->send();
var_dump($result);

