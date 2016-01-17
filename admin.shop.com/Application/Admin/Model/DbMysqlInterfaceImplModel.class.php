<?php
namespace Admin\Model;

class DbMysqlInterfaceImplModel implements DbMysqlInterfaceModel{
    public function connect(){
        echo 'connect...';
        exit;
    }
    public function disconnect(){
        echo 'disconnect...';
        exit;
    }
    public function free($result){
        echo 'free...';
        exit;
    }
    public function query($sql, array $args = array()){
        //根据实际的拼装出sql
        $tempSQL = $this->buildSQL(func_get_args());
        //执行sql
        return M()->execute($tempSQL);
    }

    public function insert($sql, array $args = array()){
      $params=func_get_args();//获取实参
        $sql=array_shift($params);//取出第一个元素做sql的模板
        $table_name = array_shift($params);//取出表名 sql模板弹出后表名是第一个元素
        //将模板中的?T换为表名
        $sql=str_replace('?T',$table_name,$sql);
        //取出需要插入数据库的数值
        $params=array_shift($params);
//        dump($params);
//        exit;
        $values='';
        foreach($params as $k=>$v){
            if($k=='id'){//id时不需要插入 自动跳出循环 进行下次循环
                continue;
            }
            $values.="{$k}='{$v}',";
        }
        $values=rtrim($values,',');
        $sql=str_replace('?%',$values,$sql);
//        dump($sql);
//        exit;
        $model=M();
        $result = $model->execute($sql);//执行一条insert的sql
//        dump($sql);
//        exit;
        if($result===false){//执行失败
            return false;
        }else{//执行成功
            return $model->getLastInsID();//获取最后一个id值
        }
    }

    public function update($sql, array $args = array()){
        echo 'update.....';
        exit;
    }
    public function getAll($sql, array $args = array()){
        echo 'getAll.....';
        exit;
    }
    public function getAssoc($sql, array $args = array()){
        echo 'getAssoc.....';
        exit;
    }
    //  * 根据sql查询出一行记录
    public function getRow($sql, array $args = array()){
        //>>1.得到真正传递过来的参数拼装SQL
        $tempSQL=$this->buildSQL(func_get_args());
        //执行sql
//        dump($tempSQL);
//        exit;
        $rows=M()->query($tempSQL);
        //返回查询出的结果,如果没查出返回false
        return empty($rows)?false:$rows[0];
    }
    public function getCol($sql, array $args = array()){
        echo 'getCol.....';
        exit;
    }
    public function getOne($sql, array $args = array()){
//        $tempSQL = $this->buildSQL(func_get_args());
//        $model = M();
//        $rows = $model->query($tempSQL); //得到二维数组
//        $row = $rows[0]; //得到其中的第一个小数组
//        $values = array_values($row);  //小数组中的值
//        return $values[0];  //值的第一元素.
        echo 'getOne.....';
        exit;
    }
    //该方法用于拼接sql
    private function buildSQL($params){
        $sql=array_shift($params);//弹出第一个元素"SELECT ?F, ?F, ?F, ?F FROM ?T WHERE ?F = ?N"
        $sqs=preg_split('/\?[FTN]/',$sql);//通过?F ?T ?N分割字符串 返回字串组成数组
        $tempSQL='';
        foreach($sqs as $k=>$v) {//循环出每个元素$v="SELECT "  ", ".....
            $tempSQL .= ($v.$params[$k]);
//        dump($tempSQL);
//        exit;
        }
        return $tempSQL;
    }
}