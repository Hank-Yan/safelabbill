<?php

//获取分页效果下的  show 对象
function setPage($total, $pages) {
    $Page = new \Think\Page($total, $pages);
    //$page.setConfig();//设置样式
    $Page->setConfig('prev', '<span aria-hidden="true">上一页</span>'); //上一页
    $Page->setConfig('next', '<span aria-hidden="true">下一页</span>'); //下一页
    $Page->setConfig('first', '<span aria-hidden="true">首页</span>'); //第一页
    $Page->setConfig('last', '<span aria-hidden="true">尾页</span>'); //最后一页

    $Page->setConfig('theme', '<li><a>当前%NOW_PAGE%/%TOTAL_PAGE%</a></li>  %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');

    $show = $Page->show(); // 分页显示输出,进行分页数据查询 注意limit方法的参数要使用Page类的属性
    $pageObj = ['page'=>$Page,'show'=>$show];
    return $pageObj;
}
