<?php
namespace Admin\Controller;
use Think\Controller;
use Common\Tools\Page;
use Admin\Common\AdminController;
class AuthController extends AdminController {
//class AuthController extends Controller {
	function showlist(){
		$cnt = D('Auth')->count();
        $per = 10;
        $page_obj = new Page($cnt,$per);
        $info = D('Auth')->limit($page_obj->offset,$per)->order('auth_id')->select();
        $pagelist = $page_obj->fpage(array(3,4,5,6,7,8));
        $this->assign('pagelist',$pagelist);
		
		$info = generateTree($info);

		$this->assign('info',$info);
		$this->display();
	}
	#添加
	function tianjia(){
		$auth = D('Auth');
		if(IS_POST){
			$shuju = I('post.');
			if($auth->add($shuju)){
				$this->success('添加权限成功',U('showlist',2));
			}else{
				$this->error('添加权限失败',U('tianjia'),2);
			}
		}else{
			//顶级权限
			$authinfoA = $auth->where(array('auth_pid'=>0))->select();
			$this->assign('authinfoA',$authinfoA);
			$this->display();
		}
	
	}

	#批量删除
	 public function DelAll($value=''){
	    foreach ($_POST['choose'] as $key => $value) {
	        $info = D('Auth')->where(array('auth_id'=>$value))->delete();
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
	function authSearch(){
        $auth = D('Auth');
        if(IS_POST){
            $word = I('search');
            //dump($word);
            $data['auth_name'] = array('like','%'.$word.'%');
            $info = $auth->where($data)->select();

            if($info){
                $this->assign('info',$info);
                $this->display('Auth/showlist');
            }
        }
    }

    #删除
    public function del(){
        $auth_id = I('get.auth_id');
        $info = D('Role')->delete($auth_id);
        if($info){
            $this->success("删除成功",U('showlist'));
        }else{
            $this->error("删除失败");
        }
    } 

    #修改
    public function upd(){
        $auth=D("Auth");
        $auth_id = I('get.auth_id');
        
        if(IS_POST){
            $shuju = I('post.');
            $num = $auth->save($shuju);
            if($num){
                $this->success('修改成功',U('showlist'));
            }else{
                $this->error('修改失败',U('upd',array('auth_id'=>$auth_id)));
            }
        }else{
            $info = $auth->find($auth_id);
            //dump($info);
            $roleinfo = D('Auth')->select();
            //dump($roleinfo);
            $this->assign('roleinfo',$roleinfo);
            //dump($info);
            $this->assign("info",$info);
            $this->display();
        }
    }

}	