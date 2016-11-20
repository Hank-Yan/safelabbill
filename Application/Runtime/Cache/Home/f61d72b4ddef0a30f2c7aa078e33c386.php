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
        <title>注册</title>
    <link rel="stylesheet" type="text/css" href="/safelabbill/Public/Css/bootstrap.css" />
    <script type="text/javascript" src="/safelabbill/Public/Js/jquery.js"></script>
    <script type="text/javascript" src="/safelabbill/Public/Js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="/safelabbill/Public/CSS/base.css" />
    <link rel="stylesheet" type="text/css" href="/safelabbill/Public/CSS/chosen.min.css" />
    <script type="text/javascript" src="/safelabbill/Public/Js/chosen.js"></script>
    <script>


        var error = new Array();//新建一个数组，有错误的时候就存起来.这个数组是全局数组要在最外面。
        $(function () {

            $("#test").chosen();
          
            
            
            //ajax 判断用户名是否重复，后台需要另行判断
            $("input[name='username']").blur(function () {
                var username = $(this).val();
                $.get('/safelabbill/index.php/Home/Register/checkname', {'username': username}, function (data) {
                    if (data == '0') {
                        error['username'] = 1; //出现错误
                        $("#umessage").html('该用户已经存在');
                    } else {
                        error['username'] = 0;
                        $("#umessage").html('');
                    }
                });
            });

            //前台判断两次密码是否相同。后台需要另行判断
            $("input[name='password1']").blur(function () {
                var pwd = $("input[name='password']").val();
                var pwd1 = $("input[name='password1']").val();

                if (pwd != pwd1) {
                    error['pwd'] = 1; //出现错误
                    $("#pmessage").html("两次密码不一致");
                } else {
                    error['pwd'] = 0;
                    $("#pmessage").html("");
                }
            });

            //ajax 判断验证码是否正确,后台也需要另行判断
//            $("input[name='verify_ma']").blur(function () {
//                var verify_ma = $(this).val();// 写完 alert一下，确保能取到.
//                if (verify_ma != null && verify_ma != "") {
//                    $.ajax({
//                        type: 'get',
//                        url: '/safelabbill/index.php/Home/Register/check_ma',
//                        data: 'verify_ma=' + verify_ma,
//                        async: false,
//                        success: function (data) {
//                            if (data == '0') {
//                                error['check_ma'] = 0;//验证码正确
//                                $("#mmessage").html("")
//                            } else {
//                                error['check_ma'] = 1;//验证码错误
//                                $("#mmessage").html("验证码错误")
//                                //验证码错误的话，最好刷新验证码当前值
//                                var src = $("#verify_img")[0].src;
//                                //这里$("#verify_img")[0].src 而不是 $("#verify_img").src。是因为src是JS的属性。加个[0]转换为DOM对象，而不用jQuery对象。
//                                $("#verify_img").attr('src', src + '?' + Math.random());
//                            }
//                        }
//                    });
//                }
//            });

            //验证码再次聚焦的时候将原来的错误信息删除
            $("input[name='verify_ma']").focus(function () {
                if (error['check_ma'] == 1) {
                    $(this).val("");
                    $("#mmessage").html("");
                }

            });

            $("input[name='username']").focus(function () {
                if (error['username'] == 1) {
                    $(this).val("");
                    $("#umessage").html("");
                }

            });
          


//            $("button[id='btn_login']").click(function () {
//                alert('aaaa');
//                if (error['username'] == 1) {
//                alert('有错误'+error['username']);
//                    my_snumit = false;
//                }

//                else {
//                    $("form[name='register_form']").submit(); //这是用JS 提交表单的方法
//                }
//            });

//            $("form[name='register_form']").submit(function(){
//                return my_submit;
//                alert('111111');
//            });
        });

        //检测是否该提交
        function checkSubmit() {
//            alert(error['check_ma']);
//          一定要注意 || 号两边的空格。
            if (error['username'] == 1 || error['pwd'] == 1 || error['check_ma'] == 1) {
//                   alert('错误');
                return false;
            } else {
//                   alert('正确');
                return true;
            }
        }
        
        $(function(){
              //重置
            $("#btn_register").click(function () {
                $(".error_p").html("");
            });
        });

        function mychange(){
              //test
           
                  $.get('/safelabbill/index.php/Home/Register/test','', function (data) {
                    if (data == '0') {
                        $("#tmessage").html('hello');
                    } 
                });
          
        }
    </script>
</head>
<body>
    <div class="container">
        <form action="/safelabbill/index.php/Home/Register/do_register" method="post" autocomplete="off" name="register_form" onsubmit="return checkSubmit()">
            <input type="text" style="display:none" />
            <input type="password" style="display:none" />
            <div class="form-group">
                <label for="username">用户名</label>
                <input type="text" autocomplete="off" class="form-control" name="username" id="username" placeholder="Username" required>
                <p class="error_p" id="umessage" style="color:red"></p>
            </div>
            <div class="form-group">
                <label for="password">密码</label>
                <input type="password" autocomplete="off" class="form-control" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="password">确认密码</label>
                <input type="password" autocomplete="off" class="form-control" name="password1" id="password" placeholder="Password" required>
                <p class="error_p" id="pmessage" style="color:red"></p>
            </div>
            <div class="form-group">
                <label for="">性别：</label>
                <label class="radio-inline">
                    <input type="radio" name="sex" id="man" value="1" checked> 男
                </label>
                <label class="radio-inline">
                    <input type="radio" name="sex" id="fem" value="0"> 女
                </label>
            </div>
            <div class="form-group">
                <label for="verify_ma">验证码</label>
                <input type="text" autocomplete="off" class="form-control" name="verify_ma" id="verify_ma" >
                <p class="error_p" id="mmessage" style="color:red"></p>
            </div>
            <div class="form-group"><img id="verify_img" src="/safelabbill/index.php/Home/Public/index?l=3" onclick="this.src = this.src + '?' + Math.random()" ></div> 


            <!--提交的时候直接提交到了数据库中,放外面是为了，在需要的时候再进行表单提交，而不是点击就提交表单-->
            <button  id="btn_login" class="btn btn-default col-xs-3" >提交</button>
            <!--重置按钮可以放在表单外面，点击的时候，不用提交表单 -->
            <button type="reset" id="btn_register"  class="btn btn-default col-xs-offset-6 col-xs-3">重置</button>
        </form>
    </div>
</body>
</html>