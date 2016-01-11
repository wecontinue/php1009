<?php

namespace Admin\Controller;

use Think\Controller;

class GiiController extends Controller{
      public function index(){
          if(IS_POST){  //post提交过来是根据表名生成控制器
              header('Content-Type: text/html;charset=utf-8');
              //1.获取用户传过来的表名字
              $table_name=I('post.table_name');
              //2.根据表名生成规范的thinkphp控制器的名字
              $name=parse_name($table_name,1);
              //3.通过表名的到表的注解
              $sql="select TABLE_COMMENT from information_schema.`TABLES` where TABLE_SCHEMA = '".C('DB_NAME')."' and TABLE_NAME='{$table_name}'";
               $model=M();
              $rows=$model->query($sql);
              $meta_title=$rows[0]['table_comment'];
              //4.查询表中的字段信息 为index.html edit.html 和模型提供数据
              $sql="show full columns from ".$table_name;
              $fields=$model->query($sql);
              //5. 定义代码模板的目录
              defined('TPL_PATH') or define('TPL_PATH',ROOT_PATH.'Template/');
              //6.生成控制器
              require TPL_PATH.'Controller.tpl';
              //取出ob缓存中的模板内容,拼写控制器模板内容 并关闭ob缓存
              $controller_content="<?php\r\n".ob_get_contents();
              //拼写控制器文件路径
              $controller_path=APP_PATH.'Admin/Controller/'.$name.'Controller.class.php';
              //把生成控制器内容写入控制器
              file_put_contents($controller_path,$controller_content);

              //生成模型
              ob_start();//开启缓存
              //载入模型的 模板
              require TPL_PATH.'Model.tpl';
              //收集模板内容 拼接成php代码 生成模型的内容
              $model_content="<?php\r\n".ob_get_clean();
              //拼接生成模型文件的路径
              $model_path=APP_PATH.'Admin/Model/'.$name.'Model.class.php';
              //把生成模型内容放入模型文件中
              file_put_contents($model_path,$model_content);
          }else{//git方式提交过来是展示输入表名页面
           $this->assign('meta_title','代码生成器');
              $this->display('index');
          }
      }
}