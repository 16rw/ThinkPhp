<?php
namespace Admin\Controller;
use Think\Controller;
use Common\Tools\Page;
use Admin\Common\AdminController;
class GoodsController extends AdminController {

//class GoodsController extends Controller {

    public function showlist(){
       $goods = D('Goods');
       $cnt = $goods->count();
       $per = 5;
       $page_obj = new Page($cnt,$per);
       $info = $goods->limit($page_obj->offset,$per)->order('goods_id desc')->select();
       $pagelist = $page_obj->fpage(array(3,4,5,6,7,8));
       $this->assign('pagelist',$pagelist);
       $this->assign('info',$info);
       $this->display();
    }

    public function tianjia(){
    	$goods= D('Goods');
    	if(IS_POST){
            $shuju = I('post.');
            if($_FILES['goods_img']['error']==0){
                 $cfg = array(
                    'rootPath' => './Public/Upload', 
                    );
                $up = new \Think\Upload($cfg);
                $z = $up->uploadOne($_FILES['goods_img']);
                $shuju['goods_img'] = $up->rootPath.$z['savepath'].$z['savename'];  
            }
           

    		
    		$newId = $goods->add($shuju);
    		if($newId){
    			$this->success('添加成功',U('showlist'),3);
    		}else{
    			$this->error('添加失败',U('tianjia'),3);
    		}
    	}else{
    		$this->display();
    	}
    	
    	 
    }

    public function upd(){
    	$goods = D('Goods');
    	$good_id=I('get.goods_id');

    	if(IS_POST){
    		$shuju = I('post.');
    		$num = $goods->save($shuju);
    		if($num){
    			$this->success('修改成功',U('showlist'));
    		}else{
    			$this->error('修改失败');
    		}
    	}else{
    		$info = $goods->find($goods_id);
    		$this->assign('info',$info);
    		$this->display();
    	}

    	
    	
    }

    function goodsSearch(){

        $goods = D('Goods');
        if(IS_POST){
            $word = I('search');
            //dump($word);
            $data['goods_name'] = array('like','%'.$word.'%');
            $info = $goods->where($data)->select();

            if($info){
                $this->assign('info',$info);
                $this->display('Goods/showlist');
            }
        }
    }

     public function del(){
        $goods_id = I('get.goods_id');
        $info = D('Goods')->delete($goods_id);
        if($info){
            $this->success("删除成功",U('showlist'));
        }else{
            $this->error("删除失败");
        }
    }  
}    