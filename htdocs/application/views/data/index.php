<!-- 数据下载内容
<div class="content">
    <div class="wrap">
        <div class="data-con-top">
            <h1>气象大数据开放共享</h1>
        </div>
        <div class="data-box">
            <div class="data-box-top">
                <h3>数据由上海气象局提供</h3>
                <a href="<?=site_url('data/download')?>" class="btn-blue-sml fr" target="_blank">数据下载</a>
            </div>
            <div class="data-box-table">
                <table>
                    <tr>
                        <th width="25%">
                            <div class="my-select time">
                                <div class="my-value" style="width:150px;">
                                <select id="time" onchange="get_query(1)">
                                    <option value="-1">观测时间</option>
                                    <option value="201507010000">2015年07月</option>
                                    <option value="201508010000">2015年08月</option>
                                    <option value="201509010000">2015年09月</option>
                                    <option value="201510010000">2015年10月</option>
                                    <option value="201511010000">2015年11月</option>
                                    <option value="201512010000">2015年12月</option>
                                    <option value="201601010000">2016年01月</option>
                                    <option value="201602010000">2016年02月</option>
                                    <option value="201603010000">2016年03月</option>
                                    <option value="201604010000">2016年04月</option>
                                </select>
                                <input type="hidden" name="timeId">
                            </div>
                        </th>
                        <th width="15%">
                            <div class="my-select place">
                                <div class="my-value" style="width:100px;">
                                    <select id="station" onchange="get_query(1)">
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
                                <input type="hidden" name="placeId">
                            </div>
                        </th>
                        <th width="15%">气温</th>
                        <th width="15%">雨量</th>
                        <th width="15%">风向</th>
                        <th width="15%">风速</th>
                    </tr>
                    <tbody id="dataBody">
                    <?php for($i=0;$i<count($data);$i++):?>
                        <?php if($i%2==1):?>
                        <tr class="odd">
                        <?php endif;?>
                        <?php if($i%2!=1):?>
                        <tr class="even">
                        <?php endif;?>
                            <td><?= $data[$i]['time']?></td>
                            <td><?= $data[$i]['station_name']?></td>
                            <td><?= $data[$i]['temperature']?></td>
                            <td><?= $data[$i]['rainfall']?></td>
                            <td><?= $data[$i]['wind_direction']?></td>
                            <td><?= $data[$i]['wind_speed']?></td>
                        </tr>
                    <?php endfor;?>
                    </tbody>
                </table>
            </div>
            <div class="data-box-page">
                <a onclick="pre_query()" style="cursor: pointer;">上一页</a>
                <a onclick="next_query()" style="cursor: pointer;">下一页</a>
                <span id="current">1</span><span>/</span><span><?= $page_num?>页</span>
                <span>跳到第<input type="text" name="pageNum" id="pageNum" onchange="get_query_by_page()">页</span>
                <span id="error" style="color: red"></span>
            </div>
            <script type="text/javascript">
                var current_page=1;
                function pre_query(){
                    if(current_page!=1){
                        current_page=current_page-1;
                        get_query(current_page);
                    }
                }
                function next_query(){
                    if(current_page!=<?=$page_num?>){
                        current_page=current_page+1;
                        get_query(current_page);
                    }
                }
                function get_query_by_page(){
                    var page=$("#pageNum").val();
                    var reg=/^[1-9]\d*$/;
                    if(!reg.test(page)){
                        $("#error").empty().append("输入合法页码");
                        page=$("#pageNum").val("");
                    }else if(parseInt(page,10)><?= $page_num?>){
                        $("#error").empty().append("输入合法页码");
                        page=$("#pageNum").val("");
                    }else{
                        current_page=parseInt(page,10);
                        get_query(page);
                        page=$("#pageNum").val("");
                    }
                }
                function get_query(page) {
                    $("#current").empty().append(page);
                    $("#error").empty();
                    $
                    .ajax({
                        type : "post",
                        async : false,
                        dataType : "json", //收受数据格式
                        data:{'time':$("#time").val(),'station':$("#station").val(),'page':page},
                        url : "<?= site_url("data/get_query/") ?>",
                        cache : false,
                        success : function(data) {
                            var addHtml="";
                            for(var i=0;i<data.length;i++){
                                if(i%2==1){
                                    addHtml=addHtml+"<tr class=\"odd\">";
                                }else{
                                    addHtml=addHtml+"<tr class=\"even\">";
                                }
                                addHtml=addHtml+"<td>"+data[i]['time']+"</td>";
                                addHtml=addHtml+"<td>"+data[i]['station_name']+"</td>";
                                addHtml=addHtml+"<td>"+data[i]['temperature']+"</td>";
                                addHtml=addHtml+"<td>"+data[i]['rainfall']+"</td>";
                                addHtml=addHtml+"<td>"+data[i]['wind_direction']+"</td>";
                                addHtml=addHtml+"<td>"+data[i]['wind_speed']+"</td>";
                                addHtml=addHtml+"</tr>";
                            }
                            $("#dataBody").empty().append(addHtml);
                        }
                    });
                }
            </script>
        </div>
    </div>
