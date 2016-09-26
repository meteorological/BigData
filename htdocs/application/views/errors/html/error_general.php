<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>错误</title>
    <link rel="shortcut icon" href="<?php echo base_url('favicon.ico'); ?>">
    <script src="<?php echo base_url('tools/jquery/jquery-1.11.2.min.js'); ?>"></script>
    <script src="<?php echo base_url('tools/Bootstrap/js/bootstrap.min.js'); ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('tools/Bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/common.css'); ?>">

</head>
<body>

<div class="container">
    <h1><?php echo $heading; ?></h1>
    <?php echo $message; ?>
    <hr />
    <p>您可以尝试：</p>
    <a href='javascript:history.go(-1)'>后退并刷新。</a><br/>
    <?= anchor('', '返回首页并重新登录。'); ?>
</div>
</body>
</html>