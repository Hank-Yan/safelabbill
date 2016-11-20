<?php

namespace Admin\Controller;

use Think\Controller;
use Admin\Model; //空间引入(重点), 引入之后，使用限定空间方式。 限定空间是用最后一级名字作为限定名称

class IndexController extends Controller {

    public function index() {

        //1 根据管理员id 获取本身记录信息
        $admin_id = session("AdminId");
        $admin_name = session("AdminName");//超级管理员的话，没有任何限制，直接显示出来
        $manager_info = D('User')->find($admin_id);
        $role_id = $manager_info['role_id'];

        //2 获取role 本身信息
        $role_info = D('Role')->find($role_id);
        $auth_ids = $role_info['role_auth_ids'];

        //3 根据 $auth_ids 获取具体权限
//        $auth_info = D('Auth')->select($auth_ids);//thinkphp select 函数可以传递数组或者逗号隔开的字符串
        //4 获取权限的时候,父级和子级的分开，方便前台进行展示
        if($role_id == 0){
            //超级管理员进来的时候直接什么都能看
            $auth_info_parent = D('Auth')->where("auth_level = 0")->select();//父级
            $auth_info_child = D('Auth')->where("auth_level = 1")->select();//子级
        }else{
            //前台展示逻辑时，只有当子级的pid 跟父级相等的时候才显示
            $auth_info_parent = D('Auth')->where("auth_level = '0' and auth_id in ($auth_ids)")->select(); //注意看这里where 里面条件的写法
            $auth_info_child = D('Auth')->where("auth_level = '1' and auth_id in ($auth_ids)")->select(); //注意看这里where 里面条件的写法
        }
        
        //判断父元素是否含有子元素,主要用于前台下拉框的显示与否
        $childs = array();
        foreach ($auth_info_child as $key => $child) {
            $childs[] = $child["auth_pid"];
        }
        $childs = array_unique($childs); //去重

        foreach ($auth_info_parent as $key => $parent) {
            if (in_array($parent["auth_id"], $childs)) {
                $auth_info_parent[$key]["hasChild"] = true;
            } else {
                $auth_info_parent[$key]["hasChild"] = false;
            }
        }

//        dump($auth_info_parent);
//        dump($auth_info_child);
        $this->assign("auth_info_parent", $auth_info_parent);
        $this->assign("auth_info_child", $auth_info_child);

//        $this->display("Public/left");
        $this->display();
    }

    public function login() {
        //post 非空的情况下是 post 过来的数据
        if (!empty($_POST)) {
            if (check_verify(I('verify_ma'))) {

                //用户名和密码的校验
                //这些跟model 打交道的，最好直接在模型里面做，controller里面只管理逻辑控制
                //用户名和密码的校验
                //命名空间，前面加 \ 的时候，使用的完全限定方式， 前面不加 \ 的时候，使用的是拼接方式，拼接当前namespace
                //下面是在本文件里面使用了空间引入，如果不使用空间引入的话，可以使用完全限定空间方式。即 $manager = new \Admin\Model\UserModel();
                $manager = new Model\UserModel(); //这样直接写会找不到usermodel ，因为命名空间会进行拼接，这样不行
                //在 Admin的 model 里面丰富一个函数，用于校验用户名和密码
                $info = $manager->checkNamePwd(I('username'), I('password'));
                if ($info) {
                    dump($info);
                    //session 持久化 持久化用户名和id
                    session('AdminName', $info['username']); //获取 admin 的 name
                    session('AdminId', $info['id']); //获取id
                    $this->redirect('Index/index'); //登录成功，跳转
                } else {
                    $error = "用户名或密码错误或者没有权限";
                }
            } else {
                $error = "验证码错误";
            }
            $this->assign('errorInfo', $error); //用于前台友好提示错误信息
        }
        $this->display();
    }

    public function logout() {
        session(null);
        $this->redirect("Index/login");
    }
    
    public function main(){
        $this->display();
    }

}