</div> -->
<!-- 数据下载内容 -->
<div class="content">
    <div class="wrap">
        <div class="data-con-top">
            <h1>气象大数据开放共享</h1>
        </div>
        <div class="data-box">
            <div class="data-box-top">
                <h3>SMDA大赛专用气象数据</h3>
                <a href="<?=site_url('data/download')?>" class="btn-blue-sml fr">数据下载</a>
            </div>
            <div class="data-box-middle clearfix">
                <div class="data-box-middle-left">
                    <span class="label-box"></span>
                </div>
                <div class="data-box-middle-middle">
                    <h5>数据来源</h5>
                    <p>上海市气象局</p>
                </div>
                <div class="data-box-middle-right">
                    <h5>时间段</h5>
                    <p>2015.07-2016.04</p>
                </div>
            </div>
            <div class="data-box-bottom">
                <h5>具体数据项</h5>
                <p>全市11个气象观测站所记录气温、雨量、风向、风速等数据</p>
            </div>
<div class="data-box-table">
                <table>
                    <tr>
                        <th width="25%">
                            <div class="my-select time">
                                <div class="my-value" style="width:150px;">
                                <select id="time" onchange="get_query(1)" style="height: 38px;width: 100%;font-size: 14px;font-family: 'Microsoft Yahei', Simsun;">
                                    <option value="-1">观测时间</option>
                                    <option value="201507010000">2015年07月</option>
                                    <option value="201508010000">2015年08月</option>
                                    <option value="201509010000">2015年09月</option>
                                    <option value="201510010000">2015年10月</option>
                                    <option value="201511010000">2015年11月</option>
                                    <option value="201512010000">2015年12月</option>
                                    <option value="201601010000">2016年01月</option>
                                    <option value="201602010000">2016年02月</option>
                                    <option value="201603010000">2016年03月</option>
                                    <option value="201604010000">2016年04月</option>
                                </select>
                                <input type="hidden" name="timeId">
                            </div>
                        </th>
                        <th width="15%">
                            <div class="my-select place">
                                <div class="my-value" style="width:100px;">
                                    <select id="station" onchange="get_query(1)" style="height: 38px;width: 100%;font-size: 14px;font-family: 'Microsoft Yahei', Simsun;">
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
                                <input type="hidden" name="placeId">
                            </div>
                        </th>
                        <th width="15%">气温</th>
                        <th width="15%">雨量</th>
                        <th width="15%">风向</th>
                        <th width="15%">风速</th>
                    </tr>
                    <tbody id="dataBody">
                    <?php for($i=0;$i<count($data);$i++):?>
                        <?php if($i%2==1):?>
                        <tr class="odd">
                        <?php endif;?>
                        <?php if($i%2!=1):?>
                        <tr class="even">
                        <?php endif;?>
                            <td><?= $data[$i]['time']?></td>
                            <td><?= $data[$i]['station_name']?></td>
                            <td><?= $data[$i]['temperature']?></td>
                            <td><?= $data[$i]['rainfall']?></td>
                            <td><?= $data[$i]['wind_direction']?></td>
                            <td><?= $data[$i]['wind_speed']?></td>
                        </tr>
                    <?php endfor;?>
                    </tbody>
                </table>
            </div>
            <div class="data-box-page">
                <a onclick="pre_query()" style="cursor: pointer;">上一页</a>
                <a onclick="next_query()" style="cursor: pointer;">下一页</a>
                <span id="current">1</span><span>/</span><span><?= $page_num?>页</span>
                <span>跳到第<input type="text" name="pageNum" id="pageNum" onchange="get_query_by_page()">页</span>
                <span id="error" style="color: red"></span>
            </div>
