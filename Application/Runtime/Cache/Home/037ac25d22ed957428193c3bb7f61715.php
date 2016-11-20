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
        <title>关于</title>
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
                    <li>
                        <a href="/safelabbill/index.php/Home/Mybill/index">我的账单</a>
                    </li>
                    <li class="active">
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
                                    系统来历
                                </h3>
                            </div>
                            <div class="panel-body">
                                <p>
                                    <em>我们该有自己的系统。</em> 
                                    实验室的兄弟们有个不好的习惯，说起来，某个系统很简单，很简单，需求也的确很明确，但是真正做的时候，总是推三阻四，你也不想写，我也不想写。
                                    写这个项目有两个目的:
                                <hr>
                                <ol>
                                    <li>算是自己练手，学习一下 thinkphp</li>
                                    <li>将来自己走了，给实验室留一些学习项目。计算机这东西需要人带，没人带，简直寸步难行，全靠自己摸索，苦啊。希望后来人又条顺利的路走，一路走下去，把实验室实干精神发扬光大！</li>
                                </ol>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>




            </div>  <!--end container-->
            </body>
            </html>