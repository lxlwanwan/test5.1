<?php
namespace app\api\controller;
use app\api\model\Setting;
use Curl\Curl;
use think\Controller;
use think\facade\Config;
use think\facade\Log;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 2019/11/27
 * Time: 14:14
 */
class Index extends Controller{




    public function index(){
        $set = Setting::where('key','access_token')->find();
        if($set){
            if(empty($set['value']) || time()-$set['time'] > 6899){
                $data=[
                    'grant_type'=>'client_credential',
                    'appid'=>config('setting.weixin.appid'),
                    'secret'=>config('setting.weixin.AppSecret')
                ];
                $url_token =config('setting.weixin.url_token').http_build_query($data);
                $url =new Curl();
                $url ->get($url_token);
                if ($url->error) {
                    Log::write('Error: ' . $url->errorCode . ': ' . $url->errorMessage . "\n");
                } else {
                    $arr=$url->response;
                    $arr=json_decode($arr);
                    if(isset($arr['access_token'])){
                        Setting::where('key','access_token')->update(['value'=>$arr['access_token'],'time'=>time()]);
                        Log::write('Success：Access_token更新成功，时间：'.date('Y-m-d H:i:s',time()));
                    }else{
                        Log::write('Error: ' . $arr['errcode'] . ': ' . $arr['errmsg'] . "\n");
                    }
                }
            }
        }
        return $url_token;
    }



}