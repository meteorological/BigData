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
                        <h3 class="program-name"><?= count($project)!=0?$project['project_name']:'暂无';?></h3>
                    </div>              
                    <div class="program-box">
                        <div class="program-box-title">
                            <h4>作品摘要</h4>
                        </div>
                        <div class="program-box-list" >
                            <div class="program-box-intro">
                                <?= count($project)!=0?$project['project_brief']:'暂无'; ?>
                            </div>
                        </div>
                    </div>
                    <div class="program-box">
                        <div class="program-box-title">
                            <h4>问题需求</h4>
                        </div>
                        <div class="program-box-intro">
                            <?= count($project)!=0?$project['project_require']:'暂无'; ?>
                        </div>
                    </div>
                    <div class="program-box">
                        <div class="program-box-title">
                            <h4>数据使用</h4>
                        </div>
                        <div class="program-box-list" >
                            <div class="program-box-intro">
                                <?= count($project)!=0?$project['project_data']:'暂无'; ?>
                            </div>
                        </div>
                    </div>
                    <div class="program-box">
                        <div class="program-box-title">
                            <h4>解决方案</h4>
                        </div>
                        <div class="program-box-intro">
                            <?= count($project)!=0?$project['project_solution']:'暂无'; ?>
                        </div>
                    </div>
                    <div class="program-box">
                        <div class="program-box-title">
                            <h4>社会价值</h4>
                        </div>
                        <div class="program-box-list" >
                            <div class="program-box-intro">
                                <?= count($project)!=0?$project['project_value']:'暂无'; ?>
                            </div>
                        </div>
                    </div>
                    <div class="program-box">
                        <div class="program-box-title">
                            <h4>项目相关附件</h4>
                        </div>
                        <div class="program-file-box">
                            <ul>
                                <li class="fl"> 
                                    <img src="../../../images/file-ppt.jpg"> 
                                    <span><a title=""><?= count($project)!=0?$project['pdf_name']:'暂无'; ?></a></span>
                                    <?php if(count($project)!=0):?>
                                    <a href="<?= site_url('project/download_file/1')?>" class="s-bluebtn">下载</a> 
                                    <a href="<?= site_url('project/preview_pdf/').'/'.$project['project_id']?>" target="_blank" class="s-bluebtn">预览</a> 
                                    <?php endif;?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="team-r">
                    <div class="program-edit">
                        <a href="<?= site_url('project/edit_project') ?>" class="btn-blue-sml">+编辑资料</a>
                    </div>            
                    <div class="team-box-father">
                        <div class="team-box">
                            <h4>项目负责人</h4>
                            <table>
                                <tr>
                                    <th width="80">姓名</th>
                                    <td><?= count($project)!=0?$user['user_fullname']:'暂无';?></td>
                                </tr>
                                <tr>
                                    <th>所在院校</th>
                                    <td><?= count($project)!=0?$user['school_name']:'暂无';?></td>
                                </tr>
                                <tr>
                                    <th>最高学历</th>
                                    <td><?= count($project)!=0?$user['education_name']:'暂无';?></td> 
                                </tr>
                                <tr>
                                    <th>所在年级</th>
                                    <td><?= count($project)!=0?$user['admission_year'].'级':'暂无';?></td>
                                </tr>
                                <tr>
                                    <th>所学专业</th>
                                    <td><?= count($project)!=0?$user['major']:'暂无';?></td>
                                </tr>
                                <tr>
                                    <th>邮箱</th>
                                    <td><?= count($project)!=0?$user['email']:'暂无';?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="team-box">
                            <h4>团队信息:<span><?= $project['team_name']?></span></h4>
                            <table>
                            <?php for($i=0;isset($teacher)&&$i<count($member);$i++):?>
                                <tr>
                                    <th width="80">队员<?= $i+1?></th>
                                    <td><?=$member[$i]['member_name']?></td>
                                    <td width="85"><?=$member[$i]['school']?></td>
                                    <td><?=$member[$i]['major']?></td>
                                    <td><?=$member[$i]['education']?></td>
                                    <td><?=$member[$i]['admission_year'].'级'?></td>
                                    <td><?=$member[$i]['telephone']?></td>
                                </tr> 
                            <?php endfor;?>
                            </table>
                        </div>
                        <div class="team-box">
                            <h4>指导老师</h4>
                            <table>
                            <?php for($i=0;isset($teacher)&&$i<count($teacher);$i++):?>
                                <tr>
                                    <th width="80"><?=$teacher[$i]['member_name']?></th>
                                    <td><?=$teacher[$i]['education']?></td>
                                    <td width="85"><?=$teacher[$i]['school']?></td>
                                    <td><?=$teacher[$i]['major']?></td>
                                    <td><?=$teacher[$i]['telephone']?></td>
                                </tr> 
                            <?php endfor;?>  
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
