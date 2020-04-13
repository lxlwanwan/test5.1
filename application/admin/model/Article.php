<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2020/4/13
 * Time: 14:11
 */
namespace app\admin\model;

use think\facade\Cookie;
use think\Model;

class Article extends Model{


    /**
     * content获取器
     */
    public function getImgAttr($value){
        if($value){
            $value =WebSetting::FILE_PATH.$value;
            return $value;
        }
        return '';
    }

    /**
     * content获取器
     */
    public function getTypeNameAttr($value,$data){
        $value ='';
        if($data['pid']>0){
            $value =Classify::where('id',$data['pid'])->value('name');
        }
        return $value;
    }


    /**
     * 文章列表
     * @param $input
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public static function lists($input){
        $where=[];
        $query=[];
        if(isset($input['name']) && $input['name']){
            $where[]=['name','like','%'.$input['name'].'%'];
            $query['name'] =$input['name'];
        }
        if(isset($input['pid']) && $input['pid']){
            $where[]=['pid','eq',$input['pid']];
            $query['pid'] =$input['pid'];
        }
        if(isset($input['start']) && $input['start']){
            $start=['start','eq',$input['start']];
            $query['start'] =$input['start'];
        }
        if(isset($input['end']) && $input['end']){
            $end=['end','eq',$input['end']];
            $query['end'] =$input['end'];
        }else{
            $end = strtotime(date('Y-m-d',time()).'+1 day');
        }
        if(isset($input['start']) && $input['start']){
            $where[]=['time','between',[$start,$end]];
        }
        $list =self::where($where)->field('*')->order('time','desc')->paginate(30,false,['query'=>$query]);
        return $list;
    }




    /**
     * 添加文章
     */
    public static function add_text($input=[],$one=[]){
        if(empty($input)){
            return json(['err'=>201,'msg'=>'参数错误']);
        }
        $data=[];
        if(isset($input['name']) && $input['name']){
            $data['name']=$input['name'];
        }
        if(isset($input['img']) && $input['img']){
            $data['img']=$input['img'];
        }
        if(isset($input['keyword']) && $input['keyword']){
            $data['keyword']=$input['keyword'];
        }
        if(isset($input['description']) && $input['description']){
            $data['description']=$input['description'];
        }
        if(isset($input['content']) && $input['content']){
            $data['content']=$input['content'];
        }
        if(isset($input['pid']) && is_numeric($input['pid'])){
            $data['pid']=$input['pid'];
        }
        if(isset($input['order']) && is_numeric($input['order'])){
            $data['order']=$input['order'];
        }
        if(isset($input['state']) && is_numeric($input['state'])){
            $data['state']=$input['state'];
        }
        if (isset($input['id'])){
            $data['update_time'] = time();
            $state = self::where('id',$input['id'])->update($data);
            $txt ='更新了名称为：'.$one['name'].'文章';
        }else{
            $data['time'] = time();
            $state =self::create($data);
            $txt ='添加了名称为：'.$data['name'].'文章';
        }
        if($state){
            LogList::add_log(Cookie::get('admin'),$txt);
            return json(['err'=>200,'msg'=>'操作成功']);
        }else{
            return json(['err'=>201,'msg'=>'操作失败']);
        }

    }




}