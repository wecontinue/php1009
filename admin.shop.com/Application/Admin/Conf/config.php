<?php
//定义域名为一常量
defined('WEB_URL') or define('WEB_URL','http://admin.shop.com:8080/');
return array(
    //配置替换静态文件的常量路径
	'TMPL_PARSE_STRING'=>array(
        '__CSS__'=>WEB_URL.'Public/Admin/css',
        '__JS__'=>WEB_URL.'Public/Admin/js',
        '__IMG__'=>WEB_URL.'Public/Admin/images',
        '__LAYER__'=>WEB_URL.'/Public/Admin/layer/layer.js',
        '__UPLOADIFY__'=>WEB_URL.'Public/Admin/uploadify',//上传文件样式路径
        '__BRAND__'=>'http://brand-logo.b0.upaiyun.com/',//代表upyun上brand_logo空间的域名
    )
);