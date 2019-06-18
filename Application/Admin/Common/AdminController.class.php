<?php

namespace Admin\Common;
use Think\Controller;

class AdminController extends Controller{
	function __construct(){
		parent::__construct();
		$admin_id = session('admin_id');
		$admin_name = session('admin_name');

		$nowAC = CONTROLLER_NAME.'-'.ACTION_NAME;


		if(!empty($admin_name)){
			$roleinfo = D('Manager')->alias('m')->join('role r on m.role_id=r.role_id')->field('r.role_auth_ac')->where(array('m.mg_id'=>$admin_id))->find();

			$have_auth = $roleinfo['role_auth_ac'];

			$allow_auth = "Manager-adminLogin,Manager-verifyImg,Index-index,Index-left,Index-right,Index-top,Manager-adminExit";	

			if(strpos($have_auth,$nowAC)===false &&strpos($allow_auth,$nowAC)===false && $admin_name!=='admin'){
				exit('没有权限访问!');
			}
		}else{
			$allow_ac = "Manager-adminLogin,Manager-verifyImg,Manager-adminExit";
			if(strpos($allow_ac,$nowAC)===false){
				//$this->redirect('Manager/login');
				

				$js = <<<eof

<script type="text/javascript">

//top：作用使得整个frameset都跳转

window.top.location.href="/index.php/Admin/Manager/adminLogin";

</script>

eof;

echo $js;
			}		
		}
	}
}
