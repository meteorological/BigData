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
                    <a href="<?= site_url('home/rule')?>">大赛规则</a>
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
            <?php if(!isset($user)): ?>
                <a href="<?= site_url('account/login')?>">登录</a>
                <span>|</span>
                <a href="<?= site_url('account/register')?>">注册</a>
            <?php endif; ?>
            <!-- 如果用户已经登陆，这边需要显示email，点击能够跳转到个人后台 -->
            <?php if(isset($user)): ?>
                <a href="<?= site_url('account/personal')?>"><?=$user['email']?></a>
                <span>|</span>
                <a href="<?= site_url('account/log_out')?>">注销</a>
            <?php endif; ?>
            </p>
        </div>
    </div>
  </div>
</div>
<!-- 网页内容 -->
<div class="content">
    <div class="user-cnt-top">
        <div class="wrap clearfix">
            <div class="user-cnt-head">
                <img src="<?= site_url('images/head-photo.png')?>" data-bd-imgshare-binded="1" id="userimg">
            </div>
            <div class="user-cnt-dtl">
                <div class="u-name">
                    <h3><?=$user['user_fullname']?></h3>
                </div>
                <div class="u-school">
                    <span><?=$user['school_name']?></span>
                    <em>|</em>
                    <span><?=$user['major']?></span>
                    <em>|</em>
                    <span><?=$user['education_name']?></span><em>|</em>
                    <span><?=$user['admission_year']."级"?>
                    </span>
                </div>
                <div class="u-info">
                    <ul>
                        <li>
                            <span class="icon-u-phone"><?=$user['telephone']?></span>
                        </li>
                        <li>
                            <span class="icon-u-mail"><?=$user['email']?></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="user-cnt-r">
                <div class="user-edit">
                    <a href="#" class="btn-white-sml">+编辑资料</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(count($project)!=-1):?>
<div class="content-pro">
    <div class="content-pro-box">
        <div class="wrap">
            <div class="program-content clearfix">
                <div class="program-l">
                    <div class="program-title clearfix">
                        <h3 class="program-name"><?= count($project)!=0?$project[0]['project_name']:'还未报名，请点击报名按钮进行报名'; ?></h3>
                    </div>              
                    <div class="program-box">
                        <div class="program-box-title">
                            <h4>项目简介</h4>
                        </div>
                        <!-- <div class="program-box-list" >
                            <ul>
                                <li>
                                    <span class="a">团队名称</span>
                                    <span class="b"><?= count($project)!=0?$project[0]['team_name']:'暂无'; ?></span>
                                </li>
                                <li>
                                    <span class="a">所属类别</span>
                                    <span class="b">网站（含PC侧和移动侧）,软件（特定的PC客户端）</span>
                                </li>
                               <li>
                                    <span class="a">项目阶段</span>
                                    <span class="b">创意计划阶段</span>
                                </li>
                               <li>
                                    <span class="a">项目所在地</span>
                                    <span class="b"> 上海市 普陀区</span>
                                </li>
                            </ul>
                        </div> -->
                        <div class="program-box-intro">
                            <?= count($project)!=0?$project[0]['project_brief']:'暂无'; ?>
                        </div>
                    </div>
                    <div class="program-box">
                        <div class="program-box-title">
                            <h4>解决方案</h4>
                        </div>
                        <div class="program-box-intro">
                            <?= count($project)!=0?$project[0]['project_solution']:'暂无'; ?>
                        </div>
                    </div>
                    <div class="program-box">
                        <div class="program-box-title">
                            <h4>项目相关附件</h4>
                        </div>
                        <div class="program-file-box">
                            <ul>
                                <li class="fl"> 
                                    <img src="<?= site_url('images/file-ppt.jpg')?>"> 
                                    <span><a title=""><?= count($project)!=0?$project[0]['ppt_name']:'暂无'; ?></a></span>
                                    <?php if(count($project)!=0):?>
                                    <a href="<?= site_url('project/download_file/2')?>" class="s-bluebtn">下载</a> 
                                    <?php endif;?>
                                </li>
                                <li class="fl"> 
                                    <img src="<?= site_url('images/file-word.jpg')?>"> 
                                    <span><a title=""><?= count($project)!=0?$project[0]['word_name']:'暂无'; ?></a></span>
                                    <?php if(count($project)!=0):?>
                                    <a href="<?= site_url('project/download_file/1')?>" class="s-bluebtn">下载</a> 
                                    <?php endif;?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="team-r">
                    <div class="program-edit">
                        <?php if(count($project)!=0):?>
                        <a href="#" class="btn-blue-sml">+编辑资料</a>
                        <?php endif;if(count($project)==0):?>
                        <a href="<?= site_url('project/index')?>" class="btn-blue-sml">+报名</a>
                    <?php endif;?>
                    </div>
                    <div class="team-box">
                        <h4>参赛信息</h4>
                        <table>
                            <tr>
                                <th width="85">晋级情况</th>
                                    <td><?= count($project)!=0?$project[0]['project_status_name']:'暂无'; ?></td>
                                </tr>
                                <tr>
                                    <th>报名时间</th>
                                    <td><?= count($project)!=0?$project[0]['project_createtime']:'暂无'; ?></td>
                                </tr>
                                <!-- <tr>
                                    <th>团队名称</th>
                                    <td><?= count($project)!=0?$project[0]['team_name']:'暂无'; ?></td>
                                </tr> -->
                                <!-- <tr>
                                       <th>参赛项目类型</th>
                                       <td>“互联网+”公益创业</td>
                                   </tr>    -->   
                        </table>
                    </div>
                    
                    <div class="team-box-father">
                        <div class="team-box">
                            <h4>项目负责人</h4>
                            <table>
                                <tr>
                                    <th width="80"><?= count($project)!=0?$project[0]['user_fullname']:'暂无'; ?></th>
                                    <td><?= count($project)!=0?$project[0]['telephone']:'暂无'; ?></td>
                                </tr>
                                <tr>
                                    <th>所在院校</th>
                                    <td><?= count($project)!=0?$project[0]['school_name']:'暂无'; ?></td>
                                </tr>
                                <tr>
                                    <th>最高学历</th>
                                    <td><?= count($project)!=0?$project[0]['education_name']:'暂无'; ?></td> 
                                </tr>
                                <!-- <tr>
                                    <th>在校时间</th>
                                    <td> 2014年09月- 2018年06月</td>
                                </tr> -->
                                <tr>
                                    <th>所学专业</th>
                                    <td><?= count($project)!=0?$project[0]['major']:'暂无'; ?></td>
                                </tr>
                            </table>
                        </div>
                        <!-- <div class="team-box">
                            <h4>指导老师</h4>
                            <table>
                                <tr>
                                    <th width="80">朱丹</th>
                                    <td>团委老师</td>
                                    <td width="85">华东师范大学</td>
                                    <td>15202127279</td>
                                    <td>dzhu@sei.ecnu.edu.cn</td>
                                </tr>   
                            </table>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
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