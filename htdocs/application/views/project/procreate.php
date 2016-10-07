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
            	<a href="<?= site_url('account/personal')?>"><?=$user['email']?></a>
                <span>|</span>
                <a href="<?= site_url('account/log_out')?>">注销</a>
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
                    <h3><?= $user['user_fullname']?></h3>
                </div>
                <div class="u-school">
                    <span><?= $user['school_name']?></span>
                    <em>|</em>
                    <span><?= $user['major']?></span>
                    <em>|</em>
                    <span><?= $user['education_name']?></span><em>|</em>
                    <span><?= $user['admission_year']?>级
                    </span>
                </div>
                <div class="u-info">
                    <ul>
                        <li>
                            <span class="icon-u-phone"><?= $user['telephone']?></span>
                        </li>
                        <li>
                            <span class="icon-u-mail"><?= $user['email']?></span>
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
    <div class="user-wp-box">
        <div class="wrap clearfix">
            <div class="user-wp-main">
                <div class="user-wp-title clearfix">
                    <h4 class="fl">我的比赛项目</h4>
                </div>
                <div class="user-wp-info">
                    <form id="form1" method="post" name="form1" enctype="multipart/form-data" onsubmit="return check()">
                        <p class="title">请认真填写参赛项目信息，以便评委对您的参赛项目进行有效性审查！</p>
                        <br>
                        <table class="my-project-form">
                            <tbody>
                                <tr>
                                    <td valign="top">
                                        <div class="label">
                                            <em>*</em>项目名称:
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" name="project_name" placeholder="项目名称简洁明确" class="nor-inp" required maxlength="255"> 
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <div class="label">
                                            <em>*</em>团队名称:
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" name="team_name" placeholder="团队名称简洁明确" class="nor-inp" required maxlength="255"> 
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <div class="label">
                                            <em>*</em>作品摘要:
                                        </div>
                                    </td>
                                    <td>
                                        <textarea class="pro-brief" name="project_brief" maxlength="200" style="width:600px;" required></textarea>
                                        <div class="textarea-tip" style="width:620px;">不超过200字</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <div class="label">
                                            <em>*</em>问题需求:
                                        </div>
                                    </td>
                                    <td>
                                        <textarea class="pro-require" name="project_require" maxlength="200" style="width:600px;" required></textarea>
                                        <div class="textarea-tip" style="width:620px;">不超过200字</div> 
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <div class="label">
                                            <em>*</em>数据使用:
                                        </div>
                                    </td>
                                    <td>
                                        <textarea class="pro-data" name="project_data" maxlength="200" style="width:600px;" required></textarea>
                                        <div class="textarea-tip" style="width:620px;">不超过200字</div> 
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <div class="label">
                                            <em>*</em>解决方案:
                                        </div>
                                    </td>
                                    <td>
                                        <textarea class="pro-solution" name="project_solution" maxlength="200" style="width:600px;" required></textarea>
                                        <div class="textarea-tip" style="width:620px;">不超过200字</div> 
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <div class="label">
                                            <em>*</em>社会价值:
                                        </div>
                                    </td>
                                    <td>
                                        <textarea class="pro-value" name="project_value" maxlength="200" style="width:600px;" required></textarea>
                                        <div class="textarea-tip" style="width:620px;">不超过200字</div> 
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <div class="label">
                                            <em>*</em>项目计划书:
                                        </div>
                                    </td>
                                    <td>
                                        <div class="pg-wrp">
                                            <div class="clearfix">
                                                <div class="upload-btn fl" id="pro-btn">
                                                    <input type="file" name="project_word" class="upload-file" required id="project_word" onchange="get_word_name(this)" accept="application/vnd.openxmlformats-officedocument.wordprocessingml.document,.doc">
                                                    <a href="javascript:" class="btn-white-sml">点击上传</a>
                                                </div>
                                                <div class="upload-tip fl" id="word_upload_div">
                                                    请选择word格式的文件，大小不超过20MB，文件数量1个。
                                                </div>
                                            </div>
                                            <div class="file-list fl">
                                                <ul class="plan" style="display:list-item;">
                                                    <li>
                                                        <div class="file-pic">
                                                            <img src="<?= site_url('images/file-word.jpg')?>">
                                                        </div>
                                                        <div class="file-name" id="word_name_div">
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div id="word_error" style="color: red"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <div class="label">
                                            <em>*</em>演示PPT:
                                        </div>
                                    </td>
                                    <td>
                                        <div class="pg-wrp">
                                            <div class="clearfix">
                                                <div class="upload-btn fl" id="pro-btn">
                                                    <input type="file" name="project_ppt" class="upload-file" required id="project_ppt" onchange="get_ppt_name(this)" accept="application/vnd.openxmlformats-officedocument.presentationml.presentation
                                                    ,.ppt">
                                                    <a href="javascript:" class="btn-white-sml">点击上传</a>
                                                </div>
                                                <div class="upload-tip fl" id="ppt_upload_div">
                                                    请选择ppt格式的文件，大小不超过20MB，文件数量1个。
                                                </div>
                                            </div>
                                            <div class="file-list fl">
                                                <ul class="plan" style="display:list-item;">
                                                    <li>
                                                        <div class="file-pic">
                                                            <img src="<?= site_url('images/file-ppt.jpg')?>">
                                                        </div>
                                                        <div class="file-name" id="ppt_name_div">
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div id="ppt_error" style="color: red"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="form-submit" style="margin-right:403px;">
                                              <!-- <a href="#" class="btn-blue-sml mr15">保存并继续添加项目团队信息</a> -->
                                              <input type="submit" class="btn-blue-sml mr15" id="login" value="保存并继续添加项目团队信息" onClick="javascript:form1.action='<?= site_url('project/enter_for')?>';javascript:form1.target='_self';" style="cursor: pointer;" onmousedown="reset_style()"/>
                                        </div>
                                    </td> 
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var isIE = /msie/i.test(navigator.userAgent) && !window.opera;
    var is_word_correct=true;
    var is_ppt_correct=true;
    function get_word_name(target){
        var file = $("#project_word").val();
        var strFileName=file.replace(/^.+?\\([^\\]+?)(\.[^\.\\]*?)?$/gi,"$1");  //正则表达式获取文件名，不带后缀
        var FileExt=file.replace(/.+\./,"");   //正则表达式获取后缀
        is_word_correct=true;
        var addHtml="";
        document.getElementById("word_name_div").innerHTML=strFileName+"."+FileExt;
        if(FileExt!="doc"&&FileExt!="docx"){
            addHtml="文件类型错误";
            is_word_correct=false;
        }else{
            var fileSize = 0;
            if (isIE && !target.files) {    // IE浏览器
                var filePath = target.value; // 获得上传文件的绝对路径
                var fileSystem = new ActiveXObject("Scripting.FileSystemObject");
                // GetFile(path) 方法从磁盘获取一个文件并返回。
                var file = fileSystem.GetFile(filePath);
                fileSize = file.Size;    // 文件大小，单位：b
            }
            else {    // 非IE浏览器
                fileSize = target.files[0].size;
            }
            var size = fileSize / 1024 / 1024;
            if (size > 20) {
                is_word_correct=false;
                addHtml="文件大小超过20M,请重新上传";
            }
        }
        $("#word_error").empty().append(addHtml);
    }
    function get_ppt_name(target){
        var file = $("#project_ppt").val();
        var strFileName=file.replace(/^.+?\\([^\\]+?)(\.[^\.\\]*?)?$/gi,"$1");  //正则表达式获取文件名，不带后缀
        var FileExt=file.replace(/.+\./,"");   //正则表达式获取后缀
        document.getElementById("ppt_name_div").innerHTML=strFileName+"."+FileExt;
        var addHtml="";
        is_ppt_correct=true;
        if(FileExt!="ppt"&&FileExt!="pptx"){
            addHtml="文件类型错误";
            is_ppt_correct=false;
        }else{
            var fileSize = 0;
            if (isIE && !target.files) {    // IE浏览器
                var filePath = target.value; // 获得上传文件的绝对路径
                var fileSystem = new ActiveXObject("Scripting.FileSystemObject");
                // GetFile(path) 方法从磁盘获取一个文件并返回。
                var file = fileSystem.GetFile(filePath);
                fileSize = file.Size;    // 文件大小，单位：b
            }
            else {    // 非IE浏览器
                fileSize = target.files[0].size;
            }
            var size = fileSize / 1024 / 1024;
            if (size > 20) {
                is_ppt_correct=false;
                addHtml="文件大小超过20M，请重新上传";
            }
        }
        $("#ppt_error").empty().append(addHtml);
    }
    function check(){
        document.getElementById("ppt_upload_div").style.color="";
        document.getElementById("word_upload_div").style.color="";
        return is_word_correct&&is_ppt_correct;
    }
    function reset_style(){
        if(!is_word_correct){
            document.getElementById("word_upload_div").style.color="red";
        }
        if(!is_ppt_correct){    
            document.getElementById("ppt_upload_div").style.color="red";
        }
    }
</script>
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