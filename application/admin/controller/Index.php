<?php
namespace app\admin\controller;


use app\admin\model\LogList;
use app\admin\model\WebSetting;
use think\facade\Cookie;
use think\facade\Request;

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
        if(Request::isGet()){
            $this->assign('ting',WebSetting::get_detail(WebSetting::STEYE_SETTING));
            $this->assign('key',WebSetting::STEYE_SETTING);
            return $this->fetch();
        }

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