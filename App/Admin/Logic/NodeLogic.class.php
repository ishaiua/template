<?php

namespace Admin\Logic;

use Think\Model;

class NodeLogic extends Model
{
	/*获取节点*/
	public function getNodeList(){
		$data = $this->select();
		$data = node_tree($data,0);
	 	return $data;
	}


	/*添加节点*/
	public function addNode($post){
			$res = $this->add($post);
			return $res;
	}


	/*更新节点*/
	public function findNode($nodeId){
		return $this->where( array('id'=>$nodeId) )->find();
	}

	/*删除节点*/
	public function deleteNode($nodeId){
		M('Access')->where(array('node_id'=>$nodeId))->delete();
		$this->where(array('id'=>$nodeId))->delete();

	}

	/*更新节点*/
	public function updateNode($data){
		$this->save($data);
	}
}