<?php
namespace app\api\command;
use app\api\model\Setting;
use Curl\Curl;
use think\console\Command;
use think\console\Input;
use think\console\Output;
use think\facade\Log;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 2019/11/28
 * Time: 14:19
 */
class Access extends Command{

    /**
     * 定时获取access_token
     */
    protected function configure()
    {
        $this->setName('Access')->setDescription('定时获取access_token');

    }


    protected function execute(Input $input, Output $output)
    {
        Log::write('获取access_token定时任务！');
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
                    if(isset($arr->access_token)){
                        Setting::where('key','access_token')->update(['value'=>$arr->access_token,'time'=>time()]);
                        Log::write('Success：Access_token更新成功，时间：'.date('Y-m-d H:i:s',time()));
                    }else{
                        Log::write('Error: ' . $arr->errcode . ': ' . $arr->errmsg . "\n");
                    }
                }
            }
        }

    }


}