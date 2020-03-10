<?php
namespace app\admin\controller;


class Index extends Common {

    /**
     * @return mixed首页
     */
    public function index(){

        return $this->fetch();
    }

    /**
     * @return mixed 子页
     */
    public function welcome(){
        return $this->fetch();
    }
}