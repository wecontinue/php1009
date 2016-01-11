<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP Menu</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://admin.shop.com:8080/Public/Admin/css/general.css" rel="stylesheet" type="text/css" />
<script language="JavaScript">
<!--
var noHelp   = "<p align='center' style='color: #666'>暂时还没有该部分内容</p>";
var helpLang = "zh_cn";
//-->
</script>

<style type="text/css">
body {
  background: #80BDCB;
}
#tabbar-div {
  background: #278296;
  padding-left: 10px;
  height: 21px;
  padding-top: 0px;
}
#tabbar-div p {
  margin: 1px 0 0 0;
}
.tab-front {
  background: #80BDCB;
  line-height: 20px;
  font-weight: bold;
  padding: 4px 15px 4px 18px;
  border-right: 2px solid #335b64;
  cursor: hand;
  cursor: pointer;
}
.tab-back {
  color: #F4FAFB;
  line-height: 20px;
  padding: 4px 15px 4px 18px;
  cursor: hand;
  cursor: pointer;
}
.tab-hover {
  color: #F4FAFB;
  line-height: 20px;
  padding: 4px 15px 4px 18px;
  cursor: hand;
  cursor: pointer;
  background: #2F9DB5;
}
#top-div
{
  padding: 3px 0 2px;
  background: #BBDDE5;
  margin: 5px;
  text-align: center;
}
#main-div {
  border: 1px solid #345C65;
  padding: 5px;
  margin: 5px;
  background: #FFF;
}
#menu-list {
  padding: 0;
  margin: 0;
}
#menu-list ul {
  padding: 0;
  margin: 0;
  list-style-type: none;
  color: #335B64;
}
#menu-list li {
  padding-left: 16px;
  line-height: 16px;
  cursor: hand;
  cursor: pointer;
}
#main-div a:visited, #menu-list a:link, #menu-list a:hover {
  color: #335B64
  text-decoration: none;
}
#menu-list a:active {
  color: #EB8A3D;
}
.explode {
  background: url(http://admin.shop.com:8080/Public/Admin/images/menu_minus.gif) no-repeat 0px 3px;
  font-weight: bold;
}
.collapse {
  background: url(http://admin.shop.com:8080/Public/Admin/images/menu_plus.gif) no-repeat 0px 3px;
  font-weight: bold;
}
.menu-item {
  background: url(http://admin.shop.com:8080/Public/Admin/images/menu_arrow.gif) no-repeat 0px 3px;
  font-weight: normal;
}
#help-title {
  font-size: 14px;
  color: #000080;
  margin: 5px 0;
  padding: 0px;
}
#help-content {
  margin: 0;
  padding: 0;
}
.tips {
  color: #CC0000;
}
.link {
  color: #000099;
}
</style>

</head>
<body>
<div id="tabbar-div">
<p><span style="float:right; padding: 3px 5px;" ><a href="javascript:toggleCollapse();"><img id="toggleImg" src="http://admin.shop.com:8080/Public/Admin/images/menu_minus.gif" width="9" height="9" border="0" alt="闭合" /></a></span>
  <span class="tab-front" id="menu-tab">菜单</span>
</p>
</div>
<div id="main-div">
<div id="menu-list">
<ul id="menu-ul">
  <li class="explode" key="02_cat_and_goods" name="menu">
    商品管理        <ul>
          <li class="menu-item"><a href="<?php echo U('Goods/index');?>" target="main-frame">商品列表</a></li>
          <li class="menu-item"><a href="goods.php?act=add" target="main-frame">添加新商品</a></li>
          <li class="menu-item"><a href="index.php?m=Admin&c=Category&a=catList" target="main-frame">商品分类</a></li>
          <li class="menu-item"><a href="comment_manage.php?act=list" target="main-frame">用户评论</a></li>
          <li class="menu-item"><a href="brand.php?act=list" target="main-frame">商品品牌</a></li>
          <li class="menu-item"><a href="goods_type.php?act=manage" target="main-frame">商品类型</a></li>
          <li class="menu-item"><a href="goods.php?act=trash" target="main-frame">商品回收站</a></li>
          <li class="menu-item"><a href="picture_batch.php" target="main-frame">图片批量处理</a></li>
          <li class="menu-item"><a href="goods_batch.php?act=add" target="main-frame">商品批量上传</a></li>
          <li class="menu-item"><a href="goods_export.php?act=goods_export" target="main-frame">商品批量导出</a></li>
          <li class="menu-item"><a href="goods_batch.php?act=select" target="main-frame">商品批量修改</a></li>
          <li class="menu-item"><a href="gen_goods_script.php?act=setup" target="main-frame">生成商品代码</a></li>
          <li class="menu-item"><a href="tag_manage.php?act=list" target="main-frame">标签管理</a></li>
          <li class="menu-item"><a href="goods.php?act=list&extension_code=virtual_card" target="main-frame">虚拟商品列表</a></li>
          <li class="menu-item"><a href="goods.php?act=add&extension_code=virtual_card" target="main-frame">添加虚拟商品</a></li>
          <li class="menu-item"><a href="virtual_card.php?act=change" target="main-frame">更改加密串</a></li>
          <li class="menu-item"><a href="goods_auto.php?act=list" target="main-frame">商品自动上下架</a></li>
        </ul>
      </li>
  <li class="explode" key="03_promotion" name="menu">
    促销管理        <ul>
          <li class="menu-item"><a href="snatch.php?act=list" target="main-frame">夺宝奇兵</a></li>
          <li class="menu-item"><a href="bonus.php?act=list" target="main-frame">红包类型</a></li>
          <li class="menu-item"><a href="pack.php?act=list" target="main-frame">商品包装</a></li>
          <li class="menu-item"><a href="card.php?act=list" target="main-frame">祝福贺卡</a></li>
          <li class="menu-item"><a href="group_buy.php?act=list" target="main-frame">团购活动</a></li>
          <li class="menu-item"><a href="topic.php?act=list" target="main-frame">专题管理</a></li>
          <li class="menu-item"><a href="auction.php?act=list" target="main-frame">拍卖活动</a></li>
          <li class="menu-item"><a href="favourable.php?act=list" target="main-frame">优惠活动</a></li>
          <li class="menu-item"><a href="wholesale.php?act=list" target="main-frame">批发管理</a></li>
          <li class="menu-item"><a href="package.php?act=list" target="main-frame">超值礼包</a></li>
          <li class="menu-item"><a href="exchange_goods.php?act=list" target="main-frame">积分商城商品</a></li>
        </ul>
      </li>
  <li class="explode" key="04_order" name="menu">
    订单管理        <ul>
          <li class="menu-item"><a href="order.php?act=list" target="main-frame">订单列表</a></li>
          <li class="menu-item"><a href="order.php?act=order_query" target="main-frame">订单查询</a></li>
          <li class="menu-item"><a href="order.php?act=merge" target="main-frame">合并订单</a></li>
          <li class="menu-item"><a href="order.php?act=templates" target="main-frame">订单打印</a></li>
          <li class="menu-item"><a href="goods_booking.php?act=list_all" target="main-frame">缺货登记</a></li>
          <li class="menu-item"><a href="order.php?act=add" target="main-frame">添加订单</a></li>
          <li class="menu-item"><a href="order.php?act=delivery_list" target="main-frame">发货单列表</a></li>
          <li class="menu-item"><a href="order.php?act=back_list" target="main-frame">退货单列表</a></li>
        </ul>
      </li>
  <li class="explode" key="05_banner" name="menu">
    <!--广告管理        <ul>-->
          <!--<li class="menu-item"><a href="ads.php?act=list" target="main-frame">广告列表</a></li>-->
          <!--<li class="menu-item"><a href="ad_position.php?act=list" target="main-frame">广告位置</a></li>-->
        <!--</ul> -->
      供应商管理        <ul>
          <li class="menu-item"><a href="<?php echo U('Supplier/index');?>" target="main-frame">供应商列表</a></li>
          <li class="menu-item"><a href="<?php echo U('Supplier/add');?>" target="main-frame">供应商添加</a></li>
        </ul>
      </li>
  <li class="explode" key="06_stats" name="menu">
    报表统计        <ul>
          <li class="menu-item"><a href="flow_stats.php?act=view" target="main-frame">流量分析</a></li>
          <li class="menu-item"><a href="guest_stats.php?act=list" target="main-frame">客户统计</a></li>
          <li class="menu-item"><a href="order_stats.php?act=list" target="main-frame">订单统计</a></li>
          <li class="menu-item"><a href="sale_general.php?act=list" target="main-frame">销售概况</a></li>
          <li class="menu-item"><a href="users_order.php?act=order_num" target="main-frame">会员排行</a></li>
          <li class="menu-item"><a href="sale_list.php?act=list" target="main-frame">销售明细</a></li>
          <li class="menu-item"><a href="searchengine_stats.php?act=view" target="main-frame">搜索引擎</a></li>
          <li class="menu-item"><a href="sale_order.php?act=goods_num" target="main-frame">销售排行</a></li>
          <li class="menu-item"><a href="visit_sold.php?act=list" target="main-frame">访问购买率</a></li>
          <li class="menu-item"><a href="adsense.php?act=list" target="main-frame">站外投放JS</a></li>
        </ul>
      </li>
  <li class="explode" key="07_content" name="menu">
    文章管理        <ul>
          <li class="menu-item"><a href="articlecat.php?act=list" target="main-frame">文章分类</a></li>
          <li class="menu-item"><a href="article.php?act=list" target="main-frame">文章列表</a></li>
          <li class="menu-item"><a href="article_auto.php?act=list" target="main-frame">文章自动发布</a></li>
          <li class="menu-item"><a href="vote.php?act=list" target="main-frame">在线调查</a></li>
        </ul>
      </li>
  <li class="explode" key="08_members" name="menu">
    会员管理        <ul>
          <li class="menu-item"><a href="users.php?act=list" target="main-frame">会员列表</a></li>
          <li class="menu-item"><a href="users.php?act=add" target="main-frame">添加会员</a></li>
          <li class="menu-item"><a href="user_rank.php?act=list" target="main-frame">会员等级</a></li>
          <li class="menu-item"><a href="integrate.php?act=list" target="main-frame">会员整合</a></li>
          <li class="menu-item"><a href="user_msg.php?act=list_all" target="main-frame">会员留言</a></li>
          <li class="menu-item"><a href="user_account.php?act=list" target="main-frame">充值和提现申请</a></li>
          <li class="menu-item"><a href="user_account_manage.php?act=list" target="main-frame">资金管理</a></li>
        </ul>
      </li>
  <li class="explode" key="10_priv_admin" name="menu">
    权限管理        <ul>
          <li class="menu-item"><a href="<?php echo U('User/index');?>" target="main-frame">管理员列表</a></li>
          <li class="menu-item"><a href="admin_logs.php?act=list" target="main-frame">管理员日志</a></li>
          <li class="menu-item"><a href="<?php echo U('Role/index');?>" target="main-frame">角色管理</a></li>
          <li class="menu-item"><a href="<?php echo U('Permission/index');?>" target="main-frame">权限管理</a></li>
          <li class="menu-item"><a href="agency.php?act=list" target="main-frame">办事处列表</a></li>
          <li class="menu-item"><a href="suppliers.php?act=list" target="main-frame">供货商列表</a></li>
        </ul>
      </li>
  <li class="explode" key="11_system" name="menu">
    系统设置        <ul>
          <li class="menu-item"><a href="shop_config.php?act=list_edit" target="main-frame">商店设置</a></li>
          <li class="menu-item"><a href="reg_fields.php?act=list" target="main-frame">会员注册项设置</a></li>
          <li class="menu-item"><a href="payment.php?act=list" target="main-frame">支付方式</a></li>
          <li class="menu-item"><a href="shipping.php?act=list" target="main-frame">配送方式</a></li>
          <li class="menu-item"><a href="shop_config.php?act=mail_settings" target="main-frame">邮件服务器设置</a></li>
          <li class="menu-item"><a href="area_manage.php?act=list" target="main-frame">地区列表</a></li>
          <li class="menu-item"><a href="cron.php?act=list" target="main-frame">计划任务</a></li>
          <li class="menu-item"><a href="friend_link.php?act=list" target="main-frame">友情链接</a></li>
          <li class="menu-item"><a href="captcha_manage.php?act=main" target="main-frame">验证码管理</a></li>
          <li class="menu-item"><a href="check_file_priv.php?act=check" target="main-frame">文件权限检测</a></li>
          <li class="menu-item"><a href="filecheck.php" target="main-frame">文件校验</a></li>
          <li class="menu-item"><a href="flashplay.php?act=list" target="main-frame">首页主广告管理</a></li>
          <li class="menu-item"><a href="navigator.php?act=list" target="main-frame">自定义导航栏</a></li>
          <li class="menu-item"><a href="license.php?act=list_edit" target="main-frame">授权证书</a></li>
          <li class="menu-item"><a href="sitemap.php" target="main-frame">站点地图</a></li>
        </ul>
      </li>
  <li class="explode" key="12_template" name="menu">
    模板管理        <ul>
          <li class="menu-item"><a href="template.php?act=list" target="main-frame">模板选择</a></li>
          <li class="menu-item"><a href="template.php?act=setup" target="main-frame">设置模板</a></li>
          <li class="menu-item"><a href="template.php?act=library" target="main-frame">库项目管理</a></li>
          <li class="menu-item"><a href="edit_languages.php?act=list" target="main-frame">语言项编辑</a></li>
          <li class="menu-item"><a href="template.php?act=backup_setting" target="main-frame">模板设置备份</a></li>
          <li class="menu-item"><a href="mail_template.php?act=list" target="main-frame">邮件模板</a></li>
        </ul>
      </li>
  <li class="explode" key="13_backup" name="menu">
    数据库管理        <ul>
          <li class="menu-item"><a href="database.php?act=backup" target="main-frame">数据备份</a></li>
          <li class="menu-item"><a href="database.php?act=optimize" target="main-frame">数据表优化</a></li>
          <li class="menu-item"><a href="sql.php?act=main" target="main-frame">SQL查询</a></li>
          <li class="menu-item"><a href="convert.php?act=main" target="main-frame">转换数据</a></li>
        </ul>
      </li>
  <li class="explode" key="14_sms" name="menu">
    短信管理        <ul>
          <li class="menu-item"><a href="sms.php?act=display_send_ui" target="main-frame">发送短信</a></li>
          <li class="menu-item"><a href="sms.php?act=sms_sign" target="main-frame">短信签名</a></li>
        </ul>
      </li>
  <li class="explode" key="15_rec" name="menu">
    推荐管理        <ul>
          <li class="menu-item"><a href="affiliate.php?act=list" target="main-frame">推荐设置</a></li>
          <li class="menu-item"><a href="affiliate_ck.php?act=list" target="main-frame">分成管理</a></li>
        </ul>
      </li>
  <li class="explode" key="16_email_manage" name="menu">
    邮件群发管理        <ul>
          <li class="menu-item"><a href="attention_list.php?act=list" target="main-frame">关注管理</a></li>
          <li class="menu-item"><a href="email_list.php?act=list" target="main-frame">邮件订阅管理</a></li>
          <li class="menu-item"><a href="magazine_list.php?act=list" target="main-frame">杂志管理</a></li>
          <li class="menu-item"><a href="view_sendlist.php?act=list" target="main-frame">邮件队列管理</a></li>
        </ul>
      </li>
  <script language="JavaScript" src="http://api.ecshop.com/menu_ext.php?charset=utf-8&lang=zh_cn"></script>
</ul>
</div>
<div id="help-div" style="display:none">
<h1 id="help-title"></h1>
<div id="help-content"></div>
</div>
</div>
</body>
</html>