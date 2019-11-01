<?php
namespace app\index\controller;


use app\index\model\User;

class Text extends Common {

    public function index(){
        $user= User::get(6);
        $a=new User();
        $user=$user->comments()->select();
        dump($user);
    }

    public function login(){

        return 'login';

    }

}