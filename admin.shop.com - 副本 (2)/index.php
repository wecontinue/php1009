<?php
header('Content-Type: text/html;charset=utf-8');
//1.检查php的版本,版本低于5.3就退出
version_compare(PHP_VERSION,'5.3','>') or exit('版本太低!');
//2.定义项目的根目录常量
define('ROOT_PATH',dirname($_SERVER['SCRIPT_FILENAME']).'/');
//>>3.定义框架的目录
define('THINK_PATH',dirname(ROOT_PATH).'/ThinkPHP/');
//ROOT_PATH===>F:/shop/admin.shop.com/ 框架目录在上层
//4.定义应用目录
define('APP_PATH',ROOT_PATH.'Application/');
//5.定义运行时的目录
define('RUNTIME_PATH',ROOT_PATH.'Runtime/');
//6.设置调试 模式
define('APP_DEBUG',true);
//7.绑定指定的一个 模块
//define('BIND_MODULE','Admin');//如果绑定了模块,访问时参数上面不用再写Admin,如果没绑定则要写
//8.加载框架的入口文件
require THINK_PATH.'ThinkPHP.php';

