<?php

namespace Admin\Model;
use Think\Model;

class GoodsModel extends BaseModel{
    // 自动验证定义
    protected $_validate1 = array(
          array('name','require','商品名称不能够为空'),
array('short_name','require','简称不能够为空'),
array('goods_category_id','require','商品分类不能够为空'),
array('brand_id','require','商品品牌不能够为空'),
array('shop_price','require','本店价格不能够为空'),
array('market_price','require','市场价格不能够为空'),
array('logo','require','商品LOGO不能够为空'),
array('stock','require','库存不能够为空'),
//array('goods_status','require','商品状态不能够为空'),
array('status','require','是否显示不能够为空'),
     );


    public function add($requestData){
//        unset($requestData['id']);//添加时去掉隐藏域中提交过来的id
//          dump($requestData);
//           exit;
        //$requestData中包含了提交表单中所有请求数据  而create中值收集的this_data即对应表中的数据
        // 插入两个表数据 是一个整体工作 放事务里
        $this->startTrans();//开启事务
        // 1.整理goods_status中的数据 将$this->data中的数据保存到Goods表中 返回值为添加后id
        $this->handleGoodsStatus();
        $id=parent::add();
        if($id===false){
            $this->rollback();//回滚事务
            return false;
        }
        //2.计算出当前货号更行到数据表中 货号是根据生成id和日期自动生成
        $sn=date('Ymd').str_pad($id, 9, "0", STR_PAD_LEFT);//此函数用于补全一个字符为多少位长度参数(原数,几位,用什么补,在那边补)
        //修改 货号在表中
        $rst=parent::save(array('id'=>$id,'sn'=>$sn));
        if($rst===false){   //保存不成功
            $this->error='保存货号失败!!!';
            $this->rollback(); //回滚事务
            return false;
        }
        //3.将商品描述保存到goods_Intro表中
        $goodsintromodel=M('GoodsIntro');
        $result1=$goodsintromodel->add(array('goods_id'=>$id,'intro'=>$requestData['intro']));
        if($result1===false){
            $this->error='保存商品描述失败';
            $this->rollback();//回滚事务
            return false;
        }
        //4.添加商品对应会员价格
        $result2=$this->handleMemberprice($id,$requestData['memberlevelprice']);
        if($result2===false){
            $this->rollback();
            return false;
        }
        //5. 添加商品相片
        $result3=$this->handleGoodsPhoto($id,$requestData['goods_photo_paths']);
//        dump($requestData['goods_photo_paths']);
//            exit;
        if($result3===false){
            $this->rollback();
            return false;
        }
        $this->commit();// 全部成功 提交事务
        return $id; //返回$id
    }



    //重写save方法 用于同时修改两个表(goods,goods_intro)的数据
    public function save($requestData){   //$requestData表示post提交过来的全部值I("post.")
        $goods_id=$this->data['id'];//修改商品的id 也是简介表单id
        $this->startTrans();//开启事务
        //1.将$this->data中的数据保存到goods表中
        $this->handleGoodsStatus();//计算状态值
        $result=parent::save();
        if($result===false){
            $this->rollback();
            return false;
        }
        //2.将intro数据更新到goods_intro表中
        $goodsintromodel=M('GoodsIntro');
        $rst=$goodsintromodel->save(array('goods_id'=>$goods_id,'intro'=>$requestData['intro']));
        if($rst===false){
            $this->error="更新商品描述失败!!!";
            $this->rollback();
            return false;
        }
        // 3. 编辑商品会员价格 将原来会员价格删除 .添加新会员价格
        $rs= $this->handleMemberprice($goods_id,$requestData['memberlevelprice']);
       if($rs===false){
           return false;
       };

        //编辑时 将添加的新照片 存入数据表goods_photo
        $result3=$this->handleGoodsPhoto($goods_id,$requestData['goods_photo_paths']);
//        dump($requestData['goods_photo_paths']);
//            exit;
        if($result3===false){
            $this->rollback();
            return false;
        }
        $this->commit();//所有都成功的话 提交事务
        return $result;
    }

    //此方法用于添加会员对应的价格
    private function handleMemberprice($goods_id,$memberlevelprices){
        $memberlevelpricemodel=M('GoodsMemberPrice');
        //1.1先删除原来的会员对应价格 添加时删除空 编辑时删除响应的会员价格
        $result=$memberlevelpricemodel->where(array('goods_id'=>$goods_id))->delete();
        if($result===false){
            $this->rollback();
            $this->error = '删除会员价格失败!';
            return false;
        }
        //1.2再添加
        $rows=array();//用于存放每个会员对应的价格 ,会员商品$id
        foreach($memberlevelprices as $member_level_id=>$price){
            $rows[]=array('goods_id'=>$goods_id,'member_level_id'=>$member_level_id,'price'=>$price);
        }
//        dump($memberlevelprices);
//        exit;
        if(!empty($rows)){
            $rst=$memberlevelpricemodel->addAll($rows);//一次性向商品会员价格插入多条数据
            if($rst===false){
                $this->error='保存会员价格失败';
                return false;
            }
        }
    }
    //此方法用于计算商品的状态值 保存在数据表中
    private function handleGoodsStatus(){
        $goods_status=0;//初始值设为0
        //循环出他的状态值 和初始值求或运算 结果赋值给状态
        foreach($this->data['goods_status'] as $zt){
            $goods_status=$goods_status | $zt;
        }
        $this->data['goods_status']=$goods_status;
    }
    //此方法用于处理商品照片的保存数据 保存在数据表中
    private function handleGoodsPhoto($goods_id,$goods_photo_paths){
        $goodsphotoModel=M('GoodsPhoto');
        $rows=array();
        foreach($goods_photo_paths as $path){
            $rows[]=array('goods_id'=>$goods_id,'path'=>$path);//取出每一个相片的路径和它对应的商品id对应起来
        }
        if(!empty($rows)){ //不是空的话 向表中一次性插入多条数据
            $rst2=$goodsphotoModel->addAll($rows);
               if($rst2===false){
                   $this->error='保存照片失败';
                   return false;
               }
        }
    }
}