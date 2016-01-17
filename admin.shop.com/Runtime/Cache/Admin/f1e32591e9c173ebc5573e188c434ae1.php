<?php if (!defined('THINK_PATH')) exit();?><!-- $Id: brand_info.htm 14216 2008-03-10 02:27:21Z testyang $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>ECSHOP 管理中心 - <?php echo ($meta_title); ?></title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="http://admin.shop.com:8080/Public/Admin/css/general.css" rel="stylesheet" type="text/css"/>
    <link href="http://admin.shop.com:8080/Public/Admin/css/main.css" rel="stylesheet" type="text/css"/>
    <link href="http://admin.shop.com:8080/Public/Admin/css/common.css" rel="stylesheet" type="text/css"/>
    
    <link rel="stylesheet" href="http://admin.shop.com:8080/Public/Admin/zTree/css/zTreeStyle/zTreeStyle.css" type="text/css">

</head>
</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo U('index');?>"><?php echo mb_substr($meta_title,2,null,'utf-8');?>列表</a></span>
    <span class="action-span1"><a href="#">ECSHOP 管理中心</a></span>
    <span id="search_id" class="action-span1"> -<?php echo ($meta_title); ?> </span>

    <div style="clear:both"></div>
</h1>




    <div class="main-div">
        <form method="post" action="<?php echo U();?>">
            <table cellspacing="1" cellpadding="3" width="100%">
                <tr>
                    <td class="label">分类名称</td>
                    <td>
                        <input type='text' name='name' maxlength='60' value='<?php echo ($name); ?>'/> <span
                            class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">父级分类</td>
                    <td>
                        <!-- 保存分类id-->
                        <input type='hidden' class="parent_id" name='parent_id' value='0'/>
                        <!-- 保存分类名字 disabled 禁用 不能书写-->
                        <input type='text' class="parent_name" name='parent_name' maxlength='60' value='默认为顶级分类' disabled="disabled"/> <span
                            class="require-field">*</span>
                    </td>
                </tr>
                </tr>
                <tr>
                    <td class="label"></td>
                    <td>
                        <style type="text/css">
                            .ztree {
                                margin-top: 10px;
                                border: 1px solid #617775;
                                background: #f0f6e4;
                                width: 220px;
                                height: auto;
                                overflow-y: scroll;
                                overflow-x: auto;
                            }
                        </style>
                        <ul id="treeDemo" class="ztree"></ul>
                    </td>
                </tr>
                <tr>
                    <td class="label">分类简介</td>
                    <td>
                        <textarea name='intro' maxlength='60' row='4'><?php echo ($intro); ?></textarea> <span
                            class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">是否显示</td>
                    <td>
                        <input type='radio' name='status' class='status' value='1'/>是 <input type='radio' name='status'
                                                                                             class='status' value='0'/>否
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><br/>
                        <input type="hidden" name="id" value="<?php echo ($id); ?>"/>
                        <input type="submit" class="button ajax-post" value=" 确定 "/>
                        <input type="reset" class="button" value=" 重置 "/>/
                    </td>
                </tr>
            </table>
        </form>
    </div>

<script type="text/javascript" src="http://admin.shop.com:8080/Public/Admin/js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="http://admin.shop.com:8080//Public/Admin/layer/layer.js"></script>
<script type="text/javascript" src="http://admin.shop.com:8080/Public/Admin/js/jquery.form.js"></script>
<script type="text/javascript" src="http://admin.shop.com:8080/Public/Admin/js/common.js"></script>

    <script type="text/javascript" src="http://admin.shop.com:8080/Public/Admin/zTree/js/jquery.ztree.core-3.5.js"></script>
    <script type="text/javascript">
        $(function () {
            //树结构设置
            var setting = {
                data: {
                    simpleData: {
                        enable: true,
                        pIdKey: "parent_id",
                    }
                },
                callback: {
                    onClick: function (event, treeId, treeNode) {  //treeNode就是点击的这个节点
                        //将节点的id(就是数据库中的id) 和节点的name复制给  parent_name和parent_id表单元素
                        $('.parent_name').val(treeNode.name);
                        $('.parent_id').val(treeNode.id);

                    }
                }
            };
            //获取树节点的数据
            var zNodes = <?php echo ($zNodes); ?>;  //$zNodes是php代码
            //找到存放父级分类的ul 变为树状结构
            var treeObj = $.fn.zTree.init($("#treeDemo"), setting, zNodes);//默认所有节点是合并的
            <?php if(empty($id)): ?>treeObj.expandAll(true);//表示展开所有节点
            <?php else: ?>
            //编辑从treeObj找到需要被选准的节点对象
            var parent_id=<?php echo ($parent_id); ?>;
            //根据parent_id找到自己对相应的节点
            var node=treeObj.getNodeByParam('id',parent_id);//把前面父类id(parent_id)当做id找到父类元素
            //通过树对象选准父节点
            treeObj.selectNode(node);
            //将选准的节点的名字赋值给父级分类框
                      $('.parent_name').val(node.name);
                      $('.parent_id').val(node.id);<?php endif; ?>
        });
    </script>


<script type="text/javascript">
    $(function () {
        //选中是否显示
        $('.status').val([<?php echo ((isset($status ) && ($status !== ""))?($status ): 1); ?>]);
    });
</script>
</body>
</html>