<?php
namespace app\index\controller;


class Text extends Common {

    public function index(){
        $this->isGet();
        echo 'index!';
    }

    public function login(){

        return 'login';

    }

}