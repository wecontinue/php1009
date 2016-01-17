<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;

class UploadController extends Controller{
    public function index(){
        $dir=I('post.dir');//上传的根目录
        //上传本地配置
        $config=array(
            'rootPath' =>'./Uploads/',//保存根路径
            'savePath'     => $dir.'/', //保存根目录


        );
//        $config=C('UPLOAD_CONFIG');//上传upyun的配置
        $uploader=new Upload($config);
        $result=$uploader->uploadOne($_FILES['Filedata']);
        if($result!==false){
            //将上传路径输出给浏览器
            echo $result['savepath'].$result['savename'];
        }else{
            echo $uploader->getError();
        }
        exit;
    }
}