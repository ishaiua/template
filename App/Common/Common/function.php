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