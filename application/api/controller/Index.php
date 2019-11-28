<?php
namespace app\api\controller;
use think\Controller;
use think\facade\Config;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 2019/11/27
 * Time: 14:14
 */
class Index extends Controller{




    public function index(){
        $data= Config::get('setting.weixin.token');
        return $data;

    }



}