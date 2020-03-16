<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2020/3/16
 * Time: 15:34
 */
namespace app\admin\controller;

class Administrator extends Common{


    /**
     * 管理列表
     */
    public function lists(){

        return $this->fetch();
    }



}