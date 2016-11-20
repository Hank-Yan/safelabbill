<?php

namespace Admin\Model;

use Think\Model;

class RoleModel extends Model {
    
    //根据 roleid　和　authid 来保存权限设定
    public function saveAuth($roleid,$authid){
        //① 制作 role_auth_ids 
        $authids = implode(",", $authid);
//        dump($authids);
        
        //② 制作 role_auth_ac  连接的字符串，来保存路径信息
        // 根据选中的权限id信息, 查询对应的权限记录，遍历，并从中获取每个权限的 Controller和 action
        $role_auth_ac = M("Auth")->select($authids);
        $s = "";
        foreach ($role_auth_ac as $key=> $v){
            if(!empty($v["auth_c"]) && !empty("auth_a")){
                 $s.=$v["auth_c"]."-".$v["auth_a"].",";
            }
        }
        $s = rtrim($s, ",");
        
        $data["role_auth_ids"] = $authids;
        $data["role_auth_ac"] = $s;
        return $this->where("role_id = '$roleid'")->save($data);//判断是否插入成功
    }

}
