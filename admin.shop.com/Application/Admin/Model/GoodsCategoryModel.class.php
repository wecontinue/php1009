<?php

namespace Admin\Model;
use Admin\Service\NestedSetsService;
use Think\Model;

class GoodsCategoryModel extends BaseModel{
    // 自动验证定义
    protected $_validate = array(
          array('name','require','分类名称不能够为空'),
          array('parent_id','require','父级分类id不能够为空'),
          array('status','require','是否显示不能够为空'),
     );
    public function getTreeList($isJSON=false,$field='*'){
       $row=$this->field($field)->where(array('status'=>array('egt',0)))->order('lft')->select();
        if($isJSON){
            return json_encode($row);//如果浏览器要求返回json数据 我们就返回json数据
        }else{
            return $row;
        }
    }
    public function add(){
        //1.创建能偶执行sql的对象
        $dbMysql= new DbMysqlInterfaceImplModel();
        //2.计算边界
        $NestedSetsService=new NestedSetsService($dbMysql,'goods_category','lft','rgt','parent_id','id','level');
        //添加接点放在哪个父接点下 并且返回该接点对应的id
        return $NestedSetsService->insert($this->data['parent_id'],$this->data,'bottom');
    }
    public function save(){
        //创建执行sql的对象
        $dbMysql=new DbMysqlInterfaceImplModel();
        //计算被边界
        $nestedSetsService=new NestedSetsService($dbMysql,'goods_category','lft','rgt','parent_id','id','level');
     //将指定的节点移动到父节点下
        $nestedSetsService->moveUnder($this->data['id'],$this->data['parent_id']);
        ////将请求中的其他数据修改到数据表中
        return parent::save();
    }
    public function changeStatus($id,$status=-1){
        //根据自己的id找到所有子孙的id
        $sql = "select child.id from  goods_category as child,goods_category as parent where  parent.id = {$id}  and child.lft>=parent.lft  and child.rgt<=parent.rgt";
        $rows=$this->query($sql);//query 的结果为二维数组
        $id=array_column($rows,'id');//取出二维数组中的一个字段组成一个一维数组-> id字段 即id的数组
        $data=array('id'=>array('in',$id),'status'=>$status);
        if($status==-1){
            $data['name']=array('exp',"concat(name,'_del')");
        }
        return parent::save($data);
    }

}