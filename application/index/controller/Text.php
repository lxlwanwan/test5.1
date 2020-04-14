<?php
namespace app\index\controller;


use app\admin\model\Admin;
use app\index\model\User;
use think\cache\driver\Redis;

class Text extends Common {

    public function index(){
        $key ='test_list';
        $admin = Admin::where('id',1)->find()->toArray();
        $redis = new Redis();
        if(input('type')){
            $a = $redis->hGet($key,$admin['id']);
        }else{

            $a = $redis->hSet($key,$admin['id'],$admin);
        }
        dump($a);
//        $user= User::get(6);
//        $a=new User();
//        $user=$user->onehas()->find();
//        dump($user);
    }

    public function login(){

        return 'login';

    }

}