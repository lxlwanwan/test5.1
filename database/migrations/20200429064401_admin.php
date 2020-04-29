<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Admin extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
//    public function change()
//    {
//
//    }


    /**
     *
     */
    public function up()
    {
        $table=$this->table('admins',array('engine'=>'innodb'));
        $table->setId('id','int',['limit'=>10])
            ->addColumn('name','string',['limit'=>30,'comment'=>'管理员名称'])
            ->addColumn('password','string',['limit'=>225,'comment'=>'管理员密码'])
            ->addColumn('phone','string',['limit'=>11,'default'=>'','comment'=>'手机号'])
            ->addColumn('rule_id','string',['limit'=>2,'default'=>0,'comment'=>'管理员角色'])
            ->addColumn('time','string',['limit'=>10,'default'=>0,'comment'=>'创建时间'])
            ->addColumn('state','integer',['limit'=>2,'default'=>0,'comment'=>'状态：0正常，1禁用'])
            ->create();
    }


    public function down()
    {
        parent::down(); // TODO: Change the autogenerated stub
    }


}
