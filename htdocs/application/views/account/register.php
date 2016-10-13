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
#register{border: 0;}
</style>
<!--头部-->
<div class="header">
	<div class="wrap clearfix">
		<div class="logo-box">
			<h1 class="logo"> 
				<a href="<?= site_url('home/index')?>"><img src="<?= site_url('images/logo.png')?>"></a> 
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
                	<form id="form1" action="" name="form1" method="post" onsubmit="return check()" onkeydown="if(event.keyCode==13){return false;}">
                    <ul>
                        <li class="clearfix">
                            <div class="form1-title">
                                邮箱
                            </div>
                            <div class="form1-info">
                                <input type="text" value="" placeholder="用于登陆的账号" class="nor-inp" value="" id="username" name="email" onChange="if_email_exists()"/>              
                            </div>
                            <div class="form1-info-check" id="username_tips" style="color: #aaaaaa"><p>请输入常用邮箱</p></div>
                        </li>
                        <li class="clearfix">
                            <div class="form1-title">
                                密码
                            </div>
                            <div class="form1-info">
                                <input type="password" value="" placeholder="密码" class="nor-inp focus" id="password" name="password" onChange="if_password_standard()" />
                                
                            </div>
                            <div class="form1-info-check"  id="password_tips" style="color: #aaaaaa"><p>6-18位，字母数字组成</p></div>
                        </li>   
                        <li class="clearfix">
                            <div class="form1-title">
                                确认密码
                            </div>
                            <div class="form1-info">
                                <input type="password" value="" placeholder="再次输入密码" class="nor-inp focus" id="confirm_password" onChange="if_password_same()" />
                            </div>
                            <div class="form1-info-check"  id="confirm_password_tips" style="color: #aaaaaa">与密码保持一致</div>
                        </li>      
                       <li class="captcha-tag clearfix">
                            <div class="form1-title">
                                验证码
                            </div>
                            <div class="form1-info">
                                <input type="text" placeholder="验证码" style="width:157px;float:left;" class="nor-inp" class="code" id="code" name="code" onChange="if_code_standard()" />
                                <img src="<?= site_url('account/create_code/')?>"  id="code_img" class="yzm-img"  style="cursor:pointer;height:38px;margin-top:1px;margin-left:5px;" onclick="create_code()"/><a style="cursor:pointer;margin-left: 10px" onclick="create_code()">换一张</a>
                            </div>
                            <div id="code_error" class="form1-info-check" style="color:#aaaaaa "></div>
                        </li>    
                        <li class="protocol-tag clearfix">
                            <div class="form1-title">
                                &nbsp;
                            </div>
                            <div class="form1-info">
                                <span class="my-checkbox">
                                    <input type="checkbox" id="mycheckbox" name="checkbox" onchange="if_checkbox_standard()">
                                    <label id="agree"><em>阅读并接受</em></label><a href="javascript:" onclick="overlayProtocol()" target="_blank">《上海市高校“气象+大数据”应用创新大赛用户协议》</a>
                                </span>
                            </div>
                            <div class="form1-info-check" id="protocol" style="color:#aaaaaa "></div>
                        </li>
                         <div class="regist-submit">
                        <input type="submit" class="btn-blue-big" id="register" value="注册" onClick="javascript:form1.action='<?= site_url("account/signup/")?>';javascript:form1.target='_self';" onmousedown="reset_style()" style="cursor: pointer;"/>
                        </div>
                    </ul>       
                    </form>
                    <script type="text/javascript"> 
                        var is_info_correct=false;
                        function create_code(){
                            document.getElementById('code_img').src="<?php echo site_url('account/create_code/'); ?>?"+Math.random();
                        }
                        function if_email_exists(){
                            var email=$("#username").val();
                            var addHtml="√ 可以使用";
                            var color="#22e42b";
                            var is_correct=true;
                            if(email==""){
                                addHtml="邮箱不能为空";
                                color="red";
                                $("#username_tips").empty().append(addHtml);
                                document.getElementById('username_tips').style.color = color;
                                is_correct=false;
                                return is_correct; 
                            }
                            else if(email.match("^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$")==null){
                                addHtml="邮箱格式不正确";
                                color="red";
                                $("#username_tips").empty().append(addHtml);
                                document.getElementById('username_tips').style.color = color;
                                is_correct=false;
                                return is_correct;
                            }else{
                                $
                                .ajax({
                                    type : "post",
                                    async : false,
                                    dataType : "json", //收受数据格式
                                    data:{'email':$("#username").val()},
                                    url : "<?= site_url("account/if_email_exists/") ?>",
                                    cache : false,
                                    success : function(data) {
                                        if(data!=0){
                                            addHtml="邮箱已注册";
                                            color="red";
                                            is_correct=false;
                                        }
                                        document.getElementById('username_tips').style.color = color;
                                        $("#username_tips").empty().append(addHtml);
                                        //return is_correct;
                                        /*如果data不为0.则提示邮箱已注册*/
                                        /*如果data为0.则显示邮箱可用*/
                                    }
                                });
                                return is_correct;
                            }
                        }

                        function if_password_standard(){
                            var password=$("#password").val();
                            var addHtml="√ 正确";
                            var color="#22e42b";
                            var is_correct=true;
                            if(password==""){
                                addHtml="密码不能为空";
                                color="red";
                               
                                is_correct=false;
                            }else if(password.length<6){
                                addHtml="密码长度不能小于6位";
                                color="red";
                                is_correct=false;
                            }else if(password.length>18){
                                addHtml="密码长度不能大于18位";
                                color="red";
                                is_correct=false;
                            }else if(password.match("^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,18}$")==null){
                                addHtml="密码需要由字母和数组组成";
                                color="red";
                                is_correct=false;
                            }
                            $("#password_tips").empty().append(addHtml);
                            document.getElementById('password_tips').style.color = color;
                            return is_correct;
                        }

                        function if_password_same(){
                            var password=$("#password").val();
                            var confirm_password=$("#confirm_password").val();
                            var addHtml="√ 正确";
                            var color="#22e42b";
                            var is_correct=true;
                            if(confirm_password==""){
                                addHtml="确认密码不能为空";
                                color="red";
                                is_correct=false;
                            }else if(password!=confirm_password){
                                addHtml="确认密码与输入密码不一致";
                                color="red";
                                is_correct=false;          
                            }
                            $("#confirm_password_tips").empty().append(addHtml);
                            document.getElementById('confirm_password_tips').style.color = color;
                            return is_correct;
                        }

                        function if_code_standard(){
                            var code=$("#code").val();
                            var addHtml="√ 正确";
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

                        function if_checkbox_standard(){
                            var addHtml="√";
                            var is_correct=true;
                            var color="#22e42b";
                            if(document.getElementById('mycheckbox').checked==false)
                            {
                                addHtml="请阅读并勾选协议";
                                is_correct=false;
                                color="red";
                            }
                            document.getElementById('protocol').style.color = color;
                            $("#protocol").empty().append(addHtml);
                            return is_correct;
                        }

                        function check(){
                            document.getElementById('username').style.border = "";
                            document.getElementById('password').style.border = "";
                            document.getElementById('confirm_password').style.border = "";
                            document.getElementById('code').style.border = "";
                            document.getElementById('agree').style.color = "";
                            /*var is_correct=true;
                            if(!if_email_exists()){
                                is_correct=false;
                            }
                            if(!if_password_standard()){
                                is_correct=false;
                            }
                            if(!if_code_standard()){
                                is_correct=false;
                            }
                            if(!if_checkbox_standard())
                            {
                                is_correct=false;
                            }*/
                            return is_info_correct;
                        }

                        function reset_style(){
                            is_info_correct=true;
                            if(!if_email_exists()){
                                document.getElementById('username').style.border = "1px solid red";
                                is_info_correct=false;
                            }
                            if(!if_password_standard()){
                                document.getElementById('password').style.border = "1px solid red";
                                is_info_correct=false;
                            }
                            if(!if_password_same()){
                                document.getElementById('confirm_password').style.border = "1px solid red";
                                is_info_correct=false;
                            }
                            if(!if_code_standard()){
                                document.getElementById('code').style.border = "1px solid red";
                                is_info_correct=false;
                            }
                            if(!if_checkbox_standard()){
                                document.getElementById('agree').style.color = "red";
                                is_info_correct=false;
                            }
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
<div id="modal-overlay-protocol"> 
    <div class="modal-data-protocol">  
        <h3>上海市高校“气象+大数据”应用创新大赛用户协议</h3>
        <div class="protocol">
            <p>上海市“气象+大数据”应用创新大赛网站仅为本次比赛提供用户注册报名、数据下载功能。本协议约束大赛组委会和用户之间的权利义务。</p><br>
            <p>一、账号注册。为了能使用本网站服务，您同意以下事项：依本服务注册提示请您填写正确的手机号码、用户名和密码，并确保身份信息的有效性和合法性。若您提供任何违法、虚假资料，组委会有权终止您的帐号。</p><br>
            <p>二、用户个人隐私信息保护。比赛将采取技术措施和其他必要措施，确保用户个人隐私信息安全，防止在本服务中收集的用户个人隐私信息泄露、毁损或丢失。在发生前述情形可能时，将及时采取补救措施。</p>
            <p>组委会未经用户同意不向任何第三方公开、 透露用户个人隐私信息。但以下特定情形除外：
            <p>(1)根据法律法规规定或有权机关的指示提供用户的个人隐私信息；</p>
            <p>(2) 由于用户将其用户密码告知他人或与他人共享注册帐户与密码，由此导致的任何个人信息的泄漏；</p>
            <p>(3) 任何由于黑客攻击、电脑病毒侵入及其他不可抗力事件导致用户个人隐私信息的泄露。</p><br>
            <p>三、数据合法使用。本次比赛中专门提供的数据仅限本次比赛中使用，其他链接中提供的开放数据须遵守各数据拥有者所指定的使用规定，不得用于其他用途。一经发现，组委会保留追究其法律责任的权利。</p> 
        </div>
        <div class="submit">
            <a onclick="overlayProtocol()" href="" class="btn-blue-sml">关闭</a>
        </div>
    </div>
</div>
<script type="text/javascript">
    function overlayProtocol(){
        var e1 = document.getElementById('modal-overlay-protocol');          
        e1.style.visibility =  (e1.style.visibility == "visible"  ) ? "hidden" : "visible";
    }
</script>