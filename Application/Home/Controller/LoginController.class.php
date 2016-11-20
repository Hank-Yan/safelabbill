<?php

namespace Home\Controller;

use Think\Controller;
use Think\Verify;

class LoginController extends Controller {

    public function login() {
        $this->display();
    }

    public function do_login() {

        $username = I('username');
        $password = I('password');

       
        if (session('checkma') == true) {
             session('checkma', null);
             $m = M('User');
             $where['username'] = $username;
             $where['password'] = $password;
//             $count = $m->where($where)->count();
             $arr = $m->field('id')->where($where)->find();//查找结果是一个数组，我们可以拿着这个数组判断是否有信息。同时可以拿到各种信息，更好的判断方法。
             if($arr>0){
                 session('username',$username);
                 session('id',$arr['id']);
                 $this->success('用户登录成功',U('Index/index'));
             }else{
                 $this->error('用户不存在');
             }
              
        } else {
            $this->error('验证码错误', U('Home/Login/login'), 3);
        }
    }
    
    public function do_logout(){
        session('username',null);
        $this->redirect('Index/index');
    }
    
     public function check_ma() {
        $ma = I('verify_ma');
//      $this->checkma_value = $ma;

        $verify = new Verify();
        if ($verify->check($ma)) {
//            $this->checkma = true;
            session('checkma', true);
            echo '0'; //验证码正确
        } else {
//            $this->checkma = false;
            echo '1'; //验证码错误
        }
    }
    
    public function demo(){
        $this->display();
    }
    

}
