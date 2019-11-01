<?php
namespace app\index\controller;


use think\Controller;

class Text extends Controller{

    protected $beforeActionList=[

        'comment'=>['except'=>'info,posts'],
        'hello' =>['only'=>'test,index']

    ];


    public function comment(){

        return 'comment!<br/>';
    }

    public function info(){

        return 'info!<br/>';
    }

    public function posts(){

        return 'posts!<br/>';
    }

    public function hello(){

        return 'hello!<br/>';
    }

    public function test(){

       return 'test!<br/>';
    }

    public function index(){

        return 'index!<br/>';
    }


}