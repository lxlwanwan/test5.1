<?php
namespace app\index\controller;


use app\index\model\User;

class Text extends Common {

    public function index(){
        phpinfo();
//        $user= User::get(6);
//        $a=new User();
//        $user=$user->onehas()->find();
//        dump($user);
    }

    public function login(){

        return 'login';

    }

}