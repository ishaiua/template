<?php

namespace Admin\Model;

use Think\Model;

class UserModel extends Model
{

	public function userLogin($data)
	{
		$user = $this->where($data)->find();
		return $user;
	}

	public function getUserById($id)
	{
		$field="a.id as id,a.name as name ,email,is_active,a.remark as remark,current_login_ip,current_login_time,c.name as rolename,b.role_id as role_id";
		$user = $this->field($field)->join(' as a left join __ROLE_USER__ as b on a.id=b.user_id left join __ROLE__ as c on b.role_id=c.id ')->where('a.id='.$id)->find();
		return $user;	
	}

	public function updatePassword($id,$password)
	{
		$salt='haiua';
		$data['password']=md5(md5($password.$salt));
		return $this->where('id='.$id)->save($data);
	}

	public function checkEmail($email)
	{
		return $this->where("email='%s'",$email)->find();
	}

	public function addNewUser($post)
	{
		//dump($post);exit;
		$salt = 'haiua';
		$post['password'] = md5(md5($post['password'].$salt));
		$id = $this->data($post)->add();

		$roleUser = array(
			'user_id' => $id,
			'role_id' => $post['role_id']
		);

		$res = M('RoleUser')->data($roleUser)->add();
		return $id;
	}

	public function delUserById($id)
	{
		M('RoleUser')->where('user_id='.$id)->delete();
		return $this->delete($id);
		
	}

	public function updateUser($post)
	{
		if (!empty($post['password'])) {
			$salt = 'haiua';
			$data['password'] = md5(md5($post['password'].$salt));
		}
		$data['id']=$post['id'];
		$data['name']=$post['name'];
		$data['remark']=$post['remark'];
		
		$user=$this->save($data);
		$info=M('RoleUser')->where('user_id='.$post['id'])->find();
		if ($info) {
			$res = M('RoleUser')
			 ->where('user_id='.$post['id'])
			 ->save(['role_id'=>$post['role_id']]);
		}else{
			$roleUser = array(
				'user_id' => $id,
				'role_id' => $post['role_id']
			);
			$res = M('RoleUser')->data($roleUser)->add();

		}
		
		return true;	 


	}
}