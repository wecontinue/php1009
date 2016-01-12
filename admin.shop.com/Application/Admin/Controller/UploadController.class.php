<?php
namespace Admin\Controller;

use Think\Controller;
use Think\Upload;

class UploadController extends Controller{
    public function index(){
        $dir=I('post.dir');//获取浏览器指定的空间（服务）
        $config=array(
            'rootPath' =>'./',//保存到upyun的根路径
            'driver'=>'Upyun',//文件驱动
            'driverConfig'=>array( //上传驱动配置
                'host'=>'v0.api.upyun.com',//又拍云服务器
                 'username' => 'itsource', //又拍操作员用户
                 'password' => 'itsource', //又拍操作员用户
                 'bucket' => $dir, //又拍操作员用户
                 'timeout' => 90, //超时时间
            ),
        );
        $uploader=new Upload($config);
        $result=$uploader->uploadOne($_FILES['Filedata']);
        if($result!==false){
            //将上传路径输出给浏览器
            echo $result['savepath'].$result['savename'];
        }else{
            echo $uploader->getError();
        }
    }
}