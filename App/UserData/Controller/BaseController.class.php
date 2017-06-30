<?php

namespace UserData\Controller;
use Think\Controller;
use Org\Util\Rbac;

class BaseController extends Controller
{
	public function _initialize()
	{
		if (session('isLogin')!=1 && empty(session('name'))) {
			redirect(U('Login/login'));
		}

		if (!Rbac::checkLogin()) {
			$this->error('你还没有登录呢.',U('Login/login'));
		}

		if (!Rbac::AccessDecision()) {
			$this->error('没有访问权限.',U('Login/login'));
		}

		if (!session(C('ADMIN_AUTH_KEY'))) {
			$id=session('id');
			if (!$menu=S('user'.$id)) {
				$map['user_id']=$id;
				$map['show']=1;

				$menu = M('Role_user','hh_')
					  ->join('as a left join hh_access as b on a.role_id = b.role_id')->join('hh_node as c on c.id=b.node_id')->where($map)->select();
				S('user'.$id,$menu);     

			}
		}else{
			if( !$menu=S('admin') ){
				$map['show']    = 1; //是否在前台栏目显示
				$menu = M('Node','hh_')->where($map)->select();
				S('admin',$menu);
			}
		}
		$menu = node_tree($menu,14);
		$this->assign('menu',$menu);

	}
}