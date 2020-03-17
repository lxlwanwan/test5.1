<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2020/3/16
 * Time: 15:34
 */
namespace app\admin\controller;

use app\admin\model\Admin;
use think\facade\Request;

class Administrator extends Common{


    /**
     * 管理列表
     */
    public function lists(){
        if(Request::isGet()){
            $this->assign('list',Admin::get_list());
            return $this->fetch();
        }
    }



}