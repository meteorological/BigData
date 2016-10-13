<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>上海市高校“气象+大数据”应用创新大赛</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<link rel="stylesheet" type="text/css" href="../../../css/reset.css">
<link rel="stylesheet" type="text/css" href="../../../css/main.css">
<script src="../../../js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="../../../js/jquery.SuperSlide.2.1.1.js"></script>
<script src="../../../js/check.js"></script>
</head>
<body>
<!--头部-->
<style type="text/css">
a{cursor: pointer;}
</style>
<div class="header">
  <div class="wrap clearfix">
  	<div class="head_logo fl">
  	    <a href="<?= site_url('home/index')?>" class="logo"><img src="../../../images/logo.png"></a>
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
	            <img class="header_img" src="../../../images/head-photo.png" width="32" height="32"/>	
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
                <img src="../../../images/head-photo.png" data-bd-imgshare-binded="1" id="userimg">
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
<div class="content-pro">
    <div class="content-pro-box">
        <div class="wrap">
            <div class="program-content clearfix">
                <form id="form1" method="post" name="form1" enctype="multipart/form-data">      
                <div class="program-l">
                    <div class="program-title clearfix">
                        <h3 class="program-name"><?= $project['project_name']?></h3>
                    </div>
                    <input type="hidden" id="project_id" name="project_id" value="<?=$project['project_id']?>">        
                    <div class="program-box">
                        <div class="program-box-title">
                            <h4>作品摘要</h4>
                        </div>
                        <div class="program-box-list" >
                            <div class="program-box-intro">
                                <textarea class="pro-brief" name="project_brief" maxlength="200" required style="width:620px;"><?= $project['project_brief'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="program-box">
                        <div class="program-box-title">
                            <h4>问题需求</h4>
                        </div>
                        <div class="program-box-intro">
                            <textarea class="pro-brief" name="project_require" maxlength="200" required style="width:620px;"><?= $project['project_require'] ?></textarea>
                        </div>
                    </div>
                    <div class="program-box">
                        <div class="program-box-title">
                            <h4>数据使用</h4>
                        </div>
                        <div class="program-box-list" >
                            <div class="program-box-intro">
                                <textarea class="pro-brief" name="project_data" maxlength="200" required style="width:620px;"><?= $project['project_data'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="program-box">
                        <div class="program-box-title">
                            <h4>解决方案</h4>
                        </div>
                        <div class="program-box-intro">
                            <textarea class="pro-brief" name="project_solution" maxlength="200" required style="width:620px;"><?= $project['project_solution'] ?></textarea>
                        </div>
                    </div>
                    <div class="program-box">
                        <div class="program-box-title">
                            <h4>社会价值</h4>
                        </div>
                        <div class="program-box-list" >
                            <div class="program-box-intro">
                                <textarea class="pro-brief" name="project_value" maxlength="200" required style="width:620px;"><?= $project['project_value'] ?></textarea>
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
                                    <span><a title="" id="pdf_name_div"><?= $project['pdf_name']?></a></span>
                                    <!-- <a href="#" class="s-bluebtn">重新上传</a> --> 
                                    <div class="upload-btn fl" id="pro-btn" style="width: 98px;height: 28px;overflow: hidden;position: relative;">
                                        <input type="file" name="project_pdf" style="position:absolute;width:100%;height:100%;left:0;top:0;font-size:50px;cursor:pointer;opacity:0;" class="upload-file" id="project_pdf" onchange="get_pdf_name(this)" accept="application/pdf">
                                        <a class="btn-white-sml" href="javascript;">重新上传</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <div class="team-r">
                    <div class="program-edit">                        
                        <input type="submit" class="btn-blue-sml" id="login" value="确认提交" onClick="javascript:form1.action='<?= site_url('project/save_project')?>';javascript:form1.target='_self';" style="cursor: pointer;border: 0;"/>
                    </div>            
                    <div class="team-box-father">
                        <div class="team-box">
                            <h4>项目负责人</h4>
                            <table>
                                <tr>
                                    <th width="80">姓名</th>
                                    <td><?= $user['user_fullname']?></td>
                                </tr>
                                <tr>
                                    <th>所在院校</th>
                                    <td><?= $user['school_name']?></td>
                                </tr>
                                <tr>
                                    <th>最高学历</th>
                                    <td><?= $user['education_name']?></td> 
                                </tr>
                                <tr>
                                    <th>所在年级</th>
                                    <td><?= $user['admission_year'].'级'?></td>
                                </tr>
                                <tr>
                                    <th>所学专业</th>
                                    <td><?= $user['major']?></td>
                                </tr>
                                <tr>
                                    <th>邮箱</th>
                                    <td><?= $user['email']?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="team-box">
                            <h4>团队信息:<span><?= $project['team_name'] ?></span><span class="add-member"><a href="#" class="btn-blue-sml" onclick="overlay(-1)">增加</a></span></h4>
                            <table id="member_table">
                            <?php for($i=0;$i<count($member);$i++):?>
                                <tr id="tr_<?= $member[$i]['id']?>">
                                    <th width="50"><?= $member[$i]['member_name']?></th>
                                    <td width="85"><?= $member[$i]['school']?></td>
                                    <td width="60"><?= $member[$i]['major']?></td>
                                    <td width="30"><?= $member[$i]['education']?></td>
                                    <td width="30"><?= $member[$i]['admission_year']?></td>
                                    <td><?= $member[$i]['telephone']?></td> 
                                    <td><a onClick="delete_member(<?= $member[$i]['id']?>)">删除</a></td>
                                </tr> 
                            <?php endfor;?>
                            </table>
                        </div>
                        <div class="team-box">
                            <h4>指导老师</h4>
                            <table id="teacher_table">
                            <?php for($i=0;$i<count($teacher);$i++):?>
                                <tr>
                                    <th width="50"><?= $teacher[$i]['member_name']?></th>
                                    <td><?= $teacher[$i]['education']?></td>
                                    <td width="85"><?= $teacher[$i]['school']?></td>
                                    <td><?= $teacher[$i]['major']?></td>
                                    <td><?= $teacher[$i]['telephone']?></td>
                                    <td><a href="#" onclick="overlayTeacher(<?= $teacher[$i]['id']?>)">修改</a></td>
                                </tr>   
                            <?php endfor;?>
                            </table>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="modal-overlay"> 
    <div class="modal-data">        
        <form id="form2"  name="form2" method="post">
        <input type="hidden" id="member_id">
            <ul>
                <li class="clearfix">
                    <div class="form2-title">
                        姓名
                    </div>
                    <div class="form2-info">
                        <input type="text" value="" class="nor-inp"  id="member_name" name="username" />
                    </div>
                </li>
                <li class="clearfix">
                    <div class="form2-title">
                        学校
                    </div>
                    <div class="form2-info">
                        <input type="text" value="" class="nor-inp focus" id="school" name="university"/>
                    </div>       
                </li>      
                <li class="clearfix">
                    <div class="form2-title">
                        专业
                    </div>
                    <div class="form2-info">
                        <input type="text" value="" class="nor-inp focus" id="major" name="major"/>
                    </div>
                </li>   
                <li class="clearfix">
                    <div class="form2-title">
                        学历
                    </div>
                    <div class="form2-info">
                        <input type="text" value="" class="nor-inp focus" id="education" name="acdemic"/>
                    </div>
                </li>   
                <li class="clearfix">
                    <div class="form2-title">
                        年级
                    </div>
                   <div class="form2-info">
                        <input type="text" value="" class="nor-inp focus" id="admission_year" name="grade"/>
                    </div>
                </li>   
                <li class="clearfix">
                    <div class="form2-title">
                                联系方式
                    </div>
                    <div class="form2-info">
                        <input type="text" value="" class="nor-inp focus" id="telephone" name="phone"/>
                    </div>
                </li>   
            </ul>
        </form>
        <a onclick="overlay(-2)" class="btn-blue-sml">取消</a>
        <a onclick="overlay(-1)" class="btn-blue-sml">提交</a>
    </div>
</div>
<div id="modal-overlay-teacher"> 
    <div class="modal-data-teacher">        
        <form id="form3"  name="form3" method="post">
            <ul>
                <li class="clearfix">
                    <div class="form3-title">
                        姓名
                    </div>
                    <div class="form3-info">
                        <input type="text" value="" class="nor-inp"  id="teacher_name" name="username" />
                    </div>
                </li>
                <li class="clearfix">
                    <div class="form3-title">
                        学校
                    </div>
                    <div class="form3-info">
                        <input type="text" value="" class="nor-inp focus" id="tschool" name="university"/>
                    </div>       
                </li>      
                <li class="clearfix">
                    <div class="form3-title">
                        职称
                    </div>
                    <div class="form3-info">
                        <input type="text" value="" class="nor-inp focus" id="title" name="major"/>
                    </div>
                </li>   
                <li class="clearfix">
                    <div class="form3-title">
                        研究方向
                    </div>
                    <div class="form3-info">
                        <input type="text" value="" class="nor-inp focus" id="research" name="acdemic"/>
                    </div>
                </li>   
                <li class="clearfix">
                    <div class="form3-title">
                        联系方式
                    </div>
                   <div class="form3-info">
                        <input type="text" value="" class="nor-inp focus" id="email" name="grade"/>
                    </div>
                </li>    
            </ul>
        </form>
        <a onclick="overlayTeacher(-2)" class="btn-blue-sml">取消</a>
        <a onclick="overlayTeacher(<?= $teacher[0]['id']?>)" class="btn-blue-sml">提交</a>
    </div>
</div>
<script type="text/javascript">
var isIE = /msie/i.test(navigator.userAgent) && !window.opera;
    var is_pdf_correct=true;
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
var member_num=<?= count($member)+1?>;
function delete_member(id){
    $
    .ajax({
    type : "post",
    async : false,
    dataType : "json", //收受数据格式
    data:{'id':id},
    url : "<?= site_url("project/delete_member/") ?>",
    cache : false,
    success : function(data) {
    var tr=document.getElementById("tr_"+id);
    tr.parentNode.removeChild(tr); ;  
    member_num--;
    }
    });
}
    function overlay(id){
        //id -1 添加 -2 取消
        var e1 = document.getElementById('modal-overlay');
        if(e1.style.visibility=="visible"){
            if(id=="-1"){
                if(!if_name_standard($("#member_name").val())){
            alert('请输入正确的姓名');
          }else if($("#school").val()==""){
            alert('请输入正确的学校名称');
          }else if($("#major").val()==""){
            alert('请输入正确的专业名称');
          }else if($("#education").val()==""){
            alert('请输入正确的学历名称');
          }else if(!if_addmission_year_standard($("#admission_year").val())){
            alert('请输入正确的入学年份如:2016');
          }else if(!if_telephone_standard($("#telephone").val())){
            alert('请输入正确的11位联系方式');
          }else{
                    $
                    .ajax({
                    type: "post",
                    async : false,
                    dataType : "json", //收受数据格式
                    data:{'project_id':$("#project_id").val(),
                        'member_name':$("#member_name").val(),
                    'school':$("#school").val(),
                    'major':$("#major").val(),
                    'education':$("#education").val(),
                    'admission_year':$("#admission_year").val(),
                    'telephone':$("#telephone").val(),
                    },
                    url : "<?= site_url("project/add_member/") ?>",
                    cache : false,
                    success:function(data){
                        var addHtml="<tr id=\"tr_"+data['id']+"\">";
                        addHtml=addHtml+"<th width=\"50\">"+data['member_name']+"</th>";
                        addHtml=addHtml+"<td width=\"85\">"+data['school']+"</td>";
                        addHtml=addHtml+"<td width=\"60\">"+data['major']+"</td>";
                        addHtml=addHtml+"<td width=\"30\">"+data['education']+"</td>";
                        addHtml=addHtml+"<td width=\"30\">"+data['admission_year']+"</td>";
                        addHtml=addHtml+"<td>"+data['telephone']+"</td>";
                        addHtml=addHtml+"<td><a onclick=\"delete_member("+data['id']+")\">删除</a></td>";
                        addHtml=addHtml+"</tr>";
                        $("#member_table").append(addHtml);
                        e1.style.visibility="hidden";
                        $("#member_name").val("");
                        $("#school").val("");
                        $("#major").val("");
                        $("#telephone").val("");
                        $("#education").val("");
                        $("#admission_year").val("");
                        $("#member_id").val("");
                        member_num++;
                    }
                    });
                }
            }else if(id=="-2"){           
                e1.style.visibility="hidden";
                $("#member_name").val("");
                $("#school").val("");
                $("#major").val("");
                $("#telephone").val("");
                $("#education").val("");
                $("#admission_year").val("");
                $("#member_id").val("");
            }
        }else{
            if(member_num>7){
                alert('项目成员最多七人');
            }else{
            e1.style.visibility="visible";
        }}
    }

    function overlayTeacher(id){
        var e1 = document.getElementById('modal-overlay-teacher');    
        if(e1.style.visibility=="visible"){
            if(id!=-2){
                if(!if_name_standard($("#teacher_name").val())){
            alert('请输入正确的姓名');
          }else if($("#tschool").val()==""){
            alert('请输入正确的学校名称');
          }else if($("#title").val()==""){
            alert('请输入正确的职称');
          }else if($("#research").val()==""){
            alert('请输入正确的研究方向');
          }else if(!if_email_standard($("#email").val())){
            alert('请输入正确的邮箱');
          }else{
            $
            .ajax({
              type: "post",
              async : false,
              dataType : "json", //收受数据格式
              data:{'project_id':$("#project_id").val(),
                'member_name':$("#teacher_name").val(),
              'school':$("#tschool").val(),
              'education':$("#title").val(),
              'major':$("#research").val(),
              'telephone':$("#email").val(),
              'role':'1',
              'id':id
              },
              url : "<?= site_url("project/edit_teacher/") ?>",
              cache : false,
              success:function(data){
                var addHtml="<tr>";
                addHtml=addHtml+"<th width=\"50\">"+$("#teacher_name").val()+"</th>";
                addHtml=addHtml+"<td>"+$("#title").val()+"</td>";
                addHtml=addHtml+"<td width=\"85\">"+$("#tschool").val()+"</td>";
                addHtml=addHtml+"<td>"+$("#research").val()+"</td>";
                addHtml=addHtml+"<td>"+$("#email").val()+"</td>";
                addHtml=addHtml+"<td><a onclick=\"overlayTeacher("+id+")\" href=\"#\">修改</a></td>";
                addHtml=addHtml+"</tr>";
                $("#teacher_table").empty().append(addHtml);
                e1.style.visibility="hidden";
                $("#teacher_name").val("");
                $("#tschool").val("");
                $("#email").val("");
                $("#title").val("");
                $("#research").val("");
              }
            });
          }
        } else{
            e1.style.visibility="hidden";
            $("#teacher_name").val("");
            $("#tschool").val("");
            $("#email").val("");
            $("#title").val("");
            $("#research").val("");
        }  
        }else{
            $
            .ajax({
              type: "post",
              async : false,
              dataType : "json", //收受数据格式
              data:{'id':id},
              url : "<?= site_url("project/get_member_detail/") ?>",
              cache : false,
              success:function(data){
                document.getElementById('teacher_name').focus();
                $("#teacher_name").val(data['member_name']);
                $("#tschool").val(data['school']);
                $("#email").val(data['telephone']);
                $("#title").val(data['education']);
                $("#research").val(data['major']);
              }
            });
            e1.style.visibility="visible";
        }
    }
</script>
<!-- 网页尾部 -->