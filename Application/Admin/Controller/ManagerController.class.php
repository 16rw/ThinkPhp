<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\AdminController;
use Common\Tools\Page;
#管理员控制器
class ManagerController extends AdminController {
//class ManagerController extends Controller {
    #登录
    public function adminLogin(){
    	$manager = D('Manager');	
    	if(IS_POST){
    	       $code = I('post.verify');
               $vry = new \Think\Verify();
               if($vry->check($code)){
                    $username = I('username');
                    $password = I('password');
                    $shuju = $manager->where(array('mg_name'=>$username,'mg_pwd'=>$password))->find(); 
                    if($shuju){
                        session('admin_id',$shuju['mg_id']);
                        session('admin_name',$shuju['mg_name']);
                        $this->redirect('Index/index');
                    }
                    $this->assign('err','用户名或密码错误');
               }else{
                    $this->assign('err','验证码错误');
               }			
    	}
        $this->display();
    }
    #退出
    public function adminExit(){
    	session();
    	$this->redirect('Manager/adminLogin');
    }

    #注册
    public function adminRegister(){
    	$manager = D('Manager');
        $roleinfo = D('Role')->select();
        $this->assign('roleinfo',$roleinfo);
        if(IS_POST){
            
            $data = array(
                'mg_name' => I('name'),
                'mg_pwd' => I('password'),
                'role_id' => I('rid')
            );
            $data['mg_time'] = time();
            $shuju = $manager->add($data);
            if($shuju){
                $this->redirect('Index/index');
            }
            $this->assign('err','注册失败');
        }
        $this->display();
    }

    #验证
    function verifyImg(){
        $cfg=array(
            'fontSize'  =>  20,
            'imageH'    =>  46,               
            'imageW'    =>  150,              
            'length'    =>  4,              
            'fontttf'   =>  '4.ttf',            

            );
        $vry = new \Think\Verify($cfg);
        $vry->entry();


    }

    #展示
    public function showlist(){


        $cnt = D('Manager')->count();
        $per = 5;
        $page_obj = new Page($cnt,$per);
        $info = D('Manager')->limit($page_obj->offset,$per)->order('mg_id desc')->select();
        $pagelist = $page_obj->fpage(array(3,4,5,6,7,8));
        $this->assign('pagelist',$pagelist);


        //$info = D('Manager')->select();
        $this->assign('info',$info);
        $this->display();
    }

    #删除
    public function del(){
        $mg_id = I('get.mg_id');
        $info = D('Manager')->delete($mg_id);
        if($info){
            $this->success("删除成功",U('showlist'));
        }else{
            $this->error("删除失败");
        }
    }  

    #修改
    public function upd(){
        $manager=D("Manager");
        $mg_id = I('get.mg_id');
        
        if(IS_POST){
            $shuju = I('post.');
            $shuju['mg_time'] = time();
            // dump($shuju);
            // exit;
            $num = $manager->save($shuju);
            if($num){
                $this->success('修改成功',U('showlist'));
            }else{
                $this->error('修改失败',U('adminUpdate',array('mg_id'=>$mg_id)));
            }
        }else{
            $info = $manager->find($mg_id);
            //dump($info);
            $roleinfo = D('Role')->select();
            //dump($roleinfo);
            $this->assign('roleinfo',$roleinfo);
            //dump($info);
            $this->assign("info",$info);
            $this->display("adminUpdate");
        }
    }


    #添加
    function tianjia(){
        // $roleinfo = D('Role')->select();
        // $this->assign('roleinfo',$roleinfo);
        $this->display('adminRegister');
    }

    #查询
    function adminSearch(){
        $manager = D('Manager');
        if(IS_POST){
            $word = I('search');
            //dump($word);
            $data['mg_name'] = array('like','%'.$word.'%');
            $info = $manager->where($data)->select();

            if($info){
                $this->assign('info',$info);
                $this->display('Manager/showlist');
            }
        }
    }

    #删除所有
    public function DelAll($value=''){
        foreach ($_POST['choose'] as $key => $value) {
            $info = D('Manager')->where(array('mg_id'=>$value))->delete();
        }
        if($info){
            //删除成功
            $this->success('删除成功',U('showlist'));
        }else{
            //删除失败
            $this->error('删除失败');
        } 
     }  


}