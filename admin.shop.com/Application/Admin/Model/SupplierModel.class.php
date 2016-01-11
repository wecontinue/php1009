<?php

namespace Admin\Model;
use Think\Model;

class SupplierModel extends BaseModel{
    // 自动验证定义
    protected $_validate = array(
          array('name','require','供应商名称不能够为空'),
array('sort','require','排序不能够为空'),
array('status','require','状态不能够为空'),
     );
}