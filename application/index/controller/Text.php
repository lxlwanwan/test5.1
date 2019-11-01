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

        return 'detail!';
    }

    public function comment(){

        return 'comment!';
    }

    public function info(){

        return 'info!';
    }

    public function posts(){

        return 'posts!';
    }

    public function hello(){

        return 'hello!';
    }

    public function test(){

       return 'test!';
    }

    public function index(){

        return 'index!';
    }


}