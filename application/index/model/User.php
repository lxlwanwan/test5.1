<?php
namespace app\index\model;
use think\Model;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 2019/11/1
 * Time: 17:33
 */
class User extends Model{


    /**
     * @return \think\model\relation\HasMany 1对多关联
     */
    public  function comments($id=[]){
        $where=[];
        if($id) {
            $where[] = ['id', 'eq', $id];
        }
        return $this->hasMany('post','uid','id')->where($where);
    }


}