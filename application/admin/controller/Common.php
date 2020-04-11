<?php
namespace app\admin\controller;
use app\admin\model\WebSetting;
use think\App;
use think\Controller;
use think\facade\Cookie;
use think\facade\Env;
use think\facade\Request;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 2019/12/25
 * Time: 11:10
 */
class Common extends Controller{


    public function __construct(App $app = null)
    {
        parent::__construct($app);
        $user = Cookie::get('admin');
        if(empty($user)){
            $this->redirect('login/login');
        }
        $this->assign('admin',$user);
        $this->assign('ting',WebSetting::get_detail(WebSetting::STEYE_SETTING));
    }





    /**
     * 图片上传
     */
    protected function add_img($file,$type){
        $img_path = Env::get('root_path').'public/uploads/images';
        if(!file_exists($img_path)){
            //检查是否有该文件夹，如果没有就创建，并给予最高权限
            mkdir($img_path, 0777,true);
        }
        if($type ==0){
            $info = $file->validate(['ext'=>'jpg,png,gif'])->move($img_path);
            if($info){
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                return json(['err'=>200,'data'=>$info->getSaveName()]);
            }else{
                // 上传失败获取错误信息
                return json(['err'=>201,'data'=>$file->getError()]);
            }
        }else{
            $data=[];
            foreach($file as $img){
                // 移动到框架应用根目录/uploads/ 目录下
                $info = $img->validate(['ext'=>'jpg,png,gif'])->move($img_path);
                if($info){
                    $data[]=$info->getSaveName();
                }else{
                    $data[]=$file->getError();
                }
            }
            return json(['err'=>200,'data'=>$data]);
        }
    }












}