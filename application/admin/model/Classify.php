<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2020/4/13
 * Time: 10:23
 */
namespace app\admin\model;

use think\facade\Cookie;
use think\Model;

class Classify extends Model{


    /**
     * @return mixed 获取分类列表
     */
    public static function class_list($state =[0,1]){

        $list = self::where('state','in',$state)->select();
        return $list;
    }


    /**
     * 添加编辑
     * @param array $input
     * @return \think\response\Json
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public static function edit_add($input=[]){
        if(empty($input)){
            return json(['err'=>201,'msg'=>'参数错误']);
        }
        $data=[];
        if(isset($input['name']) && $input['name']){
            $data['name']=$input['name'];
        }
        if(isset($input['order']) && is_numeric($input['order'])){
            $data['order']=$input['order'];
        }
        if(isset($input['state']) && is_numeric($input['state'])){
            $data['state']=$input['state'];
        }
        if (isset($input['id'])){
            $state = self::where('id',$input['id'])->update($data);
        }else{
            $data['time'] = time();
            $state =self::create($data);
        }
        if($state){
            LogList::add_log(Cookie::get('admin'),'编辑了分类数据：'.implode(':',$data));
            return json(['err'=>200,'msg'=>'操作成功']);
        }else{
            return json(['err'=>201,'msg'=>'操作失败']);
        }

    }



}