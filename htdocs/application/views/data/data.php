<!DOCTYPE html>
<html lang="zh-cn">
<!-- START HEAD -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if (isset($title)) { echo $title;} ?></title>
    <link rel="stylesheet" href="<?php echo base_url('tools/bigdata/assets/css/main.css'); ?>"/>
    <script src="<?php echo base_url('tools/bigdata/assets/js/jquery.min.js'); ?>"></script>
            <script src="<?php echo base_url('tools/bigdata/assets/js/skel.min.js'); ?>"></script>
            <script src="<?php echo base_url('tools/bigdata/assets/js/util.js'); ?>"></script>
            <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
            <script src="<?php echo base_url('tools/bigdata/assets/js/main.js'); ?>"></script>
</head>
<body>
<div style="float: right;margin-top: 10px;margin-right: 50px;">
<?php 
    if(isset($name)):?>
        <p><?= $name ?></p>
    <?php endif;
    if(!isset($name)):?>
        <a href="<?php echo site_url('account/index/'); ?>">请登录</a>
    <?php endif; 
?>
</div>
<div id="wrapper" class="large">
    <header id="header">
    
                        <h1>气象大数据开放共享平台</h1>
                        <p>Bigdata</p>
                    </header>             
                <div id="main">
                    <section class="main">
                        <header class="major"><h2>数据由上海市气象局提供</h2></header>
                        <a class="button right" href="<?php echo site_url('bigdata/download/1/'); ?>">数据下载</a>
                <table class="table" id="user_project">
                    <thead>
                        <tr>
                            <th class="col-md-2">
                                <div class="select-wrapper">
                                <select id="time_select" onchange="get_query()">
                                    <option value="-1">时间</option>
                                    <option value="201507000000">2015年07月</option>
                                    <option value="201508000000">2015年08月</option>
                                    <option value="201509000000">2015年09月</option>
                                    <option value="201510000000">2015年10月</option>
                                    <option value="201511000000">2015年11月</option>
                                    <option value="201512000000">2015年12月</option>
                                    <option value="201601000000">2016年01月</option>
                                    <option value="201602000000">2016年02月</option>
                                    <option value="201603000000">2016年03月</option>
                                    <option value="201604000000">2016年04月</option>
                                </select></div>
                            </th>
                            <th class="col-md-2">
                                <div class="select-wrapper">
                                <select id="station_select" onchange="get_query()">
                                    <option value="-1">观测站</option>
                                    <option value="1">奉贤</option>
                                    <option value="2">闵行</option>
                                    <option value="3">宝山</option>
                                    <option value="4">嘉定</option>
                                    <option value="5">崇明</option>
                                    <option value="6">徐家汇</option>
                                    <option value="7">南汇</option>
                                    <option value="8">浦东</option>
                                    <option value="9">金山</option>
                                    <option value="10">青浦</option>
                                    <option value="11">松江</option>
                                </select>
                            </div>
                            </th>
                            <th class="col-md-2">气温</th>
                            <th class="col-md-2">雨量</th>
                            <th class="col-md-2">风向</th>
                            <th class="col-md-2">风速</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php foreach ($bigdata as $row) {
                                ?>
                                <tr>
                                    <td><?= date('Y-m-d H:i',strtotime($row['time']));?></td>
                                    <td><?= $row['station_name']; ?></td>
                                    <td><?= $row['temperature']; ?></td>
                                    <td><?= $row['rainfall'];?></td>
                                    <td><?= $row['wind_direction']; ?></td>
                                    <td><?= $row['wind_speed'];?></td>
                                </tr>
                                <?php }?>
                        </tbody>
                </table></section></div>
</div>
<footer id="footer">
                         <section class="copyright">
                            <h3>站外数据连接:</h3>
                                        <a href="http://www.datashanghai.gov.cn/">上海市政府数据服务网</a>
<a href="http://city.opendatachina.com/shanghai/index.html">上海开放数据观察</a>
<a href="http://www.gz121.gov.cn/">广州市气象局</a>
<a href="http://data.cma.cn/">中国气象数据网</a>
<a href="http://www.cnsda.org/index.php">中国国家调查数据库CNSDA</a>
<a href="http://tongji.cnki.net/kns55/addvalue/indexlist.aspx?sicode=Z006">国土资源---统计指标收录列表</a>
<a href="http://www.stats.gov.cn/tjsj/">中华人民共和国国家统计局</a>
                        </section>
                    </footer>
</body>
</html>
<script type="text/javascript">
/*筛选按钮触发事件*/
function get_query(){
     $
        .ajax({
            type : "post",
            async : false,
            dataType : "json", //收受数据格式
            data:{'time_select':$("#time_select").val(),
                'station_select':$("#station_select").val()},
            url : "<?= site_url("bigdata/get_query/") ?>",
            cache : false,
            success : function(data) {
                var addHtml="";
                for(var i=0;i<(data.length);i++){
                    //处理表格信息
                    addHtml=addHtml+"<tr>";
                    addHtml=addHtml+"<td>"+data[i].time+"</td>";
                    addHtml=addHtml+"<td>"+data[i].station_name+"</td>";
                    addHtml=addHtml+"<td>"+data[i].temperature+"</td>";
                    addHtml=addHtml+"<td>"+data[i].rainfall+"</td>";
                    addHtml=addHtml+"<td>"+data[i].wind_direction+"</td>";
                    addHtml=addHtml+"<td>"+data[i].wind_speed+"</td>";
                    addHtml=addHtml+"</tr>";
                }   
                $("#tbody").empty().append(addHtml).trigger("create");              
            }
        });
}
</script>
