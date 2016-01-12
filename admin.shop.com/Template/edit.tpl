<extend name="Common/edit" />
<block name="list">
    <div class="main-div">
        <form method="post" action="{:U()}">
            <table cellspacing="1" cellpadding="3" width="100%">
                <?php foreach($fields as $field): ?>
                <tr>
                    <td class="label"><?php echo $field['comment'] ?></td>
                    <td>
                        <?php
                        //根据字段生成不同的表单元素
                       if(!isset($field['field_type'])){   //根据元素类型是否存在,不存在默认text
                            if($field['field']=='sort'){
                                echo " <input type='text' name='{$field['field']}' maxlength='60' value='{\$sort|default=20}'/>";
                                }else{
                                    echo " <input type='text' name='{$field['field']}' maxlength='60' value='{\${$field['field']}}'/>";
                                }
                           }elseif($field['field_type']=='textarea'){   //当文件类型是textarea时
                                echo "<textarea name='{$field['field']}' maxlength='60' row='4' >{\${$field['field']}}</textarea>";
                        }elseif($field['field_type']=='radio'){    //当文件类型是raido时
                                   foreach($field['option_values'] as $key=>$val){    // 循环出单选项
                                 echo " <input type='radio' name='{$field['field']}' class='{$field['field']}'  value='{$key}'/>{$val}";
                                    }
                        }elseif($field['field_type']=='file'){      //当文件类型是file时
                                 echo " <input type='file' name='{$field['field']}'  maxlength='60' />";
                        }

                        ?>
                        <span class="require-field">*</span>
                    </td>
                </tr>
                <?php endforeach;?>
                <tr>
                    <td colspan="2" align="center"><br />
                        <input type="hidden" name="id" value="{$id}"/>
                        <input type="submit" class="button ajax-post" value=" 确定 " />
                        <input type="reset" class="button" value=" 重置 " />
                    </td>
               </tr>
            </table>
        </form>
    </div>
</block>