<?php

namespace Admin\Model;

use Think\Model;

class GoodsMemberPriceModel extends Model{
    //此方法用于的到每个商品对应的会员价格
    public function getmemberprice($goods_id){
        $rows=$this->field('member_level_id,price')->where(array('goods_id'=>$goods_id))->select();
        $member_level_ids=array_column($rows,'member_level_id');//取数组中的一个键对应的值组成一个新数组
        $prices=array_column($rows,'price');
        $goodsmemberprices=array_combine($member_level_ids,$prices);//取一个数组的值作为键,另一个数组的值作为值,组成一个新数组
//           dump($goodsmemberprices);
//        exit;
//        array(4) {
//            [1] => string(6) "222.00"
//  [2] => string(6) "222.00"
//  [3] => string(7) "2222.00"
//  [4] => string(7) "2222.00"
//}
        return $goodsmemberprices;  //返回一位数组
    }
}