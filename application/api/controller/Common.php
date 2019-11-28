<?php
namespace app\api\controller;
use think\Controller;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 2019/11/27
 * Time: 17:19
 */
class Common extends Controller{

    const Token='4i274x7xl2usutzzpdts';


    /**
     * 微信token验证
     */
    public function verify_token(){
        $token=self::Token;
        $signature = input('signature');
        $timestamp = input('timestamp');
        $nonce =input('nonce');
        $echostr =input('echostr')??'';
        $data= [$nonce,$token,$timestamp];
        sort($data);
        $data = sha1(implode($data));
        if($data == $signature && $echostr ){
            return $echostr;
        }else{
            return false;
        }

    }



}