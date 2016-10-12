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
<div class="header head-fixed">
  <div class="wrap clearfix">
    <div class="head_logo fl">
        <a href="<?= site_url('home/index')?>" class="logo"><img src="<?= site_url('images/logo.png')?>"></a>
    </div>
    <div class="fr">
        <div class="head_side fl">
            <ul class="main_nav clearfix">
                <li class="fl"><a href="<?= site_url('home/index')?>">SMDA大赛</a></li>
                <li class="fl"><a href="<?= site_url('home/rule')?>">大赛规则</a></li>
                <li class="fl"><a href="<?= site_url('data/index')?>">比赛数据</a></li>
                <li class="fl"><a href="<?= site_url('project/index')?>">报名通道</a></li>
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