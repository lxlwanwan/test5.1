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

    const SUPER_ADMIN=1;

    /**
     * 登陆
     */
    public static function log_in($input=[]){
        if(isset($input['name'])==false || isset($input['password'])==false){
            return json(['err'=>201,'msg'=>'参数不正确']);
        }
        $admin = self::where('name',$input['name'])->find()->toArray();
        if(empty($admin)){
            return json(['err'=>201,'msg'=>'管理员不存在']);
        }
        if($admin['state'] ==1){
            return json(['err'=>201,'msg'=>'账号禁止登陆']);
        }
        if(!password_verify($input['password'],$admin['password'])){
            return json(['err'=>201,'msg'=>'密码错误']);
        }
        Cookie::set('admin',$admin,7200);
        LogList::add_log($admin,'管理员登陆');
        return json(['err'=>200,'msg'=>'登陆成功']);
    }


    /**
     * 列表
     */
    public static function get_list(){

        $list = self::all();
        return $list;
    }


    /**
     * 单条
     */
    public static function get_detil($id){
        $detail = self::get($id);
        return $detail;
    }


    /**
     * 添加编辑
     */
    public static function edit_add($input=[]){
        if(empty($input)){
            return json(['err'=>201,'msg'=>'参数错误']);
        }
        $data=[];
        if(isset($input['name']) && $input['name']){
            $data['name']=$input['name'];
        }
        if(isset($input['password']) && $input['password']){
            $data['password']=password_hash($input['password'],PASSWORD_BCRYPT);
        }
        if(isset($input['photo']) && $input['photo']){
            $data['photo']=$input['photo'];
        }
        if(isset($input['rule_id']) && is_numeric($input['rule_id'])){
            $data['rule_id']=$input['rule_id'];
        }
        if(isset($input['state']) && is_numeric($input['state'])){
            $data['state']=$input['state'];
        }
        if(isset($input['id'])){
            $state = self::where('id',$input['id'])->update($data);
        }else{
            $state = self::create($data);
        }
        if($state){
            LogList::add_log(Cookie::get('admin'),'操作了管理员数据为：'.implode(',',$data));
            return json(['err'=>200,'msg'=>'操作成功']);
        }else{
            return json(['err'=>201,'msg'=>'操作失败']);
        }

    }





}