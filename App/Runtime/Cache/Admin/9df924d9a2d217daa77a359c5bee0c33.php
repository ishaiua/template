<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台管理系统</title>
<meta name="author" content="DeathGhost" />
<link rel="shortcut icon" href="/favicon.png">
<link rel="stylesheet" type="text/css" href="/Public/css/style.css" />
<!--[if lt IE 9]>
<script src="/Public/js/html5.js"></script>
<![endif]-->
<script src="http://libs.baidu.com/jquery/2.1.3/jquery.min.js"></script>
<script src="/Public/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
	(function($){
		$(window).load(function(){
			
			$("a[rel='load-content']").click(function(e){
				e.preventDefault();
				var url=$(this).attr("href");
				$.get(url,function(data){
					$(".content .mCSB_container").append(data); //load new content inside .mCSB_container
					//scroll-to appended content 
					$(".content").mCustomScrollbar("scrollTo","h2:last");
				});
			});
			$(".content").delegate("a[href='top']","click",function(e){
				e.preventDefault();
				$(".content").mCustomScrollbar("scrollTo",$(this).attr("href"));
			});
		});
	})(jQuery);
</script>

<script type="text/javascript">
    $(function(){
        $('#<?php echo CONTROLLER_NAME; ?>').nextAll('dd').css('display','block');
        $('.lt_aside_nav dt').on('click',function(){
            var show =  $(this).nextAll('dd').css('display');
            if(show=='block'){
                $(this).nextAll('dd').slideUp();    
            }else{
                 $(this).nextAll('dd').slideDown();    
            }
        });
    });
</script>
<style type="text/css">
    .lt_aside_nav dd{display:none;}
 
    header .group_btn,header .group_btn:hover{
        background:#2a8467;
        margin-top: 20px; margin-left: 20px; 
        letter-spacing:2px;
        border-radius:3px;
        border: 1px solid rgba(0,0,0,0.2);
    }
  
    header .btn_active{
        box-shadow:1px 1px 3px white;
        background:#366a59;border:1px #0e8f61 solid;
        border: 1px solid rgba(0,0,0,0.2);
    }
     header .btn_active:hover{
       background:#366a59;
    }
</style>
    

</head>
<body>
<!--header-->
<header>
 <h1><img src="/Public/images/admin_logo.png"/></h1>

 <a href="<?php echo U('Admin/Index/index');?>"><input type="button" value="GM工具" name="" class="group_btn btn_active"></a>
 <a href="<?php echo U('Gamedata/Index/empty');?>"><input type="button" value="游戏数据" name="" class="group_btn"></a>
 <a href="<?php echo U('Userdata/Index/empty');?>"><input type="button" value="用户数据" name="" class="group_btn"></a> 
 <a href="<?php echo U('Income/index/empty');?>"> <input type="button" value="收入管理" name="" class="group_btn"></a> 

 
 <ul class="rt_nav">
  
  <li><a href="<?php echo U('Admin/Index/index');?>" class="admin_icon">权限管理</a></li>
  <li><a href="<?php echo U('Admin/Index/index');?>" class="set_icon">账号设置</a></li>
  <li><a href="<?php echo U('Admin/Login/logout');?>" class="quit_icon">安全退出</a></li>
</ul>
</header>

