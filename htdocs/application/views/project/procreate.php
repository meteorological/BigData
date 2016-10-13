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
                <img src="../../../images/head-photo.png" data-bd-imgshare-binded="1" id="userimg">
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
                                        <textarea class="pro-brief" name="project_brief" maxlength="800" style="width:600px;" required></textarea>
                                        <div class="textarea-tip" style="width:620px;">不超过800字</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <div class="label">
                                            <em>*</em>问题需求:
                                        </div>
                                    </td>
                                    <td>
                                        <textarea class="pro-require" name="project_require" maxlength="800" style="width:600px;" required></textarea>
                                        <div class="textarea-tip" style="width:620px;">不超过800字</div> 
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <div class="label">
                                            <em>*</em>数据使用:
                                        </div>
                                    </td>
                                    <td>
                                        <textarea class="pro-data" name="project_data" maxlength="800" style="width:600px;" required></textarea>
                                        <div class="textarea-tip" style="width:620px;">不超过800字</div> 
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <div class="label">
                                            <em>*</em>解决方案:
                                        </div>
                                    </td>
                                    <td>
                                        <textarea class="pro-solution" name="project_solution" maxlength="800" style="width:600px;" required></textarea>
                                        <div class="textarea-tip" style="width:620px;">不超过800字</div> 
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <div class="label">
                                            <em>*</em>社会价值:
                                        </div>
                                    </td>
                                    <td>
                                        <textarea class="pro-value" name="project_value" maxlength="800" style="width:600px;" required></textarea>
                                        <div class="textarea-tip" style="width:620px;">不超过800字</div> 
                                    </td>
                                </tr>
                               <!--  <tr>
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
                               </tr> -->
                                <tr>
                                    <td valign="top">
                                        <div class="label">
                                            <em>*</em>演示文稿:
                                        </div>
                                    </td>
                                    <td>
                                        <div class="pg-wrp">
                                            <div class="clearfix">
                                                <div class="upload-btn fl" id="pro-btn">
                                                    <input type="file" name="project_pdf" class="upload-file" required id="project_pdf" onchange="get_pdf_name(this)" accept="application/pdf">
                                                    <a href="javascript:" class="btn-white-sml">点击上传</a>
                                                </div>
                                                <div class="upload-tip fl" id="pdf_upload_div">
                                                    请选择pdf格式的文件，大小不超过20MB，文件数量1个。
                                                </div>
                                            </div>
                                            <div class="file-list fl">
                                                <ul class="plan" style="display:list-item;">
                                                    <li>
                                                        <div class="file-pic">
                                                            <img src="<?= site_url('images/file-ppt.jpg')?>">
                                                        </div>
                                                        <div class="file-name" id="pdf_name_div">
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div id="pdf_error" style="color: red"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="form-submit" style="margin-right:403px;">
                                              <!-- <a href="#" class="btn-blue-sml mr15">保存并继续添加项目团队信息</a> -->
                                              <input type="submit" class="btn-blue-sml mr15" id="login" value="保存并继续添加项目团队信息" onClick="javascript:form1.action='<?= site_url('project/enter_for')?>';javascript:form1.target='_self';" style="cursor: pointer;border: 0;"/>
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
   /* var is_word_correct=true;*/
    var is_pdf_correct=true;
/*    function get_word_name(target){
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
    }*/
    function get_pdf_name(target){
        var file = $("#project_pdf").val();
        var strFileName=file.replace(/^.+?\\([^\\]+?)(\.[^\.\\]*?)?$/gi,"$1");  //正则表达式获取文件名，不带后缀
        var FileExt=file.replace(/.+\./,"");   //正则表达式获取后缀
        document.getElementById("pdf_name_div").innerHTML=strFileName+"."+FileExt;
        var addHtml="";
        is_pdf_correct=true;
        if(FileExt!="pdf"){
            addHtml="文件类型错误";
            is_pdf_correct=false;
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
                is_pdf_correct=false;
                addHtml="文件大小超过20M，请重新上传";
            }
        }
        $("#pdf_error").empty().append(addHtml);
    }
    function check(){
        document.getElementById("pdf_upload_div").style.color="red";
        /*document.getElementById("word_upload_div").style.color="";*/
        setTimeout("document.getElementById(\"pdf_upload_div\").style.color=\"\"",200);
        return is_pdf_correct;
    }
</script>
<!-- 网页尾部 -->