<?php
namespace app\index\controller;

use think\Controller;
use think\Queue;

/**
 * 消息队列测试demo
 * tp5.1消息队列要配合supervisor使用，
 * 网址：https://blog.csdn.net/idkuangxiao/article/details/82765107
 *       https://blog.csdn.net/qq_34856247/article/details/86741533
 *       https://packagist.org/packages/topthink/think-queue#v2.0.4
 *      systemctl start supervisord 启动
 *      systemctl stop supervisord  停止
 *      systemctl restart supervisord  重启
 *          supervisorctl status 状态
 */
class News extends Controller{


    /**
     *
     */
    public function index(){

        $job='\app\index\job\Test';
        $name['name']='liuxiao';

        $state = Queue::push($job,$name,'a');
        dump($state);

        dump('6666666');die;
    }



}