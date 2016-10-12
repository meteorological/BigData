<!DOCTYPE html>
<html>
<head>
<!-- <meta charset="utf-8"> -->
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
#login{border: 0;width: 100%;}
</style>
<!--头部-->
<div class="header">
	<div class="wrap clearfix">
		<div class="logo-box">
			<h1 class="logo"> 
				<a href="<?= site_url('home/index')?>"><img src="<?= site_url('images/logo.png')?>"/></a> 
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
                        <form id="form1" name="form1" method="post" onsubmit="return check()">
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
                                        <input type="text" name="code" placeholder="验证码" class="inp" id="code" required onchange="if_code_standard()">
                                        <img src="<?= site_url('account/create_code/')?>" id="code_img" class="captcha-img" onclick="create_code()" style="cursor: pointer;"/>
                                        <div id="code_error"></div>
                                    </div>
                                </li>
                            </ul>                
                        <div class="form-list-submit">
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
                        function if_code_standard(){
                            var code=$("#code").val();
                            var addHtml="";
                            var color="#22e42b";
                            var is_correct=true;
                            if(code==""){
                                addHtml="验证码不能为空";
                                color="red";
                                $("#code_error").empty().append(addHtml);
                                document.getElementById('code_error').style.color = color;
                                is_correct=false;
                            }else{
                                $
                                .ajax({
                                    type : "post",
                                    async : false,
                                    dataType : "json", //收受数据格式
                                    data:{'code':code},
                                    url : "<?= site_url("account/code_standard/") ?>",
                                    cache : false,
                                    success : function(data) {
                                        if(data!=0){
                                            addHtml=data;
                                            color="red";
                                            is_correct=false;
                                        }
                                        document.getElementById('code_error').style.color = color;
                                        $("#code_error").empty().append(addHtml);
                                        /*如果data不为0.则提示邮箱已注册*/
                                        /*如果data为0.则显示邮箱可用*/
                                    }
                                });
                                return is_correct;
                            }
                        }
                        function check(){
                            var is_info_correct=true;
                            if(!if_code_standard()){
                                document.getElementById('code').style.border = "1px solid red";
                                is_info_correct=false;
                                setTimeout("document.getElementById('code').style.border = \"\"",200);
                            }
                            return is_info_correct;
                        }
                    </script>
                </div>
            </div>   
        </div>
    </div>
    <!--end 内容区-->
</div>
