<?php

namespace Home\Controller;

use Home\Common\CommonController;
use Think\Page;

class MybillController extends CommonController {
    public function index(){
        $m = M('Billinfo');
        $uid = session('id');
        $where['userid'] = $uid;
         $where['status'] = 1;//未通过审核
        //$data = $m->where($where)->select();
        
        $count = $m->where($where)->count();//链式操作每一步都是返回一个model 对象
        $pageObj = setPage($count, 5);
        $page = $pageObj['page'];
        $show = $pageObj['show'];
        $data = $m->order('id')->where($where)->limit($page->firstRow.','.$page->listRows)->select();
        
         //用于判断是否有数据
        if(!$data){
            $empty = TRUE;
        }else{
            $empty = FALSE;
        }
        $this->assign("isEmpty",$empty);
        
        
        $this->assign('list',$data);
        $this->assign('page',$show);
        $this->display();
    }

    
}


