<?php
defined('WEB_URL') or define('WEB_URL','http://admin.shop.com/');
return array(
    'TMPL_PARSE_STRING'=>array(
        '__CSS__'=>WEB_URL.'Public/Admin/css',
        '__JS__'=>WEB_URL.'Public/Admin/js',
        '__IMG__'=>WEB_URL.'Public/Admin/images',
        '__LAYER__'=>WEB_URL.'Public/Admin/layer/layer.js',
    )
);