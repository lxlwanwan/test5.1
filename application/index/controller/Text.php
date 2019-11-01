<?php
namespace app\index\controller;


use think\Controller;

class Text extends Controller{

    protected $beforeActionList=[
        'detail',
        'comment'=>['except'=>'info,posts'],
        'hello' =>['only'=>'test,index']

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

        echo 'index!';
    }


}