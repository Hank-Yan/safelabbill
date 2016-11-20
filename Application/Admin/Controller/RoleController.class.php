<?php

namespace Admin\Controller;

use Think\Controller;

class RoleController extends Controller {

    public function index() {
        $this->display();
    }

    public function showlist() {

        $data = M("Role")->select();

        $this->assign("list", $data);
        $this->display();
    }

    public function distribute() {
        $role = new \Admin\Model\RoleModel;
        if (!empty($_POST)) {
            $roleid = I("roleid");
            $authid = I("auth_id");
            $result = $role->saveAuth($roleid, $authid);
            if ($result) {
                $this->redirect("showlist", array(), 2,"分配权限成功!!!");
//                $this->success("分配权限成功");//这种还是跳转到本页面，不会跳转到首页，我们需要让其跳转到首页
            }else{
//                $this->error("分配权限失败");
                 $this->redirect("showlist", array(), 2,"分配权限失败!!!");
            }
        } else {
            $roleid = I("roleid");
            $roleinfo = $role->find($roleid);

            //查询已经拥有的权限
            $has_auth_ids = $roleinfo["role_auth_ids"];//例如：1,2,3,4，  是一个字符串，字符串里面判断包含不严谨，需要变成数组
            $has_auth_ids = explode(",", $has_auth_ids);// 字符串变为数组，变的更加严谨
            
            
            
            $auth_parent = M("Auth")->where("auth_level = 0")->select();
            $auth_child = M("Auth")->where("auth_level = 1")->select();

            //        dump($auth_parent);
            //        dump($auth_child);
            
            $this->assign("has_auth_ids",$has_auth_ids);
            $this->assign("roleinfo", $roleinfo);
            $this->assign("auth_parent", $auth_parent);
            $this->assign("auth_child", $auth_child);
            $this->display();
        }
    }

}
