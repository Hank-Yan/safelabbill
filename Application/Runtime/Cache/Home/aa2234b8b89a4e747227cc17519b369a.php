<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>我的账单</title>
    <link rel="stylesheet" type="text/css" href="/safelabbill/Public/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/safelabbill/Public/Css/base.css" />
    <script type="text/javascript" src="/safelabbill/Public/Js/jquery.js"></script>
    <script type="text/javascript" src="/safelabbill/Public/Js/bootstrap.js"></script>
    <script>
        $(function () {

        });
    </script>
</head>
<body>
    <div class="container">


        <div class="row clearfix">
            <div class="col-md-12 column">
                <ul class="nav nav-tabs">
                    <li>
                        <a href="/safelabbill/index.php/Home/Index/index">首页</a>
                    </li>
                    <li class="active">
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




                <div class="row clearfix">
                    <div class="col-md-12 column">

                        <div class="panel panel-default panel-to-top">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    我的账单
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
                                            <td><span style="color:red">您还没有审核通过的账单哦~</span></td>
                                        </tr>
                                        <?php else: ?>
                                        <?php if(is_array($list)): foreach($list as $k=>$vo): ?><tr>
                                                <td><?php echo ($k+1); ?></td>
                                                <td><?php echo ($vo["info"]); ?></td>
                                                <td><?php echo ($vo["count"]); ?></td>
                                            </tr><?php endforeach; endif; endif; ?>
                                    </tbody>
                                </table>

                                <!--下面是分页控件位置信息，可以放在左面，右面和中间。学习一下-->
                                <div style="text-align: right">
                                    <ul class="pagination">
                                        <?php echo ($page); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>  <!--end container-->
            <script>
//                function edit(id){
//                //alert(id);
//                window.location.href = "/safelabbill/index.php/Home/Mybill/edit?id=" + id;
//                }
//
//                function deleteItem(id){
//
//                if (confirm("确定删除吗？")){
//                window.location.href = "/safelabbill/index.php/Home/Mybill/delete?id=" + id; //用js 进行跳转操作,也可以使用ajax
//                //注意，使用 ajax 的时候，根据返回回来的值，进行window.location.reload();操作来刷新页面
//                }

//                    alert(id);
//                    alert("确定要删除吗？？？");
//                    $.post('/safelabbill/index.php/Home/Mybill/delete', {'id': id}//这里我们没必要使用ajax, 完全可以使用连接来进行
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
//                }
            </script>
            </body>
            </html>