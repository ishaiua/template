<?php
namespace GameData\Model;

use Think\Model;

class FishModel extends Model
{
	public function fishRecordData($SectionTime,$account_id=0)
	{
		$startYMD = date('Ymd',$SectionTime['starttime']);
		$endYMD   = date('Ymd',$SectionTime['endtime']);

		/*此处是方便游戏玩家输赢情况查询所设立的条件*/
		if( $account_id != 0 ){
			$map['account_id'] = $account_id;
		}
		
		$map['dateid'] = array('between', array($startYMD,$endYMD) );
			
		$count = $this->where($map)->count();
		$Page = new \Think\Page($count,10);
		$show = $Page->show();

		$result = $this->where($map)->order('dateid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		return array('data'=>$result,'page'=>$show);
	}
}