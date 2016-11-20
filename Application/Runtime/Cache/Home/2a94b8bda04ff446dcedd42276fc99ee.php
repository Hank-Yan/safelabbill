<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>首页</title>
    <link rel="stylesheet" type="text/css" href="/safelabbill/Public/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/safelabbill/Public/Css/base.css" />
    <link rel="stylesheet" type="text/css" href="/safelabbill/Public/Css/daterangepicker-bs3.css" />

    <script type="text/javascript" src="/safelabbill/Public/Js/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="/safelabbill/Public/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/safelabbill/Public/Js/moment.js"></script>
    <script type="text/javascript" src="/safelabbill/Public/Js/daterangepicker.js"></script>


</head>
<body>
    <div class="container">
        <!--        <h1>欢迎你:<?php echo (session('username')); ?> <a href="/safelabbill/index.php/Home/Login/do_logout" target="_top">退出</a></h1>
                <hr>
        
        
              
        
                <div class="panel panel-info">
                    <div class="panel-heading">报账</div>
                    <div class="panel-body">
                        <form role="form" action="/safelabbill/index.php/Home/Index/saveBill" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="billInfo">账单信息</label>
        
                                    <div class="input-group form-control">
                                        <input type="text" id="count" name="count" class="form-control">
                                        <span class="input-group-addon">.00</span>
                                    </div>
        
                                    <div class="input-group form-control">
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                        <input type="text" id="billinfo" name="billinfo" class="form-control">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit">提交!</button>
                                        </span>
                                    </div>
                                </div>
        
                            </div>
                        </form>
                    </div>
                </div>   end panel   
        
                下面是所有人的账单列表
                <div class="panel panel-danger">
                    <div class="panel-heading">实验室账单列表</div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <tr>
                                <th>姓名</th>
                                <th>报账原因</th>
                                <th>金额</th>
                            </tr>
        
                            <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                                    <td><?php echo ($vo["username"]); ?></td>
                                    <td><?php echo ($vo["info"]); ?></td>
                                    <td><?php echo ($vo["count"]); ?></td>
                                </tr><?php endforeach; endif; ?>
                        </table>
                    </div>
                </div> end panel-->


        <div class="row clearfix">
            <div class="col-md-12 column">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="/safelabbill/index.php/Home/Index/index">首页</a>
                    </li>
                    <li>
                        <a href="/safelabbill/index.php/Home/Mybill/index">我的账单</a>
                    </li>
                    <li>
                        <a href="/safelabbill/index.php/Home/Aboutme/index">关于</a>
                    </li>
                    <li class="dropdown pull-right">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">欢迎：<?php echo (session('username')); ?> <strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">个人中心</a>
                            </li>

                            <li class="divider">
                            </li>
                            <li>
                                <a href="/safelabbill/index.php/Home/Login/do_logout" target="_top">退出</a>
                            </li>
                        </ul>
                    </li>
                </ul>




                <div class="panel panel-default panel-to-top">
                    <div class="panel-heading">快速添加</div>
                    <div class="panel-body">
                        <form role="form" class="form-inline" action="/safelabbill/index.php/Home/Index/saveBill" method="post">
                            <div class="form-group">
                                <label class="sr-only" for="count">金额￥</label>
                                <input type="text" id="count" name="count" class="form-control" placeholder="金额￥">
                            </div>


                            <div class="form-group">
                                <label class="sr-only" for="count">明细</label>
                                <input type="text" id="billinfo" name="billinfo" class="form-control" placeholder="明细">
                            </div>

                            <div class="form-group">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar" id="dataIcon" name="dataIcon"></i>
                                <input type="text" style="width: 200px" name="data" id="data" class="form-control" />
                            </div>


                            <button class="btn btn-default" type="submit" >提交!</button>
                        </form>
                    </div>
                </div>    






                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            未通过审核账单列表
                        </h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>编号</th>
                                            <th>报账明细</th>
                                            <th>金额</th>
                                            <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                  <?php if($isEmpty == true): ?><tr>
                                            <td>您没有未审核通过的记录账单哦~</td>
                                        </tr>
                                    <?php else: ?>
                            <?php if(is_array($list)): foreach($list as $k=>$vo): ?><tr>
                                    <td><?php echo ($k+1); ?></td>
                                    <!--<td><?php echo ($vo["username"]); ?></td>-->
                                    <td><?php echo ($vo["info"]); ?></td>
                                    <td><?php echo ($vo["count"]); ?></td>
                                    <td><a class="a-cursor" onclick="edit( <?php echo ($vo["id"]); ?> )">编辑</a>&nbsp;<a class="a-cursor" onclick="deleteItem( <?php echo ($vo["id"]); ?> )">| 删除</a></td>
                                </tr><?php endforeach; endif; endif; ?>
                            </tbody>
                        </table>


                        <!--pagination-right 这个CSS 在BT3.0 不能用了啊， FUCK,我们可以使用块级元素辅助，达到位置改变的效果-->
                        <div style="text-align: right">
                            <ul class="pagination">
                                <?php echo ($page); ?>
                            </ul>
                        </div>
                        <!--下面是分页控件位置信息，可以放在左面，右面和中间。学习一下-->
                        <!--                        <nav style="text-align: right">
                                                    <ul class="pagination pagination-right">
                                                        <li>
                                                            <a href="#">Prev</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">1</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">2</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">3</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">4</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">5</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Next</a>
                                                        </li>
                                                    </ul>
                                                </nav>-->

                    </div>
                </div>
            </div>
        </div>

    </div>  <!--end container-->
    <script>
        $(document).ready(function () {
        var currentTime = getCurrentTime();
        $('#data').val(currentTime);
        $('#data').daterangepicker({
        format: 'YYYY-MM-DD',
                singleDatePicker: true,
                todayBtn: true,
        },
                function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                });
        });
        function getCurrentTime() {
        var date = new Date();
        var seperator = "/";
        var year = date.getFullYear();
        var month = date.getMonth() + 1;
        var strDate = date.getDate();
        if (month >= 1 && month <= 9) {
        month = "0" + month;
        }
        if (strDate >= 0 && strDate <= 9) {
        strDate = "0" + strDate;
        }
        var currentdata = year + seperator + month + seperator + strDate;
        return currentdata;
        }

        $("#dataIcon").click(function(){
        $('#data').daterangepicker('show');
        });
    </script>

    <script>
        function edit(id){
        //alert(id);
        window.location.href = "/safelabbill/index.php/Home/Index/edit?id=" + id;
        }

        function deleteItem(id){

        if (confirm("确定删除吗？")){
        window.location.href = "/safelabbill/index.php/Home/Index/delete?id=" + id; //用js 进行跳转操作,也可以使用ajax
        //注意，使用 ajax 的时候，根据返回回来的值，进行window.location.reload();操作来刷新页面
        }

//                    alert(id);
//                    alert("确定要删除吗？？？");
//                    $.post('/safelabbill/index.php/Home/Index/delete', {'id': id}//这里我们没必要使用ajax, 完全可以使用连接来进行
//                    function (data) {
//                        var myjson='';
//                        eval("myjson=" + data + ";");//现在 myjson 就相当于data
//                        
//                        if(myjson == 0){
//                            
//                        }else{

//                        }
//                    }
//                     );
        }
    </script>
</body>
</html>