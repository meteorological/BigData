<!DOCTYPE HTML>

<html>
	<head>
		<title><?php if (isset($title)) {
            echo $title;
        } ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="<?php echo base_url('tools/bigdata/assets/css/main.css'); ?>" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
		<!-- Scripts -->
			<script src="<?php echo base_url('tools/bigdata/assets/js/jquery.min.js'); ?>"></script>
			<script src="<?php echo base_url('tools/bigdata/assets/js/skel.min.js'); ?>"></script>
			<script src="<?php echo base_url('tools/bigdata/assets/js/util.js'); ?>"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="<?php echo base_url('tools/bigdata/assets/js/main.js'); ?>"></script>
	 <script type="text/javascript">  

$(document).ready(function() {  

    //Default Action  
    $(".tab_content").hide(); //Hide all content  
    $("ul.nav-tabs li:first a").addClass("active").show(); //Activate first tab  
    $(".tab_content:first").show(); //Show first tab content  
      
    //On Click Event  
    $("ul.nav-tabs li").click(function() {  
        $("ul.nav-tabs li a").removeClass("active"); //Remove any "active" class  
        $(this).find("a").addClass("active"); //Add "active" class to selected tab  
        $(".tab_content").hide(); //Hide all tab content  
        var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content  
        $(activeTab).fadeIn(); //Fade in the active content  
        return false;  
    }); 

    
    <?php if(isset($type)):?>
    	$(".tab_content").hide(); //Hide all content  
    	$("ul.nav-tabs li:last a").addClass("active").show(); //Activate first tab  
    	$(".tab_content:last").show(); //Show first tab content  
    	$("ul.nav-tabs li:first a").removeClass("active"); //Remove any "active" class  
        /*$("ul.nav-tabs li a:last").find("a").addClass("active"); //Add "active" class to selected tab  */
    <? endif; ?>

    var error_message="<?= (isset($error_message))?$error_message:"" ?>";
	if(error_message!=""){
    	alert(error_message);
    } 
});  

</script> 
	<body>
		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Header -->
					<header id="header" class="alt">
						<span class="logo"><img src="<?php echo base_url('tools/bigdata/images/logo.svg'); ?>" alt="" /></span>
						<h1><font size="10px" style="    margin-right: 17px;">大数据</font>开放共享平台</h1>
						<p></p>
					</header>
				<!-- Nav -->
					<nav id="nav">
						<ul class="nav nav-tabs">
							<li><a href="#signup" class="active" name="signup_li">注册</a></li>
							<li><a href="#login" name="login_li">登录</a></li>			
						</ul>
					</nav>
				<!-- Main -->
					<div id="main">

						<!-- Signup -->
							<section id="signup" class="tab_content main ">
									<!-- Form -->
										<form method="post" id="SignupInfo" target="_blank">
											<div class="row uniform">
												<div class="6u 12u$(xsmall)">
													<input type="text" name="username" id="demo-name" value="<?= isset($signup_name)?$signup_name:"" ?>" placeholder="姓名" required/>
												</div>
												<div class="6u$ 12u$(xsmall)">
													<input type="email" name="email" id="email" value="<?= isset($signup_email)?$signup_email:"" ?>" placeholder="邮箱" required onchange="if_email_exists()"/>
												</div>
												<div class="12u$">
													<input type="password" name="password" id="password" value="" placeholder="密码" required onchange="if_password_same()"/>
												</div>
												<div class="12u$">
													<input type="password"  name="password_confirm" id="password2" value="" placeholder="确认密码" required onchange="if_password_same()" />
												</div>
												<div class="6u 12u$(xsmall)">
													<input type="text"  name="identifying_code" id="demo-" value="" placeholder="验证码" required/>
												</div>
												<div class="6u 12u$(xsmall)">
													<img id="code" src="<?= site_url('account/create_code/')?>" alt="看不清楚，换一张" onClick="create_code()" style="width:120px;"/>
												</div>
												<div class="12u$">
													<ul class="actions vertical">
														<li><input type="submit" value="注册" class="special fit" onClick="javascript:SignupInfo.action='<?= site_url("account/signup/")?>';javascript:SignupInfo.target='_self';" /></li>
														<li><input type="reset" value="清空" class=" fit"/></li>
													</ul>
												</div>
											</div>
										</form>
							</section>

							<script type="text/javascript">
								function create_code(){
									document.getElementById('code').src="<?php echo site_url('account/create_code/'); ?>?"+Math.random();
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
								function if_password_same(){
									if($("#password").val()!=$("#password2").val()){
										alert('密码不一致');
									}
								}
							</script>
						<!-- First Section -->
							<section id="login" class="tab_content main special">
								<!-- Form -->
										<form method="post" id="LoginInfo">
											<div class="row uniform">					
												<div class="12u$">
													<input type="email" name="login-email" id="demo-email" value="<?= isset($login_email)?$login_email:"" ?>" placeholder="邮箱" />
												</div>
												<div class="12u$">
													<input type="password" name="login-password" id="demo-password" value="" placeholder="密码" />
												</div>							
												<div class="12u$">
													<ul class="actions vertical">
														<li><input type="submit" value="登录" class="button special fit" onClick="javascript:LoginInfo.action='<?= site_url("account/login/")?>';javascript:LoginInfo.target='_self';"/></li>
													</ul>
												</div>
											</div>
										</form>
							</section>
					</div>
			</div>
			<!-- Footer -->
					<footer id="footer">
						<p class="copyright">&copy;2015 - TIA. All Rights Reserved..</p>
					</footer>
	</body>
</html>