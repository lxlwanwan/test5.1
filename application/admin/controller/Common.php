<?php
namespace app\admin\controller;
use think\App;
use think\Controller;
use think\facade\Cookie;

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

        dump($user);
    }


}