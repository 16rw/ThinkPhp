<?php
namespace Admin\Model;
use Think\Model;


#会员用户控制器
class RoleModel extends Model{
	function saveAuth($role_id,$auth_id){
		$authids = implode(',', $auth_id);
		$authinfo = D('Auth')->where(array('auth_id'=>array('in',$authids),'auth_pid'=>array('neq',0)))->select();
		$tmp = array();
		foreach ($authinfo as $v) {
			$ac = $v['auth_c']."-".$v['auth_a'];
			array_push($tmp,$ac);
		}
		$acs = implode(',',$tmp);//Goods-showlist
		$shuju['role_id'] = $role_id;
		$shuju['role_auth_ids'] = $authids;
		$shuju['role_auth_ac'] = $acs;
		return $this->save($shuju);
	}
}