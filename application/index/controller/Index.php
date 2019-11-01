<?php
namespace app\index\controller;

use think\Controller;
use think\facade\Cache;
use think\facade\Env;
use think\facade\Log;
use think\queue\Worker;
use think\Validate;
use app\index\validate\Import;
use app\index\extend\Text1;
use app\index\model\Users;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();

    }

    public function hello()
    {

        $im=new Import();

        if(!$im->check(input(),'','member')){
            dump($im->getError());die;
        };
//        if(!$im->scene('member')->check(input())){
//            dump($im->getError());die;
//        };

        return 'hello';
    }

    //popen()这个函数要打开，开启在php.ini的：disable_functions 找到并删除该函数
    public function set_linux(){
        $user = Users::get(11);
        $date = $user->has_one()->find();
        dump($date);
        $data=Users::hasWhere('has_one',['id'=>1])->find();
        dump($data);die;
        return $this->fetch();
    }


}
