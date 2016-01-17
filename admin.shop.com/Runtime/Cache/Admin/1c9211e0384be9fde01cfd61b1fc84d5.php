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
    <!--预留添加css位置-->
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
                    <td class="label">会员级别名称</td>
                    <td>
                         <input type='text' name='name' maxlength='60' value='<?php echo ($name); ?>'/>                        <span class="require-field">*</span>
                    </td>
                </tr>
                                <tr>
                    <td class="label">最低积分</td>
                    <td>
                         <input type='text' name='low' maxlength='60' value='<?php echo ($low); ?>'/>                        <span class="require-field">*</span>
                    </td>
                </tr>
                                <tr>
                    <td class="label">最高积分</td>
                    <td>
                         <input type='text' name='high' maxlength='60' value='<?php echo ($high); ?>'/>                        <span class="require-field">*</span>
                    </td>
                </tr>
                                <tr>
                    <td class="label">折扣</td>
                    <td>
                         <input type='text' name='discount' maxlength='60' value='<?php echo ($discount); ?>'/>                        <span class="require-field">*</span>
                    </td>
                </tr>
                                <tr>
                    <td class="label">会员级别简介</td>
                    <td>
                        <textarea name='intro' maxlength='60' row='4' ><?php echo ($intro); ?></textarea>                        <span class="require-field">*</span>
                    </td>
                </tr>
                                <tr>
                    <td class="label">是否显示</td>
                    <td>
                         <input type='radio'  name='status' class='status'  value='1'/>是 <input type='radio'  name='status' class='status'  value='0'/>否                        <span class="require-field">*</span>
                    </td>
                </tr>
                                <tr>
                    <td colspan="2" align="center"><br />
                        <input type="hidden" name="id" value="<?php echo ($id); ?>"/>
                        <input type="submit" class="button ajax-post" value=" 确定 " />
                        <input type="reset" class="button" value=" 重置 " />
                    </td>
               </tr>
            </table>
        </form>
    </div>

<script type="text/javascript" src="http://admin.shop.com:8080/Public/Admin/js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="http://admin.shop.com:8080//Public/Admin/layer/layer.js"></script>
<script type="text/javascript" src="http://admin.shop.com:8080/Public/Admin/js/jquery.form.js"></script>
<script type="text/javascript" src="http://admin.shop.com:8080/Public/Admin/js/common.js"></script>
<!--预留添加js位置-->

<script type="text/javascript">
    $(function () {
        //选中是否显示
        $('.status').val([<?php echo ((isset($status ) && ($status !== ""))?($status ): 1); ?>]);
    });
</script>
</body>
</html>