<!--aside nav-->
<aside class="lt_aside_nav content mCustomScrollbar">
 <h2><a href="">GM工具</a></h2>
 <ul>

 
    <?php if(session(C('ADMIN_AUTH_KEY'))==true && MODULE_NAME=='Home' ): ?><li>
       <dl>
        <dt id="AccountSetting">账号权限管理</dt>
        <!--当前链接则添加class:active-->
           <?php if(session(C('ADMIN_AUTH_KEY'))==true): ?><dd><a href="<?php echo U('AccountSetting/getuserlist',array('module'=>$_GET['module']));?>" id="AccountSettinggetuserlist">用户管理</a></dd>
              <dd><a href="<?php echo U('AccountSetting/getrolelist',array('module'=>$_GET['module']));?>" id="AccountSettinggetrolelist">角色管理</a></dd>
              <dd><a href="<?php echo U('AccountSetting/getnodelist',array('module'=>$_GET['module']));?>" id="AccountSettinggetnodelist">节点管理</a></dd><?php endif; ?> 
          <dd><a href="<?php echo U('AccountSetting/index',array('module'=>$_GET['module']));?>" id="AccountSettingindex">账号设置</a></dd>
       </dl>
      </li><?php endif; ?>
    
 
        <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
           <dl>
            <dt id="<?php echo ($v['name']); ?>"><?php echo ($v["title"]); ?></dt>
              <?php if(is_array($v['child'])): $i = 0; $__LIST__ = $v['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><dd><a href='<?php echo U("$v[name]/$v1[name]",array("module"=>$_GET["module"]));?>' id="<?php echo ($v['name']); echo ($v1['name']); ?>"><?php echo ($v1["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
           </dl>
          </li><?php endforeach; endif; else: echo "" ;endif; ?>
    

    <li>
      <p class="btm_infor">© 版权所有</p>
    </li>

 </ul>
</aside>

<style type="text/css">
    
    .table td{text-align:center;}
    .table th{letter-spacing:4px;}
    .table .dataList:hover{
      background:#FFE4B5;
    }
    .lt_aside_nav dt{
      cursor:pointer;
    }

    .welDear{margin:10px 0;font-size:14px;}
    #showPopTxt{cursor: pointer;}
    #error_tip{text-align: center;color:red;}

    #<?php echo CONTROLLER_NAME.ACTION_NAME; ?>{
      color:#19a97b;
      background:#f8f8f8;
    }
    
</style>

  
  <section class="rt_wrap content mCustomScrollbar">
      <div class=" mCustomScrollbar" style="width:800px;margin:40px;">
          
          <p class="welDear">亲爱的 <b style="color:red;"><?php echo (session('name')); ?></b> 你好!</p>
          <p class="welDear">信息面板:</p>
           <table class="table fl">
           
            <tr>
             <td class="center">本月登录总数</td>
             <td class="center"><?php echo ($data['m_count']); ?></td>
            </tr>
            <tr>
             <td class="center">本次登录IP</td>
             <td class="center"><?php echo ($data['current_login_ip']); ?></td>
            </tr>
            <tr>
              <td class="center">本次登录时间</td>
              <td class="center"><?php echo (date("Y-m-d H:i:s",$data['current_login_time'])); ?></td>
            </tr>
            <tr>
             <td class="center">上次登录IP</td>
             <td class="center"><?php echo ($data['prev_login_ip']); ?></td>
            </tr>
            <tr>
             <td class="center">上次登录时间</td>
             <td class="center"><?php echo (date("Y-m-d H:i:s",$data['prev_login_time'])); ?></td>
            </tr>
           </table>
           <p class="welDear" style="text-align:center;line-height:40px;">若上方登录信息异常,请及时<a id="showPopTxt">修改密码</a></p>
      </div>  
  </section>



  <!-- 弹出框 -->
  <section class="pop_bg">
    <div class="pop_cont">
     <!--title-->
     <h3>修改密码</h3>
     <!--content-->
     <div class="pop_cont_input">
      <ul>

        <li>
        <span>　用户名</span>
        <input type="text" class="textbox" id="nickname" value="<?php echo (session('name')); ?>" readonly="true" />
       </li>

       <li>
        <span>密　　码</span>
        <input type="password" placeholder="密码" class="textbox" id="pwd"/>
       </li>
    
       <li>
        <span class="ttl">重复密码</span>
        <input type="password" placeholder="重复密码" class="textbox" id="repwd"/>
       </li>

       <li id="error_tip"></li>
      </ul>
     </div>
     <!--bottom:operate->button-->
     <div class="btm_btn">
      <input type="button" value="确认" class="input_btn trueBtn"/>
      <input type="button" value="关闭" class="input_btn falseBtn"/>
     </div>
    </div>
  </section>


  <script type="text/javascript">
    
    $(function(){
        //弹出文本性提示框
       $("#showPopTxt").click(function(){
            $(".pop_bg").fadeIn();
        });
       //弹出：确认按钮
        $(".trueBtn").click(function(){
                
            var pwd = $('#pwd').val(); 
            var repwd = $('#repwd').val();
           

            if( pwd===repwd ){
                
                if( pwd.length<5 ){ alert('密码不能低于5位');return false; }

                $.post('/index.php/Admin/Index/updateUserPassword',{"password":repwd },function(e){
                     location.href = "<?php echo U('Login/logout');?>";
                });
            }else{
                $('#error_tip').html('密码前后不一致.');
            }


           
        });
       //弹出：取消或关闭按钮
       $(".falseBtn").click(function(){
            $(".pop_bg").fadeOut();
        });

    });
  </script>

</body>
</html>