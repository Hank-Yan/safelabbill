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
</head>
<body>
    <div class="container">


        <div class="row clearfix">
            <div class="col-md-12 column">
                <ul class="nav nav-tabs">
                    <li>
                        <a href="/safelabbill/index.php/Home/Index/index">首页</a>
                    </li>
                    <li class="">
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



                <div class="col-md-8 form-to-top">
                    <form action="/safelabbill/index.php/Home/Index/saveChange" method="post" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="count" class="col-sm-2 control-label">金额￥</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="count" name="count" value="<?php echo ($count); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="info" class="col-sm-2 control-label">账单明细</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="info" name="info" value="<?php echo ($info); ?>"/>
                            </div>
                        </div>
                        <input type="hidden" id="billid" name ="billid" value="<?php echo ($id); ?>">
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary btn-sm">保存</button>
                                <a class="btn btn-default btn-sm" href="/safelabbill/index.php/Home/Index/index">返回</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>  <!--end container-->
</body>
</html>