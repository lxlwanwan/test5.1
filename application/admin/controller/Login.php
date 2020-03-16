<?php
namespace app\admin\controller;
use app\admin\model\Admin;
use think\Controller;
use think\facade\Request;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 2019/12/25
 * Time: 11:08
 */
class Login extends Controller {


    /**
     * @return mixed 登陆
     */
    public function login(){
        if(Request::isGet()){
            return $this->fetch();
        }
        $state = Admin::log_in(input());
        return $state;
    }





}