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
        '__TREEGRID__'=>WEB_URL.'Public/Admin/treegrid',//树结构样式路径
        '__ZTREE__'=>WEB_URL.'Public/Admin/zTree',//树结构回显样式路径
        '__UEDITOR__'=>WEB_URL.'Public/Admin/ueditor',//在线编辑器样式路径
        '__BRAND__'=>'http://brand-logo.b0.upaiyun.com/',//代表upyun上brand_logo空间的域名
    ),

    'UPLOAD_CONFIG'=> $config = array(
            //'rootPath'     => './Uploads/', //保存根路径
        'rootPath' => './', //保存到upyun的根路径
            //'savePath'     => $dir.'/', //保存路径
        'driver' => 'Upyun', // 文件上传驱动
        'driverConfig' => array(
            'host'     => 'v0.api.upyun.com', //又拍云服务器
            'username' => 'itsource', //又拍操作员用户
            'password' => 'itsource', //又拍云操作员密码
            'bucket' => $dir, //空间名称
            'timeout' => 90, //超时时间
        ), // 上传驱动配置
    ),
);