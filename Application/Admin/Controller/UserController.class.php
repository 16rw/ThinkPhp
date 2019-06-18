<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\AdminController;
use Common\Tools\Page;
#会员用户控制器
class UserController extends AdminController {
//class UserController extends Controller {
    public function userList(){
    	// $user = new  \Admin\Model\UserModel();
    	// dump($user);
    	$user = D('User');
         $cnt = $user->count();
        $per = 5;
        $page_obj = new Page($cnt,$per);
        $info = $user->limit($page_obj->offset,$per)->order('id')->select();
        $pagelist = $page_obj->fpage(array(3,4,5,6,7,8));
        $this->assign('pagelist',$pagelist);
    	$info = $user->select();
    	$this->assign('info',$info);
    	//dump($info);

        $this->display();
    }


    public function userSearch(){
    	$user = D('User');
    	if(IS_POST){
    		$word = I('search');
    		//dump($word);
    		$data['username'] = array('like','%'.$word.'%');
    		$info = $user->where($data)->select();

    		if($info){
    			$this->assign('info',$info);
    			$this->display('User/userList');
    		}
    	}
    	
    }


    public function del($id){
    	$user=D("User");
        $data = $user->delete($id);
        dump($data);
        if($data)
        {
            $url = U("userList");
            $this->success("删除成功",$url);
        }
        else
        {
            $this->error("删除失败");
        }
    }



    public function update(){

    	$user=D("User");
    	$id = I('get.id');

    	if(IS_POST){
    		$shuju = I('post.');
    		//dump($shuju);
    		$num = $user->save($shuju);
    		if($num){
    			$this->success('修改成功',U('userList'));
    		}else{
    			$this->error('修改失败',U('userUpdate',array('id'=>$id)));
    		}
    	}else{
			$info = $user->find($id);
	    	//dump($info);
	        $this->assign("info",$info);
	        $this->display("userUpdate");
 		}
        
    }


    #添加
    public function userAdd(){
    	$user=D("User");
    	if(IS_POST){
    		$data = I('post.');
    		//dump($data);
    		$shuju = $user->add($data);
    		if($data){
    			$this->success('添加成功',U('userList'));
    		}else{
    			$this->error('添加失败',U('userAdd'));
    		}
    	}else{
            $this->display();
        }
    	
    }



    #用户检验
    public function checkName(){
        if(IS_AJAX){
            $username = I('');
            $info = D()->where(array('username'=>$username))->find();
            if($info){
                echo json_encode(array('status'=>0));
            }else{
                echo json_encode(array('status'=>1));
            }
        }
        // function checkname(){
        //     $.ajax({
        //         url:"/index.php/Home/User/checkName",
        //         data:{'username':$().val()},
        //         dataType:'json',
        //         type:'',
        //         success:function(msg){
        //             if(msg.status==0){
        //                 $().html('用户名已经被占用');
        //             }else{
        //                 $().html('恭喜你可以使用');
        //             }
        //         }
        //     });
        // }


    }


}