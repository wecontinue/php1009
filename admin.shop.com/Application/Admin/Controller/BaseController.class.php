<?php
namespace Admin\Controller;

use Think\Controller;

class BaseController extends Controller{

    protected $model;
    //创建模型对象
    public function _initialize()
    {
        $this->model = D(CONTROLLER_NAME);
    }
  //展示分页列表
    public function index()
    {
        $keyword = I('get.keyword', '');  //得到查询条件
        $where = array();//用来存放查询条件
        if (!empty($keyword)) {
            $where['name'] = array("like", "{$keyword}%");
        }
        //获取供货商列表和分页工具条数据放在数组PageRelult里面
        $pageResult = $this->model->getPageResult($where);
        cookie('__forward__', $_SERVER['REQUEST_URI']);
        $this->assign('meta_title', $this->meta_title);
        $this->assign($pageResult);
        $this->display('index');
    }
  //改变显示状态及伪删除
    public function changeStatus($id, $status = -1)
    {
        $model = D('Supplier');
        $rst = $this->model->changeStatus($id, $status);//调用模型中的changeStatus方法
        if ($rst !== false) {
            $this->success('操作成功!!!', cookie('__forword__'));
        } else {
            $this->error('操作失败!!!' . show_model_error($this->model));
        }
    }
//添加功能
    public function add()
    {
        if (IS_POST) {//post提交 添加
            if ($this->model->create() !== false) {
                if ($this->model->add() !== false) {
                    $this->success('添加成功', U('index'));
                    return;//防止代码向下继续执行
                }
            }
            $this->error('操作失败!!!' . show_model_error($this->model));
        } else {//get方式提交 展示添加页面
            $this->assign('meta_title', '添加' . $this->meta_title);
            $this->display('edit');
        }
    }
//编辑功能
    public function edit($id)
    {
        if (IS_POST) {
            if ($this->model->create() !== false) {//收集请求参数
                if ($this->model->save() !== false) {//修改
                    $this->success('修改成功!!!', cookie('__forward__'));
                    return;
                }
            }
            $this->error('操作失败!!!' . show_model_error($this->model));
        } else {
            $row = $this->model->find($id);//查询出这条数据
            $this->assign($row);//向叶面分配数据
            $this->assign('meta_title', '编辑'.$this->meta_title);
            $this->display('edit');//加载叶面
        }
    }


}