<?php
namespace app\index\controller;


use app\index\model\User;

class Text extends Common {

    public function index(){
        $user= User::get(6);
        $a=new User();
        $data=$user->comments()->select();
        dump($data);
    }

    public function login(){

        return 'login';

    }

}