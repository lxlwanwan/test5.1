<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2020/3/17
 * Time: 10:34
 */
namespace app\admin\model;


use think\facade\Cookie;
use think\Model;

class WebSetting extends Model{

    //系统配置
    const STEYE_SETTING = 'web_key';

    const FILE_PATH=DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR;

    /**
     * content获取器
     */
    public function getContentAttr($value){
        if($value){
            $value = json_decode($value,true);
            if(isset($value['logo'])){
                $value['img'] =self::FILE_PATH.$value['logo'];
            }
            return $value;
        }
        return [];
    }


    /**
     * 获取详情
     */
    public static function get_detail($key){
        $detail=self::where('key',$key)->find();
        return $detail;
    }


    /**
     * 添加或修改
     */
    public static function add_edit($input=[]){
        if(empty($input)){
            return json(['err'=>201,'msg'=>'参数错误']);
        }
        $data=[];
        $key='';
        foreach ($input as $j=>$v){
            if($j != 'key'){
                $data[$j]=$v;
            }else{
                $key=$v;
            }
        }
        if($data && $key){
            $data = json_encode($data);
            $find = self::where('key',$key)->find();
            if($find){
                $state = self::where('key',$key)->update(['content'=>$data]);
            }else{
                $state = self::create(['key'=>$key,'content'=>$data]);
            }
            if($state){
                LogList::add_log(Cookie::get('admin'),'编辑了网站配置');
                return json(['err'=>200,'msg'=>'编辑成功']);
            }else{
                return json(['err'=>201,'msg'=>'编辑失败']);
            }
        }else{
            return json(['err'=>201,'msg'=>'参数错误']);
        }
    }






}