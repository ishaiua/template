<?php
function node_tree($data,$pid){
	$arr = array();
	foreach($data as $value){
		if($value['pid'] == $pid){
			$value['child'] = node_tree($data,$value['id']);
			$arr[] = $value;
		}
	}
	return $arr;
}

function node_level($level){
	switch( $level ){
      case '1':
        return '模块';break;
      case '2':
        return '控制器';break;
      case '3':
        return '方法'; break; 
   }     
}