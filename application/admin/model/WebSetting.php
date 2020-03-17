<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2020/3/17
 * Time: 10:34
 */
namespace app\admin\model;


use think\Model;

class WebSetting extends Model{

    //系统配置
    const STEYE_SETTING = 'web_key';

    /**
     * content获取器
     */
    public function getContentAttr($value){
        if($value){
            $value = json_decode($value,true);
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






}