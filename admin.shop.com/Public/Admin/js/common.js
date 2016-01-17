$(function(){
  $('.selectall').click(function(){
    //alert($(this).prop('checked'));//获取当前点击对象的属性值
    $('.ids').prop('checked',$(this).prop('checked'));//把当前点击对象大的属性值赋值给子复选框
  });
  //找到每页所有子复选框,当没选中的个数等于零时 同时选准上面复选框  不能换页
    $('.ids').click(function(){
      $('.selectall').prop('checked',$('.ids:not(:checked)').length==0 );
    });





  //1.通过ajax的get请求
  $('.ajax-get').click(function(){
    //从当前标签上取得url
    var url=$(this).attr('href');
    //发送ajax请求,用回调函数中的data表示响应数据
    $.get(url,showAjaxLayer);
    return false;    //取消默认事件
  });


  $('.ajax-post').click(function(){
    var form=$(this).closest('form'); //根据当前点击按钮向上找到form
    //var url=form.attr('action'); //通过form属性找到提交的url地址
    //序列化表单的数据
    //var params=form.serialize();   //name=1111&intro=1111111&sort=20&status=0&id=17
    //发送ajax请求,并接受返回数据
    //$.post(url,params,showAjaxLayer);
    if(form.length!=0){  //不为0说明是表单提交
      form.ajaxSubmit({success:showAjaxLayer});   //使用jquery.form.js插件实现的.
    }else{      //0说明批量删除
        var url=$(this).attr('url');
        var params=$('.ids:checked').serialize();//不仅可以得到真个表单的值.也可以获取每个表单元素的值
      $.post(url,params,showAjaxLayer);
    }

    return false;   //取消默认操作
  });


  function showAjaxLayer(data) {
                  //console.debug(data);//返回数据Object {info: "操作成功!!!", status: 1, url: null}
      //显示一个提示框
     var icon;
     if (data.status) {      //返回状态值是1 true说明成功 0  false说明失败
      icon = 1;     //成功符号
    } else {
      icon = 2;
    }
    //显示一个提示框
    layer.msg(data.info, {
      time: 1000,    //页面停留时间
      offset: 200,    //设置位置 ,离页面顶端大的位置
      icon: icon,       //设置提示框中的图标
      shift: 3,     //设置显示动画
      }, function () {      //提示框隐藏后执行的函数
      //如果data中有url则转向url
      //console.debug(data.url);  返回的url地址
      if (data.url){
        location.href = data.url;
      }
    });
  }

});