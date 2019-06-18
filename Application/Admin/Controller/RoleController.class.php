<?php
namespace Admin\Controller;
use Think\Controller;
use Common\Tools\Page;
use Admin\Common\AdminController;
class RoleController extends AdminController {
// class RoleController extends Controller {
	#展示
	function showlist(){

		$cnt = D('Role')->count();
        $per = 5;
        $page_obj = new Page($cnt,$per);
        $info = D('Role')->limit($page_obj->offset,$per)->order('role_id desc')->select();
        $pagelist = $page_obj->fpage(array(3,4,5,6,7,8));
        $this->assign('pagelist',$pagelist);


		// $info = D('Role')->select();
		$this->assign('info',$info);
		$this->display();
	}
	#分配
	function distribute(){
		$role = D('Role');
		if(IS_POST){
			$z = $role->saveAuth($_POST['role_id'],$_POST['auth_id']);
			if($z){
				$this->success('分配权限成功',U('Role/showlist'));
			}else{
				$this->error('分配权限失败',U('distribute',array('role_id',$_POST['role_id'])),2);
			}

		}else{
			$role_id = I('get.role_id');
			$roleinfo = D('Role')->find($role_id);
			$this->assign('roleinfo',$roleinfo);

			$authinfoA = D('Auth')->where(array('auth_pid'=>0))->select();
			$authinfoB = D('Auth')->where(array('auth_pid'=>array('neq',0)))->select(); //neq不等于
			$this->assign('authinfoA',$authinfoA);
			$this->assign('authinfoB',$authinfoB);
			$this->display();
		}

	}

	#添加
	function tianjia(){
		$role = D('Role');
		if(IS_POST){
			$authids = implode(',', $_POST['auth_id']);
			$authinfo = D('Auth')->where(array('auth_id'=>array('in',$authids),'auth_pid'=>array('neq',0)))->select();
			$tmp = array();
			foreach ($authinfo as $v) {
				$ac = $v['auth_c']."-".$v['auth_a'];
				array_push($tmp,$ac);
			}
			$acs = implode(',',$tmp);//Goods-showlist
			$shuju['role_auth_ids'] = $authids;
			$shuju['role_auth_ac'] = $acs;
			$shuju['role_name'] = I('post.role_name');
			//dump($shuju);
			$z = $role->add($shuju);
			if($z){
				$this->success('添加权限成功',U('Role/showlist'));
			}else{
				$this->error('添加权限失败',U('tianjia'));
			}
		}else{
			$authinfoA = D('Auth')->where(array('auth_pid'=>0))->select();
			$authinfoB = D('Auth')->where(array('auth_pid'=>array('neq',0)))->select(); //neq不等于
			$this->assign('authinfoA',$authinfoA);
			$this->assign('authinfoB',$authinfoB);
			$this->display();
		}
	}

	#批量删除
	 public function DelAll($value=''){
	    foreach ($_POST['choose'] as $key => $value) {
	        $info = D('Role')->where(array('role_id'=>$value))->delete();
	    }
	    if($info){
	        //删除成功
	        $this->success('删除成功',U('showlist'));
	    }else{
	        //删除失败
	        $this->error('删除失败');
	    } 
	 }  

	 #查询
	function roleSearch(){
        $role = D('Role');
        if(IS_POST){
            $word = I('search');
            //dump($word);
            $data['role_name'] = array('like','%'.$word.'%');
            $info = $role->where($data)->select();

            if($info){
                $this->assign('info',$info);
                $this->display('Role/showlist');
            }
        }
    }

    #删除
    public function del(){
        $role_id = I('get.role_id');
        $info = D('Role')->delete($role_id);
        if($info){
            $this->success("删除成功",U('showlist'));
        }else{
            $this->error("删除失败");
        }
    } 






}	