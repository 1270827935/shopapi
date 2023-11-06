<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        //添加之前情况缓存
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        //添加权限
        $permissions = [
          //权限名字需要唯一，刚好路由名字也是唯一，采用路由名字
            ['name'=>'users.index','cn_name'=>'用户列表','guard_name'=>'api'],
            ['name'=>'users.show','cn_name'=>'用户详情','guard_name'=>'api'],
            ['name'=>'users.lock','cn_name'=>'用户状态','guard_name'=>'api'],
        ];

        // 添加权限
        foreach ($permissions as $p){
            Permission::create($p);
        }

        //添加角色
        $role = Role::create(['name'=>'rootadmin','cn_name'=>'超级管理员','guard_name'=>'api']);

        //为角色添加权限，所有权限给到超级管理员
        $role->givePermissionTo(Permission::all());
    }

}
