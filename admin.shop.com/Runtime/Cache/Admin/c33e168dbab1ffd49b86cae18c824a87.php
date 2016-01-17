<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>ECSHOP 管理中心 - 商品<?php echo ($meta_title); ?> </title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="http://admin.shop.com:8080/Public/Admin/css/general.css" rel="stylesheet" type="text/css"/>
    <link href="http://admin.shop.com:8080/Public/Admin/css/main.css" rel="stylesheet" type="text/css"/>
    <link href="http://admin.shop.com:8080/Public/Admin/css/page.css" rel="stylesheet" type="text/css"/>
    
    <link rel="stylesheet" href="http://admin.shop.com:8080/Public/Admin/treegrid/css/jquery.treegrid.css">

</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo U('add');?>">添加<?php echo ($meta_title); ?></a></span>
    <span class="action-span1"><a href="#">ECSHOP 管理中心</a></span>
    <span id="search_id" class="action-span1"> - <?php echo ($meta_title); ?>列表 </span>

    <div style="clear:both"></div>
</h1>
<!--搜索块-->
    <div class="form-div">
        <form action="<?php echo U();?>" method="get" name="searchForm">
            <img src="http://admin.shop.com:8080/Public/Admin/images/icon_search.gif" width="26" height="22" border="0" alt="search"/>
            <input type="text" name="keyword" size="15" value="<?php echo ($_GET['keyword']); ?>"/>
            <input type="submit" value=" 搜索 " class="button"/>
        </form>
    </div>


<!--列表块-->
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1" class="tree">
            <tr>
                <th>分类名称</th>
                <th>父级分类id</th>
                <th>分类简介</th>
                <th>是否显示</th>
                <th>操作</th>
            </tr>
            <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr class="treegrid-<?php echo ($row["id"]); ?> <?php if(($row["level"]) != "1"): ?>treegrid-parent-<?php echo ($row["parent_id"]); endif; ?>">
                    <!--<td width="30px"><?php echo ($row["id"]); ?><input type="checkbox" class="ids" name="id[]" value="<?php echo ($row["id"]); ?>"/></td>-->
                    <td class="first-cell"><?php echo ($row["name"]); ?></td>
                    <td align="center"><?php echo ($row["parent_id"]); ?></td>
                    <!--<td align="center"><?php echo ($row["lft"]); ?></td>-->
                    <!--<td align="center"><?php echo ($row["rgt"]); ?></td>-->
                    <!--<td align="center"><?php echo ($row["level"]); ?></td>-->
                    <td align="center"><?php echo ($row["intro"]); ?></td>
                    <td align="center"><a class='ajax-get'
                                          href="<?php echo U('changeStatus',array('id'=>$row['id'],'status'=>1-$row['status']));?>"><img
                            src="http://admin.shop.com:8080/Public/Admin/images/<?php echo ($row["status"]); ?>.gif"/></a></td>
                    <td align="center">
                        <a href="<?php echo U('edit',array('id'=>$row['id']));?>" title="编辑">编辑</a>
                        <a class='ajax-get' href="<?php echo U('changeStatus',array('id'=>$row['id'],'status'=>-1));?>" title="移除">移除</a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <tr>
                <td align="right" nowrap="true" colspan="6">

                </td>
            </tr>
        </table>
        <div id="turn-page" class="page">
            <?php echo ($pageHtml); ?>
        </div>
    </div>

<script type="text/javascript" src="http://admin.shop.com:8080/Public/Admin/js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="http://admin.shop.com:8080//Public/Admin/layer/layer.js"></script>
<script type="text/javascript" src="http://admin.shop.com:8080/Public/Admin/js/common.js"></script>

    <script type="text/javascript" src="http://admin.shop.com:8080/Public/Admin/treegrid/js/jquery.treegrid.js"></script>
    <!-- 找到现实列表的表格,将表格变为一个树状结构-->
    <script type="text/javascript">
        $(function(){
            $('.tree').treegrid();
        });
    </script>

</body>
</html>