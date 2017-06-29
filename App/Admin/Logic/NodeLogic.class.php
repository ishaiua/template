<?php

namespace Admin\Logic;

use Think\Model;

class NodeLogic extends Model
{
	public function getNodeList(){
		$data = $this->select();
		$data = node_tree($data,0);
	 	return $data;
	}
}