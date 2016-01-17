<?php

namespace Admin\Controller;

use Think\Controller;

class GoodsController extends BaseController
{
    protected $meta_title = "商品";
    //告诉父类的add 和edit方法收集post提交过去的所有数据
    protected $usePostParams=true;
    public function _edit_view_before(){
        //1.准备商品分类数据
        $goodscategorymodel=D('GoodsCategory');
        $rows=$goodscategorymodel->getTreeList(true,'id,name,parent_id');
        $this->assign('zNodes',$rows);
//        dump($rows);
//        exit;
        //2.准备品牌数据   在展示添加页面显示
        $brandmodel=D('Brand');
        $brands=$brandmodel->getList('id,name');
        $this->assign('brands',$brands);
        //3.准备供货商数据
        $suppliermodel=D('Supplier');
        $suppliers=$suppliermodel->getList('id,name');
        $this->assign('suppliers',$suppliers);
        //4.向页面展示会员级别信息
        $memberlevelmodel=D('MemberLevel');
        $memberlevels=$memberlevelmodel->getList('id,name');
        $this->assign('memberlevels',$memberlevels);
        //判断是添加还是编辑 如果是编辑则要回显简介内容
        $id=I('get.id');
        if(!empty($id)){     //$id不为空是说明是编辑
            //10.1编辑时 提供商品会员价格数据
            $goodsmemberpricemodel=D('goodsMemberPrice');
            $goodsmemberprices=$goodsmemberpricemodel->getmemberprice($id);//返回一维数组
            $this->assign('goodsmemberprices',$goodsmemberprices);
            //10.2 编辑时提供回显简介内容
             $goodsintromodel=M('GoodsIntro');
            $intro=$goodsintromodel->getFieldByGoods_id($id,'intro');
            $this->assign('intro',$intro);
            //10.3 编辑时准备goodsphoto表中的数据
            $goodsphotomodel=M('GoodsPhoto');
            $goodsPhotos=$goodsphotomodel->field('id,path')->where(array('goods_id'=>$id))->select();
//            dump($goodsPhotos);
//            exit;
            $this->assign('goodsPhotos',$goodsPhotos);
        }
    }

}