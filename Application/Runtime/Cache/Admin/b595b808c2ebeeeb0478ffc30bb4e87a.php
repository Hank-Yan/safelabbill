<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>后台管理</title>
        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="/safelabbill/Public/CSS/bootstrap.css" />
        <link rel="stylesheet" href="/safelabbill/Public/CSS/font-awesome.css" />
        <!-- ace styles -->
        <link rel="stylesheet" href="/safelabbill/Public/CSS/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

        <!--必须的，jQuery用的,版本要大于 1.9-->
        <script type="text/javascript">
            window.jQuery || document.write("<script src='/safelabbill/Public/JS/jquery-1.12.3.min.js'>" + "<" + "/script>");
        </script>
        <script src="/safelabbill/Public/JS/bootstrap.js"></script>
        <script src="/safelabbill/Public/JS/ace/ace.js"></script>
        <script src="/safelabbill/Public/JS/ace/ace.sidebar.js"></script>
        <style>
            .page-content{
                padding: 0;
            }
        </style>
    </head>
    <body class="no-skin">

        <!-- #section:basics/navbar.layout -->
        <div id="navbar" class="navbar navbar-default">
            <div class="navbar-container" id="navbar-container">

                <!-- /section:basics/sidebar.mobile.toggle -->
                <div class="navbar-header pull-left">
                    <!-- #section:basics/navbar.layout.brand -->
                    <a href="/safelabbill/index.php/Admin/Index/index" class="navbar-brand">
                        <small>
                            <i class="fa fa-leaf"></i>
                            后台管理
                        </small>
                    </a>

                </div>

                <!-- #section:basics/navbar.dropdown -->
                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        <li class="light-blue">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <img class="nav-user-photo" src="/safelabbill/Public/images/user.png" alt="Jason's Photo" />
                                <span class="user-info">
                                    <small>Welcome,</small>
                                     <?php echo (session('AdminName')); ?>
                                </span>

                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>
                                    <a href="#">
                                        <i class="ace-icon fa fa-cog"></i>
                                        Settings
                                    </a>
                                </li>

                                <li>
                                    <a href="profile.html">
                                        <i class="ace-icon fa fa-user"></i>
                                        Profile
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="/safelabbill/index.php/Admin/Index/logout">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div><!-- /.navbar-container -->
        </div>
        <!-- /section:basics/navbar.layout -->


        <div class="main-container" id="main-container">

            <!-- #section:basics/sidebar -->
            <div id="sidebar" class="sidebar responsive">
                <ul class="nav nav-list">
                    <li class="">
                        <a href="index.html">
                            <i class="menu-icon fa fa-tachometer"></i>
                            <span class="menu-text"> 欢迎页面 </span>
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <?php if(is_array($auth_info_parent)): foreach($auth_info_parent as $k=>$vop): if($vop['hasChild'] != true): ?><li class="">
                                <a href="/safelabbill/index.php/Admin/<?php echo ($vop['auth_c']); ?>/<?php echo ($vop['auth_a']); ?>" target="right">
                                    <i class="menu-icon fa  <?php echo ($vop['icon']); ?>"></i>
                                    <span class="menu-text"> <?php echo ($vop['auth_name']); ?> </span>
                                </a>
                                <b class="arrow"></b>
                            </li>
                            <?php else: ?>
                            <li class="">
                                <a href="/safelabbill/index.php/Admin/<?php echo ($vop['auth_c']); ?>/<?php echo ($vop['auth_a']); ?>" class="dropdown-toggle">
                                    <i class="menu-icon fa  <?php echo ($vop['icon']); ?>"></i>
                                    <span class="menu-text"><?php echo ($vop['auth_name']); ?>  </span>
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>

                                <ul class="submenu">
                                    <?php if(is_array($auth_info_child)): foreach($auth_info_child as $kk=>$voc): if($voc['auth_pid'] == $vop['auth_id']): ?><li class="">
                                                <a href="/safelabbill/index.php/Admin/<?php echo ($voc['auth_c']); ?>/<?php echo ($voc['auth_a']); ?>" target="right">
                                                    <i class="menu-icon fa fa-caret-right"></i>
                                                    <?php echo ($voc['auth_name']); ?>
                                                </a>
                                                <b class="arrow"></b>
                                            </li><?php endif; endforeach; endif; ?>
                                </ul>                        
                            </li><?php endif; endforeach; endif; ?>
                    <!--                    <li class="">
                                            <a href="#" class="dropdown-toggle">
                                                <i class="menu-icon fa fa-users"></i>
                                                <span class="menu-text"> 权限管理 </span>
                    
                                                <b class="arrow fa fa-angle-down"></b>
                                            </a>
                    
                                            <b class="arrow"></b>
                    
                                            <ul class="submenu">
                                                <li class="">
                                                    <a href="tables.html">
                                                        <i class="menu-icon fa fa-caret-right"></i>
                                                        用户列表
                                                    </a>
                    
                                                    <b class="arrow"></b>
                                                </li>
                    
                                                <li class="">
                                                    <a href="jqgrid.html">
                                                        <i class="menu-icon fa fa-caret-right"></i>
                                                        角色管理
                                                    </a>
                    
                                                    <b class="arrow"></b>
                                                </li>
                    
                                                <li class="">
                                                    <a href="jqgrid.html">
                                                        <i class="menu-icon fa fa-caret-right"></i>
                                                        权限管理
                                                    </a>
                    
                                                    <b class="arrow"></b>
                                                </li>
                    
                                            </ul>
                                        </li>-->

                </ul><!-- /.nav-list -->


            </div>
            <!-- /section:basics/sidebar -->


            <div class="main-content">
                <div class="main-content-inner">
                    <!-- #section:basics/content.breadcrumbs -->
                    <div class="breadcrumbs" id="breadcrumbs">

                        <ul class="breadcrumb">
                            <li  class="active">
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="">Home</a>
                            </li>
                        </ul> 
                    </div>

                    <!-- /section:basics/content.breadcrumbs -->
                    <div class="page-content" id="content" style="height: 500px;">
                        <iframe src="/safelabbill/index.php/Admin/Index/main" style="width:100%;height: 100%;" frameborder="0" name="right" id="iframepage" class="appiframe" ></iframe>
                    </div>
                </div>
            </div><!-- /.main-content -->

            
<div class="footer">
    <div class="footer-inner">
        <!-- #section:basics/footer -->
        <div class="footer-content">
            <span class="blue bolder">账单管理系统</span>
            &nbsp;&nbsp;&nbsp;&nbsp;嵌入式实验室 &copy; 2015-2016
        </div>
        <!-- /section:basics/footer -->
    </div>
</div>



        </div><!-- /.main-container -->

    </body>
</html>