<?php
namespace app\index\extend;

use app\index\extend\Text2;

class Text1 extends Text2{


    const TYPE_PAY=1;
    public static $pidFile= '/home/www/tp5/runtime/worker.pid';


    public function test(){
        $a= $this->tt();

        return $a;
    }



    private function ab($data){
        if($data){
            return 1111;
        }else{
            return 2222;
        }
    }


}