<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2020/3/16
 * Time: 11:19
 */
namespace app\admin\model;

use think\Db;
use think\facade\Cookie;
use think\facade\Request;
use think\Model;

class LogList extends Model{

    //管理员
    const Type_AMDIN=0;
    //用户
    const Type_USER=1;

    public static $types=['管理员','用户'];

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
        $arr['ip'] = Request::ip();
        $arr['time'] = time();
        $state =  self::create($arr);

        return $state;
    }


    /**
     * 日志列表
     */
    public static function data_list($input){
        $where=[];
        $query=[];
        if(isset($input['start_time']) && $input['start_time']){
            $start = strtotime($input['start_time']);
        }
        if(isset($input['end_time']) && $input['end_time']){
            $end = strtotime($input['end_time'])+86400;
        }
        if(isset($input['content']) && $input['content']){
            $where[]=['content','like','%'.$input['content'].'%'];
        }
        if(isset($start) && isset($end)){
            $where[]=['time','between',[$start,$end]];
        }
        $list = self::where($where)->order('time','desc')->paginate(30,false,['query'=>$query]);
        return $list;
    }



    /**
     * 删除
     */
    public static function del_all($id){
        if($id==0){
            $state =Db::name('log_list')->delete(true);
        }else{
            $state =self::destroy($id);
        }
        if($state){
            LogList::add_log(Cookie::get('admin'),'清空了日志列表');
            return json(['err'=>200,'msg'=>'操作成功']);
        }else{
            return json(['err'=>201,'msg'=>'操作失败']);
        }

    }


}