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
<div class="header">
  <div class="wrap clearfix">
  	<div class="head_logo fl">
  	    <a href="<?= site_url('home/index')?>" class="logo"><img src="<?= site_url('images/logo.png')?>"></a>
  	</div>
    <div class="fr">
        <div class="head_side fl">
            <ul class="main_nav clearfix">
                <li class="fl"><a href="<?= site_url('home/index')?>">MDA大赛</a>
                </li>
                <li class="fl">
                    <a href="#">大赛规则</a>
                </li>
                <li class="fl"><a href="#">比赛数据</a></li>
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
            	<a href="#"><?= $user['email']?></a><span>|</span><a href="<?= site_url('account/log_out')?>">注销</a>
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
                    <form id="form1"  method="post" name="form1">
                        <ul>
                            <li class="clearfix">
                                <div class="form1-title">
                                    <em>*</em>真实姓名:
                                </div>
                                <div class="form1-info">
                                    <input type="text" placeholder="请输入真实姓名" class="nor-inp" id="user_fullname" name="user_fullname" required maxlength="20"/>
                                </div>
                                <div class="form1-info-check"></div>
                            </li>
                            <li class="clearfix">
                                <div class="form1-title">
                                    <em>*</em>身份证号:
                                </div>
                                <div class="form1-info">
                                    <input type="text" placeholder="请输入身份证号" class="nor-inp" id="id_number" name="id_number" required maxlength="30">
                                </div>
                                <div class="form1-info-check"></div>
                            </li>
                            <li class="clearfix">
                                <div class="form1-title">
                                    <em>*</em>联系方式:
                                </div>
                                <div class="form1-info">
                                    <input type="text" placeholder="请输入电子联系方式" class="nor-inp" id="telephone" name="telephone" required maxlength="20">
                                </div>
                                <div class="form1-info-check"></div>
                            </li>
                            <li class="clearfix">
                                <div class="form1-title">
                                    <em>*</em>所在院校:
                                </div>
                                <div class="form1-info">
                                    <div class="my-select university" style="width:350px;">
                                    <select name="school" id="school">
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
                                    <input type="text" id="major" name="major" placeholder="请输入专业名称" class="nor-inp" required maxlength="40">
                                </div>
                                <div class="form1-info-check"></div>
                            </li>
                            <li class="clearfix">
                                <div class="form1-title">
                                    <em>*</em>入学年份:
                                </div>
                                <div class="form1-info">
                                    <input type="text" id="admission_year" name="admission_year" placeholder="例如2016" class="nor-inp" required maxlength="10">
                                </div>
                                <div class="form1-info-check"></div>
                            </li>
                            <li class="clearfix">
                                <div class="form1-title">
                                    <em>*</em>学历层次:
                                </div>
                                <div class="form1-info">
                                    <div class="my-select education" style="width:350px;">
                                     <select name="educational_level" id="educational_level">
                                    <?php for($i=0;$i<count($education);$i++):?>
                                        <option value="<?= $education[$i]['education_id'] ?>"><?= $education[$i]['education_name']?></option>
                                    <?php endfor;?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form1-info-check"></div>
                            </li>
                        </ul>
                        <input type="submit" onClick="javascript:form1.action='<?= site_url('account/improve_personal_info')?>';javascript:form1.target='_self';" class="btn-blue-big" value="提交申请">
                    </form>
                    <div class="reg-submit">
                    
                        <!-- <a href="persuccess.html" class="btn-blue-big"><span>提交申请</span></a> -->
                    </div>
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