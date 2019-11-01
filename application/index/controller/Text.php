<?php
namespace app\index\controller;


class Text extends Common {

    protected $beforeActionList=[
        'isGet'=>['except'=>'posts'],
        'comment' =>['only'=>'test,index']

    ];

    public function detail(){

        echo 'detail!';
    }

    public function comment(){

        echo 'comment!';
    }

    public function info(){

        echo 'info!';
    }

    public function posts(){

        echo 'posts!';
    }

    public function hello(){

        echo 'hello!';
    }

    public function test(){

       echo 'test!';
    }

    public function index(){
        $this->isGet();
        echo 'index!';
    }

    public function login(){

        return 'login';

    }

}