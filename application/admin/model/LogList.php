<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2020/3/16
 * Time: 11:19
 */
namespace app\admin\model;

use think\facade\Request;
use think\Model;

class LogList extends Model{

    //管理员
    const Type_AMDIN=0;
    //用户
    const Type_USER=1;

    /**
     * 插入数据
     */
    public static function add_log($data=[],$content,$type=self::Type_AMDIN){
        if(empty($data) || empty($content)){
            return false;
        }
        $arr=[];
        $arr['uid']=$data['id'];
        $arr['name']=$data['name'];
        $arr['type']=$type;
        $arr['content'] =$content;
        $arr['id'] = Request::ip();
        $arr['time'] = time();
        $state =  self::update($arr);

        return $state;
    }




}