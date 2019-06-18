<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\AdminController;
class IndexController extends AdminController {
//class IndexController extends Controller {

    // public function boot(){
      




    //   $manager = D('Manager');
    //   $info = $manager->order('mg_id desc')->select();
    //   $this->assign('info',$info);
    //   $this->display();
    // }

    public function index(){
        // $manager = D('Manager');
        // $info = $manager->order('id desc')->select();
       //dump($info);
        //$this->assign('info',$info);

       // $username = $_POST['username'];
       // $password = $_POST['password'];

       // print_r($password);
       // exit;
       $this->display();
    }

    public function left(){
      $admin_id = session('admin_id');
      $admin_name = session('admin_name');
      
      if($admin_name=='admin'){
        $authinfoA = D('Auth')->where(array('auth_pid'=>0))->select();
        $authinfoB = D('Auth')->where(array('auth_pid'=>array('neq',0)))->select();
      }else{
        $roleinfo = D('Manager')->alias('m')->join('role as r on m.role_id=r.role_id')->field('r.role_auth_ids')->where(array('m.mg_id'=>$admin_id))->find();
        $authids = $roleinfo['role_auth_ids'];
        $authinfoA = D('Auth')->where(array('auth_id'=>array('in',$authids),'auth_pid'=>0))->select();
        $authinfoB = D('Auth')->where(array('auth_id'=>array('in',$authids),'auth_pid'=>array('neq',0)))->select();
      }
      
      // dump($authinfoA);
      // dump($authinfoB);
      $this->assign('authinfoA',$authinfoA);
      $this->assign('authinfoB',$authinfoB);


      
      $this->display();
    }
    public function right(){
      $this->display();
    }

    public function top(){
      $this->display();
    }
    // public function login(){
    //    $this->display();

    //    $username = $_POST['username'];

    // }

    // #用户添加
    // public function add(){
    //     if(IS_POST){
    //       $data = array(
    //         'adminname'=> I('username'),
    //         'password'=> I('password'),
    //         'age'     => I('age'),
    //         'adminrole'    => I('role'),
    //         'state'   => I('state'),
    //         'time'    => time()
    //         );
    //       $manager = D('Manager');
    //       $shuju = $manager->add($data);
    //       //dump($shuju);
    //       echo json_encode($shuju);
    //       return $shuju;
    //     }
    // }


    // #用户展示
    // public function manager(){
    //     $this->display();
       

    // }


    // public function register(){
    //    $this->display();

    //    //$username = $_POST['username'];

    // }

    // public function left(){
    //    $this->display();
    // }
    // public function right(){
    //    $this->display();
    // }
   
}