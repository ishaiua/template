<?php

namespace Admin\Logic;

use Think\Model;

class UserLogic extends Model
{
	public function allUsers($name='')
	{
		$map='';
		if (!empty($name)) {
			$map['a.name']=$name;
		}
		$join = 'as a left join __ROLE_USER__ as c on a.id=c.user_id left join __ROLE__ as d on c.role_id=d.id';
			/*根据uid进行分组,找到组内最大的login_time*/
		$data = $this->field('a.id,a.name ,email,is_active,current_login_time,d.name as role_name')->join($join)->where($map)->group('a.id')->select();

		return $data;
	}

	public function allUserId()
	{
		return $this->getField('id',true);
	}
}