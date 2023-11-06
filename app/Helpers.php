<?php

namespace App;


use App\Models\Category;

if (!function_exists('test_helper')) {
    function test_helper()
    {
        return 'This is a test helper function';
    }
}


/**
 * 所有分类选择属性返回
 */
if (!function_exists('categoryTree')) {
    function categoryTree($group = 'goods', $status = false)
    {
        $categories = Category::select(['id', 'pid', 'name', 'level', 'status'])
            ->when($status !== false, function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->where('group', $group)
            ->where('pid', 0)
            ->with([
                'children' => function ($query) use ($status) {
                    $query->select(['id', 'pid', 'name', 'level', 'status'])
                        ->when($status !== false, function ($query) use ($status) {
                            $query->where('status', $status);
                        });
                },
                'children.children' => function ($query) use ($status) {
                    $query->select(['id', 'pid', 'name', 'level', 'status'])
                        ->when($status !== false, function ($query) use ($status) {
                            $query->where('status', $status);
                        });
                },
            ])//嵌套关联，让子类去查找关联子类
            ->get();
        return $categories;
    }
}

/**
 * 缓存没被禁用的分类
 */
if (!function_exists('cache_category')) {
    function cache_category()
    {
        return cache()->rememberForever('cache_category', function () {
            return categoryTree('goods', 1);
        });
    }
}

/**
 * 缓存所有的分类
 */
if (!function_exists('cache_category_all')) {
    function cache_category_all()
    {
        return cache()->rememberForever('cache_category_all', function () {
            return categoryTree('goods');
        });
    }
}

/**
 * 清空所有分类的缓存
 */
if (!function_exists('forget_cache_category_all')) {
    function forget_cache_category_all()
    {
        cache()->forget('cache_category');
        cache()->forget('cache_category_all');
        cache()->forget('cache_category_menu');
        cache()->forget('cache_category_menu_all');
    }
}

/**
 * 阿里云oss路由配置
 */
if (!function_exists('oss_url')) {
    function oss_url($key)
    {
        return config('filesystems')['disks']['oss']['bucket_url'] . $key;
    }
}

/**
 * 缓存没被禁用的菜单
 */
if (!function_exists('cache_category_menu')) {
    function cache_category_menu()
    {
        return cache()->rememberForever('cache_category_menu', function () {
            return categoryTree('menu', 1);
        });
    }
}

/**
 * 缓存所以的菜单
 */
if (!function_exists('cache_category_menu_all')){
    function cache_category_menu_all(){
        return cache()->rememberForever('cache_category_menu_all',function (){
           return categoryTree('menu');
        });
    }
}



