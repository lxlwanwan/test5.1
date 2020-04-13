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
     * 文章列表
     * @param $input
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public static function lists($input){
        $where=[];
        $query=[];
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