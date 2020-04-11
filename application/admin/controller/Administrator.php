<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2020/3/16
 * Time: 15:34
 */
namespace app\admin\controller;

use app\admin\model\Admin;
use app\admin\model\LogList;
use think\Cookie;
use think\facade\Request;

class Administrator extends Common{

    /**
     * 管理列表
     */
    public function lists(){
        if(Request::isGet()){
            $this->assign('list',Admin::get_list());
            $this->assign('state',Admin::SUPER_ADMIN);
            return $this->fetch();
        }
        $state = Admin::edit_add(input());
        return $state;
    }


    /**
     * 编辑管理
     */
    public function admin_edit(){
        $one =Admin::get_detil(input('id',0));
        if(Request::isGet()){
            $this->assign('one',$one);
            return $this->fetch();
        }
        $state = Admin::edit_add(input(),$one);
        return $state;
    }


    /**
     * @return mixed  添加管理
     */
    public function admin_add(){
        if(Request::isGet()){
            return $this->fetch();
        }
        $state = Admin::edit_add(input());
        return $state;

    }

    /**
     * 删除管理
     * @return \think\response\Json
     */
    public function del_admin(){
        $one =Admin::get_detil(input('id',0));
        $name =$one['name'];
        if(Admin::SUPER_ADMIN != $one['rule_id']){
            $state = $one->delete();
            if($state){
                LogList::add_log(Cookie::get('admin'),'删除了管理员：'.$name);
                return json(['err'=>200,'msg'=>'操作成功']);
            }else{
                return json(['err'=>201,'msg'=>'操作失败']);
            }
        }else{
            return json(['err'=>201,'msg'=>'操作失败']);
        }

    }



}