<?php
namespace app\index\validate;


use think\Validate;

class Import extends Validate{

    protected $regex=[
        'phone'=>'(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}','require'
    ];

    protected $rule=[
            'name' =>'require',
            'sex'  =>'in:1,2',
            'age'  =>'require|between:16,50',
            'test'=>'require',
            'phone'=>'require|regex:phone',
    ];

    //错误提示
    protected $message=[
            'name.require'=>'名称不能为空',
            'sex.in'=>'sex必须为1或者2',
            'age.require'=>'不能为空',
            'age.between'=>'age必须在16-50的范围',
            'test.require'=>'test不能为空',
            'phone.require'=>'手机格不能为空',
            'phone.regex'=>'手机格式不正确'
    ];


    protected $scene=[
        'member'=>['name','phone'],
        'detail'=>['sex','age']
    ];

}