<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2020/3/16
 * Time: 15:36
 */
namespace app\admin\controller;

use app\admin\model\Classify;
use think\facade\Request;

class Articles extends Common{



    /**
     * 分类列表
     */
    public function type_list(){

        $this->assign('list',Classify::class_list());
        return $this->fetch();
    }


    /**
     * 添加分类
     */
    public function add_type(){
        if(Request::isGet()){
            return $this->fetch();
        }
        $state = Classify::edit_add(input());
        return $state;
    }


    /**
     * 编辑分类
     */
    public function edit_type(){
        if(Request::isGet()){
            $this->assign('one',Classify::get(input('id')));
            return $this->fetch();
        }
        $state = Classify::edit_add(input());
        return $state;
    }


    /**
     * 文章列表
     */
    public function article_list(){


        return $this->fetch();
    }



}