<?php
namespace Home\Common;
use Think\Controller;

class CommonController extends Controller{
    //判断是否登录，需要登录的模块都继承这个controller
    public function _initialize(){
        if(!isset($_SESSION['username'])||$_SESSION['username']==''){
            $this->redirect('Login/login');
        }
    }
}

