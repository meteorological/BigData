<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>上海市高校“气象+大数据”应用创新大赛</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<link rel="stylesheet" type="text/css" href="<?= site_url('css/reset.css')?>">
<link rel="stylesheet" type="text/css" href="<?= site_url('css/main.css')?>">
<script src="<?= site_url('js/jquery-1.11.3.min.js')?>" type="text/javascript" charset="utf-8"></script>
<script src="<?= site_url('js/jquery.SuperSlide.2.1.1.js')?>"></script>
</head>
<body>
<!--头部-->
<style>
.header_img{border-radius:100%;}
.ueser_cnt a.u-name-msg {position:relative;padding-right:35px;}
.ueser_cnt a .msg-tag {height:15px;line-height:15px;color:#fff;font-size:12px;padding:0 5px;border-radius:8px;background:#f00;display:inline-block;position:absolute;right:-10px;top:-8px;}
</style>
<!--头部-->
<div class="header">
	<div class="wrap clearfix">
		<div class="logo-box">
			<h1 class="logo"> 
				<a href="<?= site_url('bigdata/index')?>"><img src="<?= site_url('images/logo.png')?>"></a> 
			</h1>
			<h2 class="logo-left">
	            <a href='<?= site_url('account/register')?>'><img src="<?= site_url('images/logo-regist.png')?>"></a>
	        </h2>	
		</div>	
	</div>
</div>
<!--end 头部-->
<div class="content">
	<!--内容区-->
    <div class="regist-box">
    	<div class="wrap clearfix">
            <div class="regist-box-l">
                <div class="info-form">
                	<form id="form1" action="" name="form1" method="post">
                    <ul>
                        <li class="clearfix">
                            <div class="form1-title">
                                邮箱
                            </div>
                            <div class="form1-info">
                                <input type="text" value="" placeholder="用于登陆的账号" class="nor-inp" value="" id="username" name="email" onchange="if_email_exists()" required />
                            </div>
                            <div class="form1-info-check" id="username_tips"></div>
                        </li>
                        <li class="clearfix">
                            <div class="form1-title">
                                密码
                            </div>
                            <div class="form1-info">
                                <input type="password" value="" placeholder="密码" class="nor-inp focus" id="password" name="password" required/>
                            </div>
                            <div class="form1-info-check"  id="password_tips"></div>
                        </li>      
                       <li class="captcha-tag clearfix">
                            <div class="form1-title">
                                验证码
                            </div>
                            <div class="form1-info">
                                <input type="text" placeholder="验证码" style="width:157px;float:left;" class="nor-inp" class="code" id="code" name="code" required="required"/>
                                <img src="<?= site_url('account/create_code/')?>"  id="code_img" class="yzm-img"  style="cursor:pointer;height:38px;margin-top:1px;margin-left:5px;" onclick="create_code()"/>
                            </div>
                            <div id="code_error" class="form1-info-check"></div>
                        </li>    
                        <li class="protocol-tag clearfix">
                            <div class="form1-title">
                                &nbsp;
                            </div>
                            <div class="form1-info">
                                <span class="my-checkbox">
                                    <input type="checkbox" id="mycheckbox" required="required" name="checkbox">
                                    <label id="agree"><em>阅读并接受</em></label><a href="#" target="_blank">《上海市高校“气象+大数据”应用创新大赛用户协议》</a>
                                </span>
                            </div>
                            <div class="form1-info-check" id="protocol" style="display:none">请阅读并勾选协议</div>
                        </li>
                         <div class="regist-submit">
                        <input type="submit" class="btn-blue-big" id="register" value="注册" onClick="javascript:form1.action='<?= site_url("account/signup/")?>';javascript:form1.target='_self';" style="cursor: pointer;"/>
                        </div>
                    </ul>       
                    </form>
                    <script type="text/javascript">
                        function create_code(){
                            alert(1);
                            document.getElementById('code_img').src="<?php echo site_url('account/create_code/'); ?>?"+Math.random();
                        }
                        function if_email_exists(){
                            $
                            .ajax({
                                type : "post",
                                async : false,
                                dataType : "json", //收受数据格式
                                data:{'email':$("#email").val()},
                                url : "<?= site_url("account/if_email_exists/") ?>",
                                cache : false,
                                success : function(data) {
                                    alert(data);
                                }
                            });
                        }
                    </script>
                </div>
            </div>
            <!--reg-box-l End-->
            <div class="regist-box-r">
                <div class="has-regist-box">
                    <p class="a">我已注册，现在就</p>
                    <p class="b">
                        <a href="<?= site_url('account/login')?>" class="btn-red-big"><span>登录</span></a>
                    </p>
                </div>
            </div>
            <!--reg-box-l End-->
        </div>
    </div>
    <!--reg-box End-->
    <!--end 内容区-->
</div>

<!--底部-->
<div class="footer">
    <div class="wrap clearfix">
        <div class="foot-info">
            <div class="foot-copyright">
                <p>主管部门：华东师范大学</p>
                <p>联系方式：12345678901</p>
            </div>
        </div>
        <div class="foot-right">
            <ul>
                <li>
                    <div class="a">
                        <img src="#">
                    </div>
                    <div class="b">大赛官方微信号</div>
                </li>
                <li>
                    <div class="a">
                        <img src="#">
                    </div>
                    <div class="b">大赛官方微信号</div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--end 底部-->
</body>
</html>