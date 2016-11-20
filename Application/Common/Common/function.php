<?php

// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
//校验验证码是一个公共行为，可以封装一个函数，供其他模块调用
function check_verify($code,$id=""){
    $verify = new Think\Verify();
    return $verify->check($code,$id);
}