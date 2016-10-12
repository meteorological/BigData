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
<div class="header">
  <div class="wrap clearfix">
  	<div class="head_logo fl">
  	    <a href="index.html" class="logo"><img src="../../../images/logo.png"></a>
  	</div>
    <div class="fr">
        <div class="head_side fl">
            <ul class="main_nav clearfix">
                <li class="fl"><a href="index.html">SMDA大赛</a></li>
                <li class="fl"><a href="rule.html">大赛规则</a></li>
                <li class="fl"><a href="download.html">比赛数据</a></li>
                <li class="fl"><a href="procreate.html">报名通道</a></li>
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
                <img src="#" data-bd-imgshare-binded="1" id="userimg">
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
                    <form id="project_form">
                        <p class="title">请认真填写参赛项目信息，以便评委对您的参赛项目进行有效性审查！</p>
                        <br>
                        <input type="hidden" id="project_id" value="<?= $project['project_id'] ?>">
                        <div class="user-wp-title1 clearfix">
                            <h4 class="fl">
                                <i>*</i>
                                团队成员
                                <em>（至少添加2名队员！）</em>
                            </h4>
                            <a class="btn-blue-sml fr member-add" href="javascript:;" onClick="show_add_member()" id="member_a">+添加</a>
                        </div>
                        <div class="user-wp-bd">
                            <table class="member-add-table">
                                <tbody id="member_tbody">              
                                </tbody>
                                <tr id="add_member_row" style="visibility: hidden;">
                                        <td>队员1</td>
                                        <td><input type="text" id="member_name" placeholder="姓名" class="nor-inp" style="width:85px;"></td>
                                        <td><input type="text" id="school" placeholder="学校" class="nor-inp" style="width:120px;"></td>
                                        <td><input type="text" id="major" placeholder="专业" class="nor-inp" style="width:80px;"></td>
                                        <td><input type="text" id="education" placeholder="学历" class="nor-inp" style="width:40px;"></td>
                                        <td><input type="text" id="admission_year" placeholder="年级" class="nor-inp" style="width:40px;"></td>
                                        <td><input type="text" id="telephone" placeholder="电话号码" class="nor-inp" style="width:120px;"></td>
                                        <td align="right">
                                            <a href="javascript:;" class="btn-blue-sml" onclick="add_member()">确认</a>
                                            <a href="javascript:;" class="btn-blue-sml" onclick="cancle_add_member()">取消</a>
                                        </td>
                                </tr>
                            </table>
                        </div>
                        <div class="user-wp-title1 clearfix">
                            <h4 class="fl">
                                <i>*</i>
                                项目指导老师
                            </h4>
                            <a class="btn-blue-sml fr member-add" href="javascript:;" onClick="show_add_teacher()" id="teacher_a">+添加</a>
                        </div>
                        <div class="user-wp-bd">
                            <table class="member-add-table">
                                <tbody id="teacher_tbody">
                                    <!-- <tr>
                                        <td>朱丹</td>
                                        <td>团委老师</td>
                                        <td>华东师范大学</td>
                                        <td>软件开发应用</td>
                                        <td>13917829004@qq.com</td>
                                        <td align="right"><a href="javascript:;" class="btn-blue-sml">确认</a></td>
                                    </tr> -->
                                    
                                </tbody>
                                <tr id="add_teacher_row"  style="visibility:hidden;">
                                        <th>指导老师</th>
                                        <td><input type="text" id="teacher_name" placeholder="姓名" class="nor-inp" style="width:70px;"></td>
                                        <td><input type="text" id="title" placeholder="职称" class="nor-inp" style="width:70px;"></td>
                                        <td><input type="text" id="tschool" placeholder="学校" class="nor-inp" style="width:100px;"></td>
                                        <td><input type="text" id="research" placeholder="研究方向" class="nor-inp" style="width:100px;"></td>
                                        <td><input type="text" id="email" placeholder="邮箱" class="nor-inp" style="width:100px;"></td>
                                        <td align="right">
                                            <a href="javascript:;" class="btn-blue-sml" onClick="add_teacher()">确认</a>
                                            <a href="javascript:;" class="btn-blue-sml" onClick="cancle_add_teacher() ">取消</a>
                                        </td>
                                    </tr>
                            </table>
                        </div>
                        <div class="form-submit finish" style="margin-right:403px;">
                            <a style="cursor: pointer;" class="btn-blue-sml mr15" onClick="save_team()">保存继续并报名成功</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
      <script type="text/javascript">
      function save_team(){
        if(member_num<3){
            alert('团队成员至少两人');
        }else if(member_num>5){
            alert('团队成员最多五人');
        }else if(teacher_num==0){
            alert('指导老师至少一人');
        }else if(teacher_num>1){
            alert('指导老师最多一人');
        }else{
            window.location.href="<?= site_url('account/personal')?>";
        }
      }
      var member_num=1;
      var teacher_num=0;
        function show_add_member(){
            if(member_num>5){
            alert('团队成员最多五人！');
        }else {
          document.getElementById('add_member_row').style.visibility="visible";
          document.getElementById('member_a').style.visibility="hidden";
           document.getElementById('member_name').focus();
       }
        }
        function show_add_teacher(){
            if(teacher_num>0){
                alert('指导老师最多一人!');
            }else{
                document.getElementById('add_teacher_row').style.visibility="visible";
                document.getElementById('teacher_a').style.visibility="hidden";
                document.getElementById('teacher_name').focus();
            }
        }
        function cancle_add_teacher(){
          $("#teacher_name").val("");
          $("#tschool").val("");
          $("#title").val("");
          $("#research").val("");
          $("#email").val("");
          document.getElementById('add_teacher_row').style.visibility="hidden";
          document.getElementById('teacher_a').style.visibility="visible";
        }
        function cancle_add_member(){
          $("#member_name").val("");
          $("#school").val("");
          $("#major").val("");
          $("#education").val("");
          $("#telephone").val("");
          $("#admission_year").val("");
          document.getElementById('add_member_row').style.visibility="hidden";
          document.getElementById('member_a').style.visibility="visible";
        }
        function add_member(){
        if(member_num>5){
            alert('团队成员最多五人！');
        }else if(!if_name_standard($("#member_name").val())){
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
              'telephone':$("#telephone").val()
              },
              url : "<?= site_url("project/add_member/") ?>",
              cache : false,
              success:function(data){
                var addHtml="<tr id=\"tr_"+data['id']+"\">";
                addHtml=addHtml+"<th>队员"+(member_num++)+"</th>"
                addHtml=addHtml+"<td>"+data['member_name']+"</td>";
                addHtml=addHtml+"<td>"+data['school']+"</td>";
                addHtml=addHtml+"<td>"+data['major']+"</td>";
                addHtml=addHtml+"<td>"+data['education']+"</td>";
                addHtml=addHtml+"<td>"+data['admission_year']+"</td>";
                addHtml=addHtml+"<td>"+data['telephone']+"</td>";
                addHtml=addHtml+"<td align=\"right\"><a onclick=\"delete_member("+data['id']+")\" href=\"javascript:;\" class=\"btn-blue-sml\">删除</a></td>";
                addHtml=addHtml+"</tr>";
                $("#member_tbody").append(addHtml);
                cancle_add_member();
              }
            });
          }
        }
        function add_teacher(){
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
              'role':'1'
              },
              url : "<?= site_url("project/add_member/") ?>",
              cache : false,
              success:function(data){
                var addHtml="<tr id=\"tr_"+data['id']+"\">";
                addHtml=addHtml+"<th>指导老师</th>";
                addHtml=addHtml+"<td>"+data['member_name']+"</td>";
                addHtml=addHtml+"<td>"+data['education']+"</td>";
                addHtml=addHtml+"<td>"+data['school']+"</td>";
                addHtml=addHtml+"<td>"+data['major']+"</td>";
                addHtml=addHtml+"<td>"+data['telephone']+"</td>";
                addHtml=addHtml+"<td align=\"right\"><a onclick=\"delete_teacher("+data['id']+")\" href=\"javascript:;\" class=\"btn-blue-sml\">删除</a></td>";
                addHtml=addHtml+"</tr>";
                $("#teacher_tbody").append(addHtml);
                cancle_add_teacher();
                teacher_num++;
              }
            });
          }
        }
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
      function delete_teacher(id){
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
            tr.parentNode.removeChild(tr);
            teacher_num=0;
        }
        });
      }
      </script>