<!--             <div class="data-box-page">
    <a href="#">上一页</a>
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#">3</a>
    <a href="#">4</a>
    <a href="#">5</a>
    <span>...</span>
    <a href="#">下一页</a>
    <span>共10页</span>
    <span>跳到第<input type="text" name="pageNum">页</span>
</div> -->
        </div>
        <div class="data-con-foot">
            <div class="data-box-top">
                <h3>其他开放数据</h3>
            </div>
            <div class="data-box-middle clearfix">
                <div class="data-box-middle-left">
                    <span class="label-box"></span>
                </div>
                <div class="data-box-middle-middle">
                    <h5>数据来源</h5>
                    <p>各大数据开放平台</p>
                </div>
                <div class="data-box-middle-right">
                    <h5>数据使用说明</h5>
                    <p>可根据各网站使用规定自行下载</p>
                </div>
            </div>
            <div class="data-box-bottom-null">
            </div>
            <div class="data-con-foot-linkpic">
                <div class="linkpic">
                    <span><img src="../../../images/data1.png"></span>
                    <span><img src="../../../images/data1.png"></span>
                    <span><img src="../../../images/data1.png"></span>
                </div>
                <div class="linkpic">
                    <span><img src="../../../images/data1.png"></span>
                    <span><img src="../../../images/data1.png"></span>
                    <span><img src="../../../images/data1.png"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
                var current_page=1;
                function pre_query(){
                    if(current_page!=1){
                        current_page=current_page-1;
                        get_query(current_page);
                    }
                }
                function next_query(){
                    if(current_page!=<?=$page_num?>){
                        current_page=current_page+1;
                        get_query(current_page);
                    }
                }
                function get_query_by_page(){
                    var page=$("#pageNum").val();
                    var reg=/^[1-9]\d*$/;
                    if(!reg.test(page)){
                        $("#error").empty().append("输入合法页码");
                        page=$("#pageNum").val("");
                    }else if(parseInt(page,10)><?= $page_num?>){
                        $("#error").empty().append("输入合法页码");
                        page=$("#pageNum").val("");
                    }else{
                        current_page=parseInt(page,10);
                        get_query(page);
                        page=$("#pageNum").val("");
                    }
                }
                function get_query(page) {
                    $("#current").empty().append(page);
                    $("#error").empty();
                    $
                    .ajax({
                        type : "post",
                        async : false,
                        dataType : "json", //收受数据格式
                        data:{'time':$("#time").val(),'station':$("#station").val(),'page':page},
                        url : "<?= site_url("data/get_query/") ?>",
                        cache : false,
                        success : function(data) {
                            var addHtml="";
                            for(var i=0;i<data.length;i++){
                                if(i%2==1){
                                    addHtml=addHtml+"<tr class=\"odd\">";
                                }else{
                                    addHtml=addHtml+"<tr class=\"even\">";
                                }
                                addHtml=addHtml+"<td>"+data[i]['time']+"</td>";
                                addHtml=addHtml+"<td>"+data[i]['station_name']+"</td>";
                                addHtml=addHtml+"<td>"+data[i]['temperature']+"</td>";
                                addHtml=addHtml+"<td>"+data[i]['rainfall']+"</td>";
                                addHtml=addHtml+"<td>"+data[i]['wind_direction']+"</td>";
                                addHtml=addHtml+"<td>"+data[i]['wind_speed']+"</td>";
                                addHtml=addHtml+"</tr>";
                            }
                            $("#dataBody").empty().append(addHtml);
                        }
                    });
                }
            </script>