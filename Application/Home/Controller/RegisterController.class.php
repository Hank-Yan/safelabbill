<?php

namespace Home\Controller;

use Think\Controller;
use Think\Verify;

class RegisterController extends Controller {

//    private $checkma = false; //后台验证
//    private static $checkusername = false; //后台验证，如果禁掉了JS，则不能注册
//    这样写，可能是因为自己实例化了多次，不太好，最终使用session 来解决这个问题。

    public function register() {
        $this->display();
    }

    //检查用户是否已经存在
    public function checkname() {
        $username = I('username');
        $m = M('User');
        $where['username'] = $username;
        $count = $m->where($where)->count();
        if ($count) {
            echo '0'; //用户已经存在
        } else {
            echo '1'; //用户不存在可以注册
        }
    }

    //注册数据写入
    public function do_register() {
        
//        $username = I('username');
//        $password = I('password');
//        $password1 = I('password1');
//
//        $m = M('User');
//        dump($m);
//        exit;
//        $sex = I('sex');
//        if (session('checkma')==true) {
//            session('checkma', null);
//            
//            $m = M('User');
//
//            $where['username'] = $username;
//            $count = $m->where($where)->count();
//            if ($count) {
//                //用户已经存在
//                $this->error('用户已经存在');
//            } else {
//                //用户不存在可以注册
//                $data['username'] = $username;
//                $data['password'] = $password;
//                $data['sex'] = $sex;
//                $lastId = $m->add($data);
//                if ($lastId) {
//                    $this->success('注册成功,请重新登录', U('Index/index'));
//                } else {
//                    $this->error('用户注册失败');
//                }
//               
//            }
//        } else {
//            $this->error('验证码错误', U('Register/register'), 3);
//        }
        
        $m = D('User');//$m 自身是一个对象
       //create返回的是一个array.
        if(!$m->create()){
            $this->error($m->getError());
        }
        $lastId = $m->add();//返回是刚刚那个插入数据的 ID 
        if($lastId){
            $this->success('注册成功,请重新登录', U('Index/index'));
        }else{
            $this->error('用户注册失败');
        }
    }

    //ajax 检验验证码,如果用户绕过了JS，直接想不通过验证码就注册那是不可能的，因为checkma一直处于false状态的话，无法进一步注册
    public function check_ma() {
        $ma = I('verify_ma');
        $verify = new Verify();
        if ($verify->check($ma)) {
            echo '0'; //验证码正确
        } else {
            echo '1'; //验证码错误
        }
    }
    
    public function test(){
//        $username = I('username');
        echo '0';
        
    }

}
