<?php

namespace Home\Model;

use Think\Model\RelationModel;

//class MessageModel extends Model {
class MessageModel extends RelationModel {

    //在模型类里面通过$_auto属性定义处理规则
    protected $_auto = array(
        //array(完成字段1,完成规则,[完成条件,附加规则])
        array('time', 'time', 1, 'function'), //function	使用函数，表示填充的内容是一个函数名
        array('uid', 'getId', 1, 'callback'), // callback回调方法 ，表示填充的内容是一个当前模型的方法
        array('filename', 'getId', 1, 'callback'), // callback回调方法 ，表示填充的内容是一个当前模型的方法
    );
    protected $_link = array(
        'User' => array(     //站在当前模型的角度，也就是message表的角度，我们是想使用User表，所以这里第一个配置项，表名就写User即可。
            'mapping_type' => self::BELONGS_TO,
            'class_name' => 'User',//这一行可能用不到，实际上是与需要映射的表关联的model类
            'foreign_key' => 'uid',
//            'mapping_name' => 'user',//映射的名字
//            'mapping_fields'=>'username',
            'as_fields'=>'username:uname',
        ),
    );

    protected function getId() {
        return $_SESSION['id'];
    }

}
