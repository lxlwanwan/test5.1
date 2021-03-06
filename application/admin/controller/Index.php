<?php
namespace app\admin\controller;


use app\admin\model\LogList;
use app\admin\model\WebSetting;
use think\facade\Cookie;
use think\facade\Env;
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
            $this->assign('key',WebSetting::STEYE_SETTING);
            return $this->fetch();
        }
        $state = WebSetting::add_edit(input());
        return $state;
    }



    /**
     * @return mixed 操作日志
     */
    public function log_list(){
        if(Request::isGet()){
            $this->assign('list',LogList::data_list(input()));
            $this->assign('types',LogList::$types);
            return $this->fetch();
        }

        $state = LogList::del_all(input('state',0));
        return $state;
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


    /**
     * 图标上传
     */
    public function img_update(){
        $image=request()->file('img');
        $img = $this->add_img($image,input('type',0));
        return $img;
    }

}