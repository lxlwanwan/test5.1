<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2020/3/16
 * Time: 10:36
 */
namespace app\admin\model;
use think\facade\Cookie;
use think\Model;

class Admin extends Model{



    /**
     * 登陆
     */
    public static function log_in($input=[]){
        if(isset($input['name'])==false || isset($input['password'])==false){
            return ['err'=>201,'msg'=>'参数不正确'];
        }
        $admin = self::where('name',$input['name'])->find()->toArray();
        if(empty($admin)){
            return ['err'=>201,'msg'=>'管理员不存在'];
        }
        if($admin['state'] ==1){
            return ['err'=>201,'msg'=>'账号禁止登陆'];
        }
        if(!password_verify($input['password'],$admin['password'])){
            return ['err'=>201,'msg'=>'密码错误'];
        }
        Cookie::set('admin',$admin,7200);
        LogList::add_log($admin,'管理员登陆');
        return ['err'=>200,'msg'=>'登陆成功'];
    }










}