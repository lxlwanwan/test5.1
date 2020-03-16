<?php
namespace app\admin\controller;


use app\admin\model\LogList;
use think\facade\Cookie;

class Index extends Common {

    /**
     * @return mixed首页
     */
    public function index(){

        return $this->fetch();
    }

    /**
     * @return mixed 子页
     */
    public function welcome(){
        $this->assign('time',time());
        return $this->fetch();
    }




    /**
     * @return mixed 网站设置
     */
    public function setting(){

        return $this->fetch();
    }



    /**
     * @return mixed 操作日志
     */
    public function log_list(){
        return $this->fetch();
    }


    /**
     * 退出
     */
    public function log_out(){
        $user = Cookie::get('admin');
        LogList::add_log($user,'退出了后台');
        Cookie::delete('admin');
        $this->redirect('login/login');
    }
}