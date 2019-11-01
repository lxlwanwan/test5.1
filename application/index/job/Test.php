<?php
namespace app\index\job;

use app\index\model\User;

use think\facade\Log;
use think\queue\Job;

class Test{

    /**
     * 执行的消息队列
     */
    public function fire(Job $job,$date){

        $state =$this->test_add($date);
        if($state){
            Log::write('执行成功'.$state->id);
            $job->delete();
        }else{
            Log::write('重新执行');
            $job->release(1);
        }

    }



    /**
     * 执行的内容
     */
    public function test_add($data){
        $sum=mt_rand(10,99);
        $name=$data['name'].$sum;
        $state = User::create(['name'=>$name,'phone'=>'187829228'.$sum,'test'=>'消息队列测试'.$sum]);
        return $state;
    }

    /**
     * @param $data
     */
    public function failed($data){


    }

}