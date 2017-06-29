<?php
namespace Admin\Logic;
use Think\Model;

class RoleLogic extends Model
{
	public function roleList()
	{
		return $this->select();
	}
}