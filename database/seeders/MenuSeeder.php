<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use function App\forget_cache_category_all;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 填充菜单数据
        $menus = [
            [
                'name' => '用户管理',
                'group' => 'menu',
                'pid' => 0,
                'level' => 1,
                'children' => [
                    [
                        'name' => '用户列表',
                        'group' => 'menu',
                        'level' => 2,
                    ],
                ]
            ],
            [
                'name' => '分类管理',
                'group' => 'menu',
                'pid' => 0,
                'level' => 1,
                'children' => [
                    [
                        'name' => '分类列表',
                        'group' => 'menu',
                        'level' => 2,
                    ],

                ]
            ],
            [
                'name' => '商品管理',
                'group' => 'menu',
                'pid' => 0,
                'level' => 1,
                'children' => [
                    [
                        'name' => '商品列表',
                        'group' => 'menu',
                        'level' => 2,
                    ],
                ]
            ],
            [
                'name' => '评价管理',
                'group' => 'menu',
                'pid' => 0,
                'level' => 1,
                'children' => [
                    [
                        'name' => '评价列表',
                        'group' => 'menu',
                        'level' => 2,
                    ],
                ]
            ],
            [
                'name' => '订单管理',
                'group' => 'menu',
                'pid' => 0,
                'level' => 1,
                'children' => [
                    [
                        'name' => '订单列表',
                        'group' => 'menu',
                        'level' => 2,
                    ],
                ]
            ],
            [
                'name' => '轮播管理',
                'group' => 'menu',
                'pid' => 0,
                'level' => 1,
                'children' => [
                    [
                        'name' => '轮播图列表',
                        'group' => 'menu',
                        'level' => 2,
                    ],
                ]
            ],
            [
                'name' => '菜单管理',
                'group' => 'menu',
                'pid' => 0,
                'level' => 1,
                'children' => [
                    [
                        'name' => '菜单列表',
                        'group' => 'menu',
                        'level' => 2,
                    ],
                ]
            ]
        ];

        //循环菜单数组,插入数据库
        foreach ($menus as $one) {
            $children = $one['children'];//在删掉之前赋值
            unset($one['children']);//删掉children这个字段
            $one_menu = Category::create($one);//创建菜单分类
            //采用模型的方法，根据pid与id的关联自动插入二级菜单
            $one_menu ->children()->createMany($children);
        }
        //在执行迁移成功之后调用清空所有缓存的方法
        forget_cache_category_all();
    }
}
