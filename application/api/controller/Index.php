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
        $data=[
            'grant_type'=>'client_credential',
            'appid'=>config('setting.weixin.appid'),
            'secret'=>config('setting.weixin.AppSecret')
        ];
        $url =config('setting.weixin.url_token').http_build_query($data);
        return $url;

    }



}