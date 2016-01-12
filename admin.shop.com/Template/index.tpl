<extend name="Common/index" />
<block name="list"><!--列表块-->
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1">
            <tr>
            <th>ID<input type="checkbox" class="selectall" name="all"></th>
            <?php foreach($fields as $field): ?>
                <th><?php echo $field['comment'] ?></th>
               <?php endforeach; ?>
                <th>操作</th>
            </tr>
            <volist name="rows" id="row">
                <tr>
                    <td width="30px">{$row.id}<input type="checkbox" class="ids" name="id[]" value="{$row.id}"/></td>
                    <?php foreach($fields as $field){
                        if($field['field']=='name'){
                            echo ' <td class="first-cell">{$row.name}</td>';
                            }elseif($field['field']=='status'){
                               echo "<td align=\"center\"><a class='ajax-get' href=\"{:U('changeStatus',array('id'=>\$row['id'],'status'=>1-\$row['status']))}\"><img src=\"__IMG__/{\$row.status}.gif\"/></a></td>";
                            }else{
                            echo "<td align=\"center\">{\$row.{$field['field']}}</td>";
                            }
                    }
                   ?>
                    <td align="center">
                        <a href="{:U('edit',array('id'=>$row['id']))}" title="编辑">编辑</a>
                        <a class='ajax-get' href="{:U('changeStatus',array('id'=>$row['id'],'status'=>-1))}" title="移除">移除</a>
                    </td>
                </tr>
            </volist>
            <tr>
                <td align="right" nowrap="true" colspan="6">

                </td>
            </tr>
        </table>
        <div id="turn-page" class="page">
            {$pageHtml}
        </div>
    </div>
</block>