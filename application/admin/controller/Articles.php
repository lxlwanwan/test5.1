<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2020/3/16
 * Time: 15:36
 */
namespace app\admin\controller;

use app\admin\model\Article;
use app\admin\model\Classify;
use app\admin\model\Entrepot;
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

        $this->assign('list',Article::lists(input()));
        $this->assign('type',Classify::class_list());
        $this->assign('start',input('start'));
        $this->assign('end',input('end'));
        $this->assign('name',input('name'));
        $this->assign('pid',input('pid'));
        return $this->fetch();
    }


    /**
     * 添加文章
     * @return mixed
     */
    public function add_article(){
        if(Request::isGet()){
            $this->assign('type',Classify::class_list([0]));
            return $this->fetch();
        }
        $state = Article::add_text(input());
        return $state;
    }



    /**
     * 编辑文章
     * @return mixed
     */
    public function edit_article(){
        $a = Entrepot::del_img(1);
        dump($a);die;
        $one = Article::get(input('id'));
        if(Request::isGet()){
            $this->assign('type',Classify::class_list([0]));
            $this->assign('one',$one);
            return $this->fetch();
        }
        $state = Article::add_text(input(),$one);
        return $state;
    }


    /**
     * 删除文章
     */
    public function del_article(){
        $state =Article::del_art(input('id'));
        return $state;
    }




}