<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心</title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://admin.shop.com:8080/Public/Admin/css/general.css" rel="stylesheet" type="text/css" />
<link href="http://admin.shop.com:8080/Public/Admin/css/main.css" rel="stylesheet" type="text/css" />

</head>
<body>

<h1>
<span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"></span>
<div style="clear:both"></div>
</h1>
<!-- directory install start -->
<ul id="cloud_list" style="padding:0; margin: 0; list-style-type:none; color: #CC0000;">
 
</ul>

<!--<ul id="lilist" style="padding:0; margin: 0; list-style-type:none; color: #CC0000;">-->
    <!--<li class="Start315">您还没有删除 install 文件夹，出于安全的考虑，我们建议您删除 install 文件夹。</li>-->
    <!--<li class="Start315">您还没有删除 demo 文件夹，出于安全的考虑，我们建议您删除 demo 文件夹。</li>-->
  <!--</ul>-->
<ul style="padding:0; margin: 0; list-style-type:none; color: #CC0000;">
 <!-- <script type="text/javascript" src="http://bbs.ecshop.com/notice.php?v=1&n=8&f=ul"></script>-->
</ul>
<!-- directory install end -->
<!-- start personal message -->
<!-- end personal message -->
<!-- start order statistics -->
<div class="list-div">
<table cellspacing='1' cellpadding='3'>
  <tr>
    <th colspan="4" class="group-title">订单统计信息</th>
  </tr>
  <tr>
    <td width="20%"><a href="order.php?act=list&composite_status=101">待发货订单:</a></td>
    <td width="30%"><strong style="color: red">4</strong></td>
    <td width="20%"><a href="order.php?act=list&composite_status=0">未确认订单:</a></td>
    <td width="30%"><strong>2</strong></td>
  </tr>
  <tr>
    <td><a href="order.php?act=list&composite_status=100">待支付订单:</a></td>
    <td><strong>3</strong></td>
    <td><a href="order.php?act=list&composite_status=102">已成交订单数:</a></td>
    <td><strong>3</strong></td>
  </tr>
  <tr>
    <td><a href="goods_booking.php?act=list_all">新缺货登记:</a></td>
    <td><strong>2</strong></td>
    <td><a href="user_account.php?act=list&process_type=1&is_paid=0">退款申请:</a></td>
    <td><strong>0</strong></td>
  </tr>
  <tr>
    <td><a href="order.php?act=list&composite_status=6">部分发货订单:</a></td>
    <td><strong>1</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
<!-- end order statistics -->
<br />
<!-- start goods statistics -->
<div class="list-div">
<table cellspacing='1' cellpadding='3'>
  <tr>
    <th colspan="4" class="group-title">实体商品统计信息</th>
  </tr>
  <tr>
    <td width="20%">商品总数:</td>
    <td width="30%"><strong>20</strong></td>
    <td width="20%"><a href="goods.php?act=list&stock_warning=1">库存警告商品数:</a></td>
    <td width="30%"><strong style="color: red">7</strong></td>
  </tr>
  <tr>
    <td><a href="goods.php?act=list&amp;intro_type=is_new">新品推荐数:</a></td>
    <td><strong>11</strong></td>
    <td><a href="goods.php?act=list&amp;intro_type=is_best">精品推荐数:</a></td>
    <td><strong>10</strong></td>
  </tr>
  <tr>
    <td><a href="goods.php?act=list&amp;intro_type=is_hot">热销商品数:</a></td>
    <td><strong>11</strong></td>
    <td><a href="goods.php?act=list&amp;intro_type=is_promote">促销商品数:</a></td>
    <td><strong>0</strong></td>
  </tr>
</table>
</div>
<br />
<!-- Virtual Card -->
<div class="list-div">
<table cellspacing='1' cellpadding='3'>
  <tr>
    <th colspan="4" class="group-title">虚拟卡商品统计</th>
  </tr>
  <tr>
    <td width="20%">商品总数:</td>
    <td width="30%"><strong>6</strong></td>
    <td width="20%"><a href="goods.php?act=list&amp;stock_warning=1&amp;extension_code=virtual_card">库存警告商品数:</a></td>
    <td width="30%"><strong style="color: red">2</strong></td>
  </tr>
  <tr>
    <td><a href="goods.php?act=list&amp;intro_type=is_new&amp;extension_code=virtual_card">新品推荐数:</a></td>
    <td><strong>1</strong></td>
    <td><a href="goods.php?act=list&amp;intro_type=is_best&amp;extension_code=virtual_card">精品推荐数:</a></td>
    <td><strong>4</strong></td>
  </tr>
  <tr>
    <td><a href="goods.php?act=list&amp;intro_type=is_hot&amp;extension_code=virtual_card">热销商品数:</a></td>
    <td><strong>6</strong></td>
    <td><a href="goods.php?act=list&amp;intro_type=is_promote&amp;extension_code=virtual_card">促销商品数:</a></td>
    <td><strong>0</strong></td>
  </tr>
