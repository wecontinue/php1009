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

    <div id="tabbar-div">
        <p>
            <span class="tab-back">通用信息</span>
            <span class="tab-back">详细信息</span>
            <span class="tab-back">会员价格</span>
            <span class="tab-back">商品属性</span>
            <span class="tab-front">商品相册</span>
            <span class="tab-back">关联文章</span>
        </p>
    </div>



    <div class="main-div">
        <form method="post" action="<?php echo U();?>">
            <table cellspacing="1" cellpadding="3" width="100%"  style="display: none">
                <tr>
                    <td class="label">商品名称</td>
                    <td>
                        <input type='text' name='name' maxlength='60' value='<?php echo ($name); ?>'/> <span
                            class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">简称</td>
                    <td>
                        <input type='text' name='short_name' maxlength='60' value='<?php echo ($short_name); ?>'/> <span
                            class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">货号</td>
                    <td>
                        <input type='text' name='sn' maxlength='60' value='<?php echo ($sn); ?>'/> <span class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">商品分类</td>
                    <td>
                        <input type='text' class='goods_category_name' name='goods_category_name' maxlength='60' value='<--必须选择叶子分类-->' disabled="disabled"/>
                        <input type='hidden'  class='goods_category_id' name='goods_category_id' maxlength='60' value='<?php echo ($goods_category_id); ?>' />
                        <span class="require-field">*</span>
                    </td>
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
                    <td class="label">商品品牌</td>
                    <td>
                        <?php echo arr2select('brand_id',$brands,$brand_id);?>
                       <span class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">供货商</td>
                    <td>
                        <?php echo arr2select('supplier_id',$suppliers,$supplier_id);?><span class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">本店价格</td>
                    <td>
                        <input type='text' name='shop_price' maxlength='60' value='<?php echo ($shop_price); ?>'/> <span
                            class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">市场价格</td>
                    <td>
                        <input type='text' name='market_price' maxlength='60' value='<?php echo ($market_price); ?>'/> <span
                            class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">商品LOGO</td>
                    <td>
                        <input type='hidden' class='logo' name='logo' value="<?php echo ($logo); ?>" maxlength='60'/>
                        <input type='file' id='goods_logo' name='goods_logo' maxlength='60'/>
                        <div class="upload-img-box" <?php if(empty($logo)): ?>style="display: none"<?php endif; ?>>
                          <div class="upload-pre-item">
                              <img src="/Uploads/<?php echo ($logo); ?>">
                          </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="label">库存</td>
                    <td>
                        <input type='text' name='stock' maxlength='60' value='<?php echo ($stock); ?>'/> <span
                            class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">商品状态</td>
                    <td>
                        <input type='checkbox' class='goods_status' name='goods_status[]' value='1'/> 精品
                        <input type='checkbox' class='goods_status' name='goods_status[]'  value='2'/> 新品
                        <input  type='checkbox' class='goods_status' name='goods_status[]' value='4'/> 热销

                    </td>
                </tr>
                <tr>
                    <td class="label">是否显示</td>
                    <td>
                        <input type='radio' name='status' class='status' value='1'/>是 <input type='radio' name='status'class='status' value='0'/>否

                    </td>
                </tr>

    <table cellspacing="1" cellpadding="3" width="100%" style="display: none">
        <tr>
            <td colspan="2">
                <textarea id="intro" name="intro"><?php echo ($intro); ?></textarea>
            </td>
        </tr>
    </table>

    <table cellspacing="1" cellpadding="3" width="100%"  style="display: none">
        <?php if(is_array($memberlevels)): $i = 0; $__LIST__ = $memberlevels;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$memberlevel): $mod = ($i % 2 );++$i;?><tr>
            <td class="label"><?php echo ($memberlevel["name"]); ?></td>
            <td>
                <input type='text' name='memberlevelprice[<?php echo ($memberlevel["id"]); ?>]' maxlength='60' value='<?php echo ($goodsmemberprices[$memberlevel['id']]); ?>'/> <span
                    class="require-field">*</span>
            </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <table cellspacing="1" cellpadding="3" width="100%"  style="display: none">
        <tr>
            <td class="label">商品属性</td>
            <td>
                <input type='text' name='name2' maxlength='60' value='<?php echo ($name); ?>'/> <span
                    class="require-field">*</span>
            </td>
        </tr>
    </table>
    <style type="text/css">
        .upload-pre-item{
            display: block;
            float: left;
            margin: 5px;
            position: relative;
        }
        .upload-pre-item a{
            position: absolute;
            right: 0px;
            top: 0px;
            background: red;
        }
    </style>
    <table cellspacing="1" cellpadding="3" width="100%" >
        <tr>
            <td>
                <div id="upload-img-box" class="upload-img-box">
                    <!--回显时循环出每张相片-->
                    <?php if(is_array($goodsPhotos)): $i = 0; $__LIST__ = $goodsPhotos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goodsPhoto): $mod = ($i % 2 );++$i;?><div class="upload-pre-item">
                            <img src="/Uploads/<?php echo ($goodsPhoto["path"]); ?>">
                            <a href="javascript:;" dbid="<?php echo ($goodsPhoto["id"]); ?>">X</a>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>
               <hr/>
            </td>
        </tr>
        <!--该行显示上传插件-->
        <tr>
            <td>
                <input type="file" id="upload-gallery">
            </td>
        </tr>
    </table>
    <table cellspacing="1" cellpadding="3" width="100%"  style="display: none">
        <tr>
            <td class="label">相关文章</td>
            <td>
                <input type='text' name='name4' maxlength='60' value='<?php echo ($name); ?>'/> <span
                    class="require-field">*</span>
            </td>
        </tr>
    </table>

    <tr>
                    <td colspan="2" align="center"><br/>
                        <input type="hidden" name="id" value="<?php echo ($id); ?>"/>
                        <input type="submit" class="button " value=" 确定 "/>
                        <input type="reset" class="button" value=" 重置 "/>
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
    <script type="text/javascript" src="http://admin.shop.com:8080/Public/Admin/uploadify/jquery.uploadify.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="http://admin.shop.com:8080/Public/Admin/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="http://admin.shop.com:8080/Public/Admin/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript">
           $(function(){
//************************************ 显示信息添加编辑切换的js***********************************
               //在本编辑页面下每一个tab(span标签)下对应一个table
         //1.找到每个tab  给它添上点击事件
            $('#tabbar-div span').click(function(){
                //2.先去掉当前选准的tab-front,换成未选准的tab-back
                $('#tabbar-div span').removeClass('tab-front').addClass('tab-back');
                //3.再给现在点击的tab 删去tab-back添上class=table-front
                $(this).removeClass('tab-back').addClass('tab-front');

                //4.的到点击的tab(span)的索引
                var index=$(this).index();
                //5.将所有的table影藏
                $('.main-div form table').hide();
                //6.将点击的span对应的table打开
                $('.main-div form>table').eq(index).show();
                //判断 当索引等于1时 给对应表格加入在线编辑器
                if(index==1){
   //********************************88在线编辑器******************************************
                    var editor=UE.getEditor('intro',{       //第一个参数表示表单元素的id 但在这里书写不要# 参数二是在线编辑器的配置
                        initialFrameHeight:300    //编辑器显示高度
                    });
                    //***************************
                }
            });


//************************************ 分类树状结构js*********************************************
               var setting = {
                   data: {
                       simpleData: {
                           enable: true,
                           pIdKey: "parent_id",
                       }
                   },
                   callback: {
                       beforeClick: function(treeId, treeNode){
                           if(treeNode.isParent){    //如果这个节点是父节点 则应该不能被选准
                               //显示出一个提示框
                               layer.msg('必须选中最子分类!', {
                                   time:1000,  //提示框提示时间
                                   offset: 0,  //设置位置
                                   icon:2,  //设置提示框中的图标
                               });
                           }

                           //如果 是父节点 取反为false 则不能被选准 .如果不是父节点取反为正 则能被选准
                           return  !treeNode.isParent;
                       },
                       onClick: function (event, treeId, treeNode) {  //treeNode就是点击的这个节点
                           //将节点的id(就是数据库中的id) 和节点的name复制给  parent_name和parent_id表单元素
                           $('.goods_category_name').val(treeNode.name);
//                           alert(treeNode.name);
                           $('.goods_category_id').val(treeNode.id);

                       }
                   }
               };
               //获取树节点的数据
               var zNodes = <?php echo ($zNodes); ?>;  //$zNodes是php代码
//               console.debug(zNodes);
               //找到存放父级分类的ul 变为树状结构
               var treeObj = $.fn.zTree.init($("#treeDemo"), setting, zNodes);//默认所有节点是合并的
               <?php if(empty($id)): ?>treeObj.expandAll(true);//表示展开所有节点
               <?php else: ?>
               // 表示编辑 从treeObj找到需要被选准的节点对象
               var goods_category_id=<?php echo ($goods_category_id); ?>;
//               console.debug(goods_category_id);
               //根据$goods_category_id找到自己对相应的节点
               var node=treeObj.getNodeByParam('id',goods_category_id);//根据goods_category_id自己的值,找自己对应的节点
               //通过树对象选准该节点
               treeObj.selectNode(node);
               //将选准的节点的名字赋值给父级分类框
               $('.goods_category_name').val(node.name);
               $('.goods_category_id').val(node.id);<?php endif; ?>

//************************************ 上传图片的js*********************************************
               $("#goods_logo").uploadify({
                   height            : 25,
                   width             : 145,
                   'buttonText'     :'图片上传',//指定按钮上的文字
//               'debug'           : true,//是否调试
                   'fileSizeLimit'  : '1MB',   //文件最大上传大小
                   'fileTypeExts'    : '*.gif;*.jpg;*.png',//允许上传的文件格式
                   'formData':{'dir':'Brand'},  //上传文件时额外传递过去的参数，告知服务器上的IndexController中的index方法将来将文件上传到哪个文件夹下
                   // 'fileObjName': 'xxx'  上传文件的名字 默认是Filedata
                   'swf'           : 'http://admin.shop.com:8080/Public/Admin/uploadify/uploadify.swf',  //flash插件地址
                   'uploader'      : "<?php echo U('Upload/index');?>",     //处理上传插件 上传上来的 文件
                   'onUploadSuccess' : function(file,data,response){  //data 是响应的上传后的地址
//                   alert(data);//   brand-logo/2016-01-14/5697086311483.jpg
                       $('.upload-img-box').show();//显示出div
                       $('.upload-img-box .upload-pre-item img').attr('src','/Uploads/'+data);//找到img标签 ，给属性src赋值
                       $('.logo').val(data);// 将上传后的路径保存到隐藏域中 和表单一起提交 保存在数据库中
                   },
                   'onUploadError': function(file,errorCode,errorMsg,errorString){
                       alter('The file' + file.name+'could not be upload:'+errorString);
                   }
               });
               /***************************编辑时选中商品状态回显*******************************************************************/
               <?php if(!empty($id)): ?>var selectedGoodsStatus = [];
               var goods_status = <?php echo ($goods_status); ?>;
               if(goods_status&1){
                   selectedGoodsStatus.push(1); //如果商品状态有是1. 将1放到数组中
               }
               if(goods_status&2){
                   selectedGoodsStatus.push(2); //如果商品状态有2. 将2放到数组中
               }
               if(goods_statu &4){
                   selectedGoodsStatus.push(4); //如果商品状态有41. 将4放到数组中
               }
               $('.goods_status').val(selectedGoodsStatus);<?php endif; ?>
//*********************************** 上传相片js*********************************************

               $('#upload-gallery').uploadify({
                   height        : 30,
                   width         : 120,
                   'buttonText' : '上传图片', //指定按钮上面的文字
                   'debug' : false,  //是否调试
                   'fileSizeLimit' : '1MB',   //最大上传大小
                   'fileTypeExts' : '*.gif; *.jpg; *.png',  //允许上传的文件
                   'formData':{'dir':'Goods'},  //上传文件时额外传递过去的参数---->告知服务器上的IndexController中的index方法将来将文件上传到哪个文件夹下
                   // 'fileObjName': 'xxx', //上传该文件时,以什么名字上传..   $_FIELS['Filedata']  . 默认为:Filedata
                   'swf'           : 'http://admin.shop.com:8080/Public/Admin/uploadify/uploadify.swf',  //flash插件地址
                   'uploader'      : "<?php echo U('Upload/index');?>",     //处理上传插件 上传上来的 文件
                   'onUploadSuccess' : function(file, data, response) {  //data就是响应的 上传后的地址
                       //上传成功之后向
                       var imgHtml = '<div class="upload-pre-item">\
                                 <img src="/Uploads/'+data+'">\
                               <input type="hidden" name="goods_photo_paths[]" value="'+data+'">\
                               <a href="javascript:;">X</a>\
                               </div>';

                       $('#upload-img-box').append(imgHtml);

                   },
                   'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                       alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
                   }
               });
               //删除照片 /.删除页面 的相片的同时也删除数据库中的  a标签是加相片时后面添上了 ,所以要用委派事件
               $('#upload-img-box').on('click','a',function(){
                   alert('1');
               });
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