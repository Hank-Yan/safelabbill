<?php
namespace Home\Model;
use Think\Model;

class UserModel extends Model{
     protected $_validate = array(
     array('verify_ma','require','验证码必须！'), //默认情况下用正则进行验证
     array('username','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
     array('password1','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
   );
}

