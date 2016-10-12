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
<script src="<?= site_url('js/check.js')?>"></script>
</head>
<body>
<!--头部-->
<div class="header">
  <div class="wrap clearfix">
  	<div class="head_logo fl">
  	    <a href="<?= site_url('home/index')?>" class="logo"><img src="<?= site_url('images/logo.png')?>"></a>
  	</div>
    <div class="fr">
        <div class="head_side fl">
            <ul class="main_nav clearfix">
                <li class="fl"><a href="<?= site_url('home/index')?>">SMDA大赛</a>
                </li>
                <li class="fl">
                    <a href="<?= site_url('home/rule')?>">大赛规则</a>
                </li>
                <li class="fl"><a href="<?= site_url('data/index')?>">比赛数据</a></li>
                <li class="fl"><a href="<?= site_url('project/index')?>">报名通道</a>
                </li>
            </ul>
        </div>
        <div class="head_login fr">
            <span class="ueser_box fl">
                <i class="photo"></i>
	            <img class="header_img" src="<?= site_url('images/head-photo.png')?>" width="32" height="32"/>	
            </span>		
            <p class="fl ueser_cnt">
            	<a href="<?= site_url('account/personal')?>"><?= $user['email']?></a><span>|</span><a href="<?= site_url('account/log_out')?>">注销</a>
            </p>
        </div>
    </div>
  </div>
