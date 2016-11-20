<?php

namespace Admin\Model;

use Think\Model;

class UserModel extends Model {

    //    protected $pathValidate = true;// 开启批量验证，用于一次进行多种后台验证
    //    //自动验证适合对某个具体的字段进行验证
    //        protected $_validate = array(
    //            //array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
    //            array('verify_ma','require','验证码必须！'), //验证码必须填写
    //            //验证规则和字段无关的情况，验证字段可以随意设置
    //            array('checkNamePwd',checkNamePwd,"用户名和密码不匹配",0,'callback'),
    //        );
    //校验用户名和密码的函数
    public function checkNamePwd($name, $pwd) {

        //我们不要直接写sql 防止sql 注入
        //1. 校验用户名
        $info = $this->where("username = '$name'")->find(); //php 双引号里面可以自动解析,这里的where 里面相当于使用了sql 语句，“=” 号后面一定要记得使用单引号，不然会找不到错误
        //2. 如果用户名存在，再判断密码是否正确，分两步判断
        if ($info['role_id']==2 || $info['role_id']==3 ||$info['role_id']==0) {
            if ($info['password'] === $pwd) {
                return $info;
            }
        }
        return null; //php 的好处，直接return null 
    }

}
