<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2020/3/16
 * Time: 15:36
 */
namespace app\admin\controller;

class Articles extends Common{



    /**
     * 分类列表
     */
    public function type_list(){


        return $this->fetch();
    }


    /**
     * 文章列表
     */
    public function article_list(){


        return $this->fetch();
    }



}