</div>
<!-- 网页内容 -->
<div class="content">
    <div class="personal-box">
        <div class="wrap">
            <div class="personal-box-top">
                <div class="personal-top-img">
                    <i class="personal-top-icon"></i>
                </div>
                <div class="personal-top-info">
                    <p class="a">完善个人资料</p>
                    <p class="b">完善个人信息后，就可以正式报名参加我们的比赛了！</p>
                </div>
            </div>
            <div class="personal-box-form">
                <div class="personal-form-list">
                    <form id="form1"  method="post" name="form1" onsubmit="return check()">
                        <ul>
                            <li class="clearfix">
                                <div class="form1-title">
                                    <em>*</em>真实姓名:
                                </div>
                                <div class="form1-info">
                                    <input type="text" placeholder="请输入真实姓名" class="nor-inp" id="user_fullname" name="user_fullname" maxlength="20" onchange="if_user_fullname_standard()" />
                                </div>
                                <div class="form1-info-check" id="user_fullname_error"></div>
                            </li>
                            <li class="clearfix">
                                <div class="form1-title">
                                    <em>*</em>身份证号:
                                </div>
                                <div class="form1-info">
                                    <input type="text" placeholder="请输入身份证号" class="nor-inp" id="id_number" name="id_number" maxlength="30" onchange="if_id_number_standard()">
                                </div>
                                <div class="form1-info-check" id="id_number_error"></div>
                            </li>
                            <li class="clearfix">
                                <div class="form1-title">
                                    <em>*</em>联系方式:
                                </div>
                                <div class="form1-info">
                                    <input type="text" placeholder="请输入联系方式" class="nor-inp" id="telephone" name="telephone" maxlength="20" onchange="if_telephone_standard()">
                                </div>
                                <div class="form1-info-check" id="telephone_error"></div>
                            </li>
                            <li class="clearfix">
                                <div class="form1-title">
                                    <em>*</em>所在院校:
                                </div>
                                <div class="form1-info">
                                    <div class="my-select university" style="width:350px;">
                                    <select name="school" id="school" style="width:100%;height: 40px">
                                    <?php for($i=0;$i<count($school);$i++):?>
                                        <option value="<?= $school[$i]['school_id'] ?>"><?= $school[$i]['school_name']?></option>
                                    <?php endfor;?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form1-info-check"></div>
                            </li>
                            <li class="clearfix">
                                <div class="form1-title">
                                    <em>*</em>专业名称:
                                </div>
                                <div class="form1-info">
                                    <input type="text" id="major" name="major" placeholder="请输入专业名称" class="nor-inp" maxlength="40" onchange="if_major_standard()">
                                </div>
                                <div class="form1-info-check" id="major_error"></div>
                            </li>
                            <li class="clearfix">
                                <div class="form1-title">
                                    <em>*</em>入学年份:
                                </div>
                                <div class="form1-info">
                                    <input type="text" id="admission_year" name="admission_year" placeholder="例如2016" class="nor-inp" maxlength="10" onchange="if_addmission_year_standard()">
                                </div>
                                <div class="form1-info-check" id="admission_year_error"></div>
                            </li>
                            <li class="clearfix">
                                <div class="form1-title">
                                    <em>*</em>学历层次:
                                </div>
                                <div class="form1-info">
                                    <div class="my-select education" style="width:350px;">
                                     <select name="educational_level" id="educational_level" style="width:100%;height: 40px">
                                    <?php for($i=0;$i<count($education);$i++):?>
                                        <option value="<?= $education[$i]['education_id'] ?>"><?= $education[$i]['education_name']?></option>
                                    <?php endfor;?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form1-info-check"></div>
                            </li>
                        </ul>
                        <div class="reg-submit">
                        <input type="submit" onClick="javascript:form1.action='<?= site_url('account/improve_personal_info')?>';javascript:form1.target='_self';" class="btn-blue-big" style="cursor: pointer;border: 0px;" value="提交申请" onmousedown="reset_style()">
                        </div>
                    </form>
                    <div class="reg-submit">
                    
                        <!-- <a href="persuccess.html" class="btn-blue-big"><span>提交申请</span></a> -->
                    
                    <script type="text/javascript">
                    var is_info_correct=true;
                    function if_user_fullname_standard(){
                        var addHtml="√ 正确";
                        var color="#22e42b";

                        var is_correct=true;
                        var user_fullname=$("#user_fullname").val();
                        var reg=/^[\u4e00-\u9fa5]{2,16}$/;
                        if(!reg.test(user_fullname)){
                            addHtml="请输入正确的中文姓名";
                            color="red";
                            is_correct=false;
                        }
                        $("#user_fullname_error").empty().append(addHtml);
                        document.getElementById('user_fullname_error').style.color = color;
                        return is_correct;                        
                    }
                    function if_id_number_standard(){  
                        var addHtml="√ 正确";
                        var color="#22e42b";
                        var is_correct=true;
                        var id_number=$("#id_number").val();
                        if(!scCard(id_number)){
                            addHtml="请输入正确的身份证号";
                            color="red";
                            is_correct=false;
                        }
                        $("#id_number_error").empty().append(addHtml);
                        document.getElementById('id_number_error').style.color = color;
                        return is_correct;
                    }
                    function if_telephone_standard(){
                        var addHtml="√ 正确";
                        var color="#22e42b";
                        var is_correct=true;
                        var telephone=$("#telephone").val();
                        var reg=/^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
                        if(!reg.test(telephone)){
                            addHtml="请输入正确的11位联系方式";
                            color="red";
                            is_correct=false;
                        }
                        $("#telephone_error").empty().append(addHtml);
                        document.getElementById('telephone_error').style.color = color;
                        return is_correct;                        
                    }
                    function if_addmission_year_standard(){
                        var addHtml="√ 正确";
                        var color="#22e42b";
                        var is_correct=true;
                        var admission_year=$("#admission_year").val();
                        var reg=/^((20[0-1]{1}[0-9]{1}))$/;
                        if(!reg.test(admission_year)){
                            addHtml="请输入正确的入学年份,如 2016";
                            color="red";
                            is_correct=false;
                        }
                        $("#admission_year_error").empty().append(addHtml);
                        document.getElementById('admission_year_error').style.color = color;
                        return is_correct;                        
                    }
                    function if_major_standard(){
                        var addHtml="√ 正确";
                        var color="#22e42b";
                        var is_correct=true;
                        var major=$("#major").val();
                        if(major==""){
                            addHtml="请输入正确的专业名称";
                            color="red";
                            is_correct=false;
                        }
                        $("#major_error").empty().append(addHtml);
                        document.getElementById('major_error').style.color = color;
                        return is_correct;                        
                    }
                    function check(){
                        document.getElementById('user_fullname').style.border = "";
                        document.getElementById('id_number').style.border = "";
                        document.getElementById('telephone').style.border = "";
                        document.getElementById('admission_year').style.border = "";
                        document.getElementById('major').style.border = "";
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
                        if(!if_user_fullname_standard()){
                            document.getElementById('user_fullname').style.border = "2px solid red";
                            is_info_correct=false;
                        }
                        if(!if_id_number_standard()){
                            document.getElementById('id_number').style.border = "2px solid red";
                            is_info_correct=false;
                        }
                        if(!if_telephone_standard()){
                            document.getElementById('telephone').style.border = "2px solid red";
                            is_info_correct=false;
                        }
                        if(!if_addmission_year_standard()){
                            document.getElementById('admission_year').style.border = "2px solid red";
                            is_info_correct=false;
                        }
                        if(!if_major_standard()){
                            document.getElementById('major').style.border = "2px solid red";
                            is_info_correct=false;
                        }
                    }               
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 网页尾部 -->
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
</body>
</html>