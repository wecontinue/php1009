<?php

namespace Admin\Controller;

use Think\Controller;

class GoodsCategoryController extends BaseController
{
    protected $meta_title = "商品分类";
    public function index(){
        //获取供货商列表和分页工具条数据放在数组PageRelult里面
        $rows = $this->model->getTreeList();
        cookie('__forward__', $_SERVER['REQUEST_URI']);
        $this->assign('meta_title', $this->meta_title);
        $this->assign('rows',$rows);
        $this->display('index');
    }
//    public function add()
//    {
//        if (IS_POST) {//post提交 添加
//            if ($this->model->create() !== false) {
//                if ($this->model->add() !== false) {
//                    $this->success('添加成功', U('index'));
//                    return;//防止代码向下继续执行
//                }
//            }
//            $this->error('操作失败!!!' . show_model_error($this->model));
//        } else {//get方式提交 展示添加页面
//            $this->_edit_view_before();
//            $this->assign('meta_title', '添加' . $this->meta_title);
//            $this->display('edit');
//        }
//    }
   //添加 编辑分类前先在视图页面显示出所有分类
    public function _edit_view_before(){
        $rows=$this->model->getTreeList(true,'id,name,parent_id');
        $this->assign('zNodes',$rows);
    }
}
