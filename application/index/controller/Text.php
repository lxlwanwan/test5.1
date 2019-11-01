<?php
namespace app\index\controller;


use app\index\model\User;

class Text extends Common {

    public function index(){
        $user= User::get(6);
        $data=$user->User::comments()->select();
        dump($data);
    }

    public function login(){

        return 'login';

    }

}