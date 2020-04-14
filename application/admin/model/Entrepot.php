<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2020/4/14
 * Time: 15:23
 */
namespace app\admin\model;

use think\Model;

class Entrepot extends Model{


    /**
     * 获取资源
     */
    public static function img($id){
        $url='';
        $img = self::where('id',$id)->value('url');
        if($img){
            $url =WebSetting::FILE_PATH.$img;

        }
        return $url;
    }



    /**
     * 删除资源
     */
    public static function del_img($id,$type=1){
        $img = self::where('id',$id)->value('url');
        if($img){
            $url =WebSetting::FILE_PATH.$img;
            if(is_file($url)){
                unlink($url);
            }
        }
        $state=true;
        if($type ==1){
            $state =self::destroy($id);
        }
        return $state;
    }







}