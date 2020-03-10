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


    /**
     * @return mixed 首页
     */
    public function index()
    {
        return $this->fetch();
    }


    /**
     * @return string联系我
     */
    public function contact()
    {

        return $this->fetch();
    }


    /**
     * 详情
     */
    public function detail(){

        return $this->fetch();
    }


    /**
     * 关于网站
     */
    public function about(){

        return $this->fetch();
    }


    /**
     * 测试
     */
    public function test()
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

}
