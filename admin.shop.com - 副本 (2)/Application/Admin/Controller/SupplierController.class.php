<?php

namespace Admin\Controller;

use Think\Controller;

class SupplierController extends Controller{
     private $model;  //创建模型对象保存在属性中
         public function _initialize(){
            $this->model=D('Supplier');
         }

    public function index(){
        $keyword=I('get.keyword','');  //得到查询条件
        $where=array();//用来存放查询条件
        if(!empty($keyword)){
            $where['name']=array("like","{$keyword}%");
        }
        //获取供货商列表和分页工具条数据放在数组PageRelult里面
        $pageResult=$this->model->getPageResult($where);
        cookie('__forward__',$_SERVER['REQUEST_URI']);
        $this->assign($pageResult);
        $this->display('index');
    }
    //添加供应商
    public function add(){
        if(IS_POST){//post提交 添加
            if($this->model->create()!==false) {
                if ($this->model->add() !== false) {
                    $this->success('添加成功', U('index'));
                    return;//防止代码向下继续执行
                }
            }
                $this->error('操作失败!!!'.show_model_error($this->model));
        }else{//get方式提交 展示添加页面
            $this->display('edit');
        }
    }
    //删除供应商
//    public function remove($id){
//        $model=D('Supplier');
//        $result=$model->remove($id);
//        if($result!==false){
//            $this->success('删除成功!!!',U('index'));
//        }else{
//            $this->error('删除失败!!!'.show_model_error($model));
//        }
//    }
    //编辑商品
    public function edit($id){
        if(IS_POST){
            if($this->model->create()!==false){//收集请求参数
                if($this->model->save()!==false){//修改
                    $this->success('修改成功!!!',cookie('__forward__'));
                    return;
                }
            }
            $this->error('操作失败!!!'.show_model_error($this->model));
        }else{
         $row=$this->model->find($id);//查询出这条数据
         $this->assign($row);//向叶面分配数据
         $this->display('edit');//加载叶面
        }
    }
    //改变状态, 删除(伪删除加标识)
    public function changeStatus($id,$status=-1){
        $model=D('Supplier');
        $rst=$this->model->changeStatus($id,$status);//调用模型中的changeStatus方法
        if($rst!==false){
            $this->success('操作成功!!!',cookie('__forword__'));
        }else{
            $this->error('操作失败!!!'.show_model_error($this->model));
        }
    }


//    /**
//     * @param $model
//     * @return string
//     */显示错误信息的方法
//    public function getShowError($model)
//    {
//        $errors = $model->getError();
//        $errorMsg = '<ul>';
//        if (is_array($errors)) {
//            foreach ($errors as $error) {//错误结果有多条
//                $errorMsg .= "<li>$error</li>";
//            }
//        } else {//错误结果仅一条
//            $errorMsg .= "<li>$errors</li>";
//        }
//        $errorMsg .= "</ul>";
//        return $errorMsg;
//    }
//
}