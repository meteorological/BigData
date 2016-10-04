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
		</div>	
	</div>
</div>
<!--end 头部-->
<div class="content">
	<!--内容区-->
    <div class="login-box">
    	<div class="wrap clearfix">
            <div class="login-form">
                <div class="login-title">
                    <h2>用户登录</h2>
                </div>
                <div class="login-cnt">
                    <div class="form-list">
                        <form id="form1" name="form1" method="post">
                            <ul>
                                <li>
                                    <div class="form-inp">
                                        <input type="text" name="username" class="inp user-name" placeholder="邮箱" id="username" required>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-inp">
                                        <input type="password" name="password" class="inp user-pwd" placeholder="密码" id="password" required>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-inp form-captcha">
                                        <input type="text" name="code" placeholder="验证码" class="inp" id="security" required>
                                        <img src="<?= site_url('account/create_code/')?>" id="code_img" class="captcha-img" onclick="create_code()" style="cursor: pointer;">
                                    </div>
                                </li>
                            </ul>                
                        <div class="form-list-submit">
<!-- <input type="submit" value="登陆" class="btn-red-big" id="login" > -->
                            <input type="submit" class="btn-red-big" id="login" value="登录" onClick="javascript:form1.action='<?= site_url("account/log_in/")?>';javascript:form1.target='_self';" style="cursor: pointer;"/>
                        </div>                 
                   </form>
                   </div>
                    <div class="go-regist">
                        <a href="<?= site_url('account/register')?>" class="now-regist">
                            <span>立即注册</span>
                        </a>
                    </div>
                    <script type="text/javascript">
                        function create_code(){
                            document.getElementById('code_img').src="<?php echo site_url('account/create_code/'); ?>?"+Math.random();
                        }
                    </script>
                </div>
            </div>   
        </div>
    </div>
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