</table>
</div>
<!-- end order statistics -->
<br />
<!-- start access statistics -->
<div class="list-div">
<table cellspacing='1' cellpadding='3'>
  <tr>
    <th colspan="4" class="group-title">访问统计</th>
  </tr>
  <tr>
    <td width="20%">今日访问:</td>
    <td width="30%"><strong>0</strong></td>
    <td width="20%">在线人数:</td>
    <td width="30%"><strong>1</strong></td>
  </tr>
  <tr>
    <td><a href="user_msg.php?act=list_all">最新留言:</a></td>
    <td><strong>1</strong></td>
    <td><a href="comment_manage.php?act=list">未审核评论:</a></td>
    <td><strong>1</strong></td>
  </tr>
</table>
</div>
<!-- end access statistics -->
<br />
<!-- start system information -->
<div class="list-div">
<table cellspacing='1' cellpadding='3'>
  <tr>
    <th colspan="4" class="group-title">系统信息</th>
  </tr>
  <tr>
    <td width="20%">服务器操作系统:</td>
    <td width="30%">WINNT (127.0.0.1)</td>
    <td width="20%">Web 服务器:</td>
    <td width="30%">Apache/2.2.25 (Win32) PHP/5.4.43</td>
  </tr>
  <tr>
    <td>PHP 版本:</td>
    <td>5.4.43</td>
    <td>MySQL 版本:</td>
    <td>5.5.39</td>
  </tr>
  <tr>
    <td>安全模式:</td>
    <td>否</td>
    <td>安全模式GID:</td>
    <td>否</td>
  </tr>
  <tr>
    <td>Socket 支持:</td>
    <td>是</td>
    <td>时区设置:</td>
    <td>PRC</td>
  </tr>
  <tr>
    <td>GD 版本:</td>
    <td>GD2 ( JPEG GIF PNG)</td>
    <td>Zlib 支持:</td>
    <td>是</td>
  </tr>
  <tr>
    <td>IP 库版本:</td>
    <td>20071024</td>
    <td>文件上传的最大大小:</td>
    <td>2M</td>
  </tr>
  <tr>
    <td>ECShop 版本:</td>
    <td>v2.7.3 RELEASE 20121106</td>
    <td>安装日期:</td>
    <td>2015-11-01</td>
  </tr>
  <tr>
    <td>编码:</td>
    <td>UTF-8</td>
    <td></td>
    <td></td>
  </tr>
</table>
</div>


<div id="footer">
共执行 29 个查询，用时 0.213012 秒，Gzip 已禁用，内存占用 2.323 MB<br />
版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>
<!-- 新订单提示信息 -->
<div id="popMsg">
  <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#cfdef4" border="0">
  <tr>
    <td style="color: #0f2c8c" width="30" height="24"></td>
    <td style="font-weight: normal; color: #1f336b; padding-top: 4px;padding-left: 4px" valign="center" width="100%"> 新订单通知</td>
    <td style="padding-top: 2px;padding-right:2px" valign="center" align="right" width="19"><span title="关闭" style="cursor: hand;cursor:pointer;color:red;font-size:12px;font-weight:bold;margin-right:4px;" onclick="Message.close()" >×</span><!-- <img title=关闭 style="cursor: hand" onclick=closediv() hspace=3 src="msgclose.jpg"> --></td>
  </tr>
  <tr>
    <td style="padding-right: 1px; padding-bottom: 1px" colspan="3" height="70">
    <div id="popMsgContent">
      <p>您有 <strong style="color:#ff0000" id="spanNewOrder">1</strong> 个新订单以及       <strong style="color:#ff0000" id="spanNewPaid">0</strong> 个新付款的订单</p>
      <p align="center" style="word-break:break-all"><a href="order.php?act=list"><span style="color:#ff0000">点击查看新订单</span></a></p>
    </div>
    </td>
  </tr>
  </table>
</div>

<!--
<embed src="./application/public/images/online.wav" width="0" height="0" autostart="false" name="msgBeep" id="msgBeep" enablejavascript="true"/>
-->
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://active.macromedia.com/flash2/cabs/swflash.cab#version=4,0,0,0" id="msgBeep" width="1" height="1">
  <param name="movie" value="http://admin.shop.com:8080/Public/Admin/images/online.swf">
  <param name="quality" value="high">
  <embed src="http://admin.shop.com:8080/Public/Admin/images/online.swf" name="msgBeep" id="msgBeep" quality="high" width="0" height="0" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?p1_prod_version=shockwaveflash">
  </embed>
</object>
</body>
</html>