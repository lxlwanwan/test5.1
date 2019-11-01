<?php
namespace app\index\command;

use app\index\model\User;
use think\console\Command;
use think\console\Input;
use think\console\Output;


class Test extends Command{

    /**
     * 定时任务
     * 网址：https://www.jianshu.com/p/61a7210fe267
     * https://blog.csdn.net/tianjingang1/article/details/82590531
     */
    // *号，左往右，秒时天周月
    //  * * * * * /usr/local/php/bin/php /home/www/tp5/think >/dev/null 2>&1 &   //每分钟执行一次
    protected function configure()
    {
        $this->setName('Test')->setDescription('测试定时任务');

    }


    protected function execute(Input $input,Output $output){

        $sum=mt_rand(10,99);
        $name='张三'.$sum;
        $time = date('Y-m-d H:i:s',time());
        $state = User::create(['name'=>$name,'phone'=>'187829228'.$sum,'test'=>'定时任务测试'.$time]);


    }


}