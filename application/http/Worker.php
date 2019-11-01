<?php
namespace app\http;

use think\facade\Env;
use think\worker\Server;

class Worker extends Server{

    protected $socket = 'http://0.0.0.0:2345';

    protected $option = [
        'count'		=> 4,
        'name'		=> 'liuxiao'
    ];

    /**
     * @param $connection
     * @param $data 客户端连接上发来的数据
     */
    public function onMessage($connection, $data)
    {
        $connection->send('测试！啦啦啦！');
    }


    public function onWorkerStart($worker){


    }

    /**
     * @param $worker
     * 设置Worker收到reload信号后执行的回调
     */
    public function onWorkerReload($worker){


    }

    /**
     * @param $connection
     * 当客户端与Workerman建立连接时(TCP三次握手完成后)触发的回调函数。每个连接只会触发一次onConnect回调。
     */
    public function onConnect($connection){

    }

    /**
     * @param $connection
     * 当客户端连接与Workerman断开时触发的回调函数。不管连接是如何断开的，只要断开就会触发onClose。每个连接只会触发一次onClose
     */
    public function onClose($connection){

    }

    /**
     * @param $connection 连接对象
     * @param $code 错误码
     * @param $msg 错误消息
     * 当客户端的连接上发生错误时触发。
     */
    public function onError($connection, $code, $msg){
        echo "error [ $code ] $msg\n";
    }


}