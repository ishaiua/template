<?php
namespace Admin\Logic;
use Think\Model;

class RoleLogic extends Model
{
	public function roleList()
	{
		return $this->select();
	}

	public function addRole( $postData )
	{
		$access = $postData['access'];
		unset($postData['access']);
			
		/*角色表*/
		$roleId = $this->add($postData);

		/*角色节点表*/
		$count = count($access);
		for( $i=0;$i<$count;++$i ){
			$data[$i]['role_id'] = $roleId;
			$data[$i]['node_id'] = $access[$i];
		}
		
		 
		$accessModel = M('Access');
		$accessModel->startTrans();

		$res = $accessModel->where( array('role_id'=>$roleId) )->delete();

		  
		if($accessModel->addAll($data)){
			$accessModel->commit();
			return true;	
		}
			
		$accessModel->rollback();
		return false;		  	 
	}

	public function getRoleInfo($role_id)
	{	
		$data = $this->where(array('id'=>$role_id))->find();

		/*相关权限*/
		$checknode = M('Access')->where(array('role_id'=>$role_id))->getFIeld('node_id',true);
		

		$nodelist = D('Node','Logic')->getNodeList();
			 
		return array('data'=>$data,'nodelist'=>$nodelist,'checknode'=>$checknode);
	}

	public function saveRole($postData){
			
		$access = $postData['access'];
		unset($postData['access']);

		$this->where(array('id'=>$postData['roleId']))->data($postData)->save();

		$accessModel = M('Access');
		
		/*角色节点表*/
		$count = count($access);
			for( $i=0;$i<$count;++$i ){
				$data[$i]['role_id'] = $postData['roleId'];
				$data[$i]['node_id'] = $access[$i];
				$data[$i]['level']   = 0;
			}


		/*更新*/
		$accessModel->startTrans();

		$res = $accessModel->where(array('role_id'=>$postData['roleId']))->delete();

	
		if($accessModel->addAll($data)){
			$accessModel->commit();
			return true;
		}
	
		$accessModel->rollback();
		return false;
	}
}