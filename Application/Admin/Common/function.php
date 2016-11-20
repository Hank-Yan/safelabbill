<?php

function hasArrow($pid,$childInfo){
     $childPids = array();
    foreach ($childInfo as $key => $value){
        $childPids[$key] = $value["auth_pid"];
    }
    if(in_array($pid, $childPids)){
        //如果有的话，在前台加上下面这个东西
       $b=<<<hello
        <b class="arrow fa fa-angle-down"></b>
hello;
	return $b;
    }
}