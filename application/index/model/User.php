<?php
namespace app\index\model;

use think\Model;

class User extends Model{



    public static function set_one(){
        
    }


    public function has_one(){

        return  $this->hasOne('UserInfo','uid','id');
    }


    public function get_one($id){
        $user= User::get($id);
        $one = $user->has_one()->find();

        return $one;
    }


}