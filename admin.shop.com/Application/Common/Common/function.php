<?php
   function show_model_error($model){
        $errors = $model->getError();
        $errorMsg = '<ul>';
        if (is_array($errors)) {
            foreach ($errors as $error) {//错误结果有多条
                $errorMsg .= "<li>$error</li>";
            }
        } else {//错误结果仅一条
            $errorMsg .= "<li>$errors</li>";
        }
        $errorMsg .= "</ul>";
        return $errorMsg;
    }

//定义一个区二维数组一列的函数
if(!function_exists(array_column)) {
    function array_column($rows, $field)
    {
        $value = array();
        foreach ($rows as $row) {
            $value[] = $row[$field];
        }
        return $value;
    }
}
    //定义一个生成下拉列表框的方法
    /**
     * $name下拉框的名字
     *  $rows下拉框的内容 数据 选项值
     * $defaultValue 默认值 根据这个默认值可以选准下拉框的一个选项
     * $valueField 为选项option的value值 即可对应出选项name
     * $textField该字段作为option的text值
    **/
    function arr2select($name,$rows,$defaultValue='',$valueField='id',$textField='name'){
         $select_html="<select name='{$name}' class='{$name}'>";
         $select_html.="<option value=''><--请选择--></option>";
        foreach($rows as $row){  //循环取出每个选项值
            //根据页面传来$brand_id 选出选准的一项 如果没$brnd_id 则不选准
            if($row[$valueField]==$defaultValue){
                $selected='selected';
            }
            $select_html.="<option value='{$row[$valueField]}' {$selected}>{$row[$textField]}</option>";
        }
        $select_html.="</selected>";
        echo $select_html;
    }


