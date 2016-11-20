<?php

namespace Home\Controller;

use Think\Controller;
use Think\Verify;

class PublicController extends Controller {

    public function index() {
        $l = $_GET['l'] ? $_GET['l'] : 4;
        $config = array(
            'fontSize' => 30, // 验证码字体大小
            'length' => $l, // 验证码位数
            'useNoise' => TRUE, // 关闭验证码杂点
        );
        $Verify = new Verify($config);
        $Verify->entry();
    }
}
