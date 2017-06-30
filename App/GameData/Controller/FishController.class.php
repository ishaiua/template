<?php
namespace GameData\Controller;

class FishController extends BaseController
{
	public function fishRecordList()
	{
		 if( !empty($_GET['starttime']) && !empty($_GET['endtime']) ){
            $post_data = I('get.');

            /*重新搜索就重置查询页*/
            if( !empty($_GET['formsearch']) ){
                $_GET['p'] = 1;
                unset($_GET['formsearch']);
            }
            
            /*获取查询用户的account_id*/
            $account_id = $post_data['account_id']?$post_data['account_id']:0;
            /*获取用户提交的查询区间--时间戳*/
            $SectionTime = array_map('strtotime', array('starttime'=>$post_data['starttime'],'endtime'=>$post_data['endtime']) );

        }else{
           
            /*没有任何请求,默认显示7天的*/
            $_GET['starttime'] = date('Y-m-d',strtotime('-7 day'));
            $_GET['endtime'] = date('Y-m-d',strtotime('-1 day'));   

            // $_GET['starttime'] = date('Y-m-d H:i:s',strtotime('-7 day'));
            // $_GET['endtime'] = date('Y-m-d H:i:s', time());

            $SectionTime = array(
                'starttime' => strtotime($_GET['starttime']),
                'endtime'   => strtotime($_GET['endtime']),
            );

            $account_id = 0;
        }
        $result = D('Fish')->fishRecordData( $SectionTime,$account_id );
        $this->assign('data',$result['data']);
        $this->assign('page',$result['page']);
		$this->display();
	}
}