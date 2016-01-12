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
              $sql = "select  TABLE_COMMENT from information_schema.`TABLES`  where TABLE_SCHEMA = '".C('DB_NAME')."' and TABLE_NAME = '{$table_name}'";
              $model=M();
              $rows=$model->query($sql);
              $meta_title=$rows[0]['table_comment'];
              //4.查询表中的字段信息 为index.html edit.html 和模型提供数据
              $sql="show full columns from ".$table_name;
              $fields=$model->query($sql);
              foreach($fields as $k=>&$field){
                 if($field['field']=='id'){   //如果字段是id 则除去
                     unset($fields[$k]);
                 }
                  if(strpos($field['comment'],'@')){ //判断注释中有没@
                      $parm='/(.*)@([a-z]+)\|*(.*)/';//用正则表达式匹配出注释内容 并把需要的每段存在子表达式中
                        preg_match($parm,$field['comment'],$result);  //用正则表达式匹配字符串
//                      array(4) {
//                             [0] => string(26) "返回@hhjkj|1=是，0=否"
//                             [1] => string(6) "返回"
//                             [2] => string(5) "hhjkj"
//                             [3] => string(13) "1=是，0=否"
//                       }
                       $field['field_type']=$result[2];
                       $field['comment']=$result[1];
                      if(!empty($result[3])){
                       parse_str($result[3],$option_values);//取出状态值 转换为数组
                       $field['option_values']=$option_values;//放入 是否显示状态
                      }
                  }
              }
              unset($field);
//              dump($fields);
//              exit;
              //5. 定义代码模板的目录
              defined('TPL_PATH') or define('TPL_PATH',ROOT_PATH.'Template/');
              //6.生成控制器
              require TPL_PATH.'Controller.tpl';
              //取出ob缓存中的模板内容,拼写控制器模板内容 并关闭ob缓存
              $controller_content="<?php\r\n".ob_get_clean();
              //拼写控制器文件路径
              $controller_path=APP_PATH.'Admin/Controller/'.$name.'Controller.class.php';
              //把生成控制器内容写入控制器
              file_put_contents($controller_path,$controller_content);

              //7.生成模型
              ob_start();//开启缓存
              //载入模型的 模板
              require TPL_PATH.'Model.tpl';
              //收集模板内容 拼接成php代码 生成模型的内容
              $model_content="<?php\r\n".ob_get_clean();
              //拼接生成模型文件的路径
              $model_path=APP_PATH.'Admin/Model/'.$name.'Model.class.php';
              //把生成模型内容放入模型文件中
              file_put_contents($model_path,$model_content);

              //8..生成增加编辑页面
              ob_start();//开启缓存
              //载入模型的 模板
              require TPL_PATH.'edit.tpl';
              //收集edit编辑页面模板内容 拼接成php代码 生成模型的内容
              $edit_content=ob_get_clean();
              //拼接生成编辑页面文件夹的路径
              $edit_dir=APP_PATH.'Admin/View/'.$name;
                if(!isset($edit_dir)){ //检查存放数据表对应的静态页面是否存在 如果不存在递归创建
                   mkdir($edit_dir,0777,true);
                }
                 $edit_path=$edit_dir.'/edit.html';//合成静态编辑页面路径
                 file_put_contents($edit_path,$edit_content); //把生成模型内容放入模型文件中

              //9..生成显示页面
              ob_start();//开启缓存
              //载入模型的 模板
              require TPL_PATH.'index.tpl';
              //收集index显示页面模板内容 拼接成php代码 生成模型的内容
              $index_content=ob_get_clean();
              //拼接生成显示页面文件夹的路径
              $index_dir=APP_PATH.'Admin/View/'.$name;
              if(!isset($index_dir)){ //检查存放数据表对应的静态页面是否存在 如果不存在递归创建
                  mkdir($index_dir,0777,true);
              }
              $index_path=$index_dir.'/index.html';//合成静态显示页面路径
//              dump($index_content);
//              dump($index_path);
//              exit;
              file_put_contents($index_path,$index_content); //把生成模型内容放入模型文件中
          }else{    //git方式提交过来是展示输入表名页面
              $this->assign('meta_title','代码生成器');
              $this->display('index');
          }
      }
}