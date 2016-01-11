<?php
namespace Admin\Model;

use Think\Controller;
use Think\Model;
use Think\Page;

class BaseModel extends Model{

    protected $patchValidate = true; //开启批量验证
     //得到列表及分页工具条数据
    public function getPageResult($where = array())
    {
        //1.获取分页工具条数据
        $where['status'] = array('gt', -1);
        $pageSize = 2;//每页显示条数
        $totalRows = $this->where($where)->count();// 总条数
        $page = new Page($totalRows, $pageSize);//创建分页对象
        if ($page->totalRows > $page->listRows) {
            $page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        }
        $pageHtml = $page->show();//生成分页的html
        //2.准备分页列表显示数据
        if ($page->firstRow > $totalRows) {  //删除时当每页的起始条数大于等于总条数时,说明该页没数据了,该项前回退一页显示
//          或  $page->firstRow==$totalRows&&$totalRows!==0&&$totalRows>$page->listRows
            $page->firstRow = $totalRows - $page->listRows;//起始条数=总条数-每页显示条数
        }
        $rows = $this->where($where)->limit($page->firstRow, $page->listRows)->select();
        return array('rows' => $rows, 'pageHtml' => $pageHtml);
    }
    //改变显示状态及伪删除
    public function changeStatus($id, $status = -1)
    {
        $data = array('id' => array('in', $id), 'status' => $status);
        if ($status == -1) {//status值为-1时 表示删除 给名字加上删除标识
            $data['name'] = array('exp', "concat(name,'_del')");
        }
        return parent::save($data);
    }
}