<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2020/4/13
 * Time: 14:11
 */
namespace app\admin\model;

use think\Model;

class Article extends Model{




    public static function lists($input){
        $where=[];
        $query=[];
        $list =self::where($where)->field('*')->order('time','desc')->paginate(30,false,['query'=>$query]);
        return $list;
    }


}