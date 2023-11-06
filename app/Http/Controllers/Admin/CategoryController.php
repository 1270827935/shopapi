<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Category;
use Illuminate\Http\Request;
use function App\cache_category;
use function App\cache_category_all;
use function App\forget_cache_category_all;

class CategoryController extends BaseController
{
    /**
     *  分类列表
     */
    public function index(Request $request)
    {
        $type = $request->input('type');
        if ($type == 'all') {
            return cache_category_all();
        } else {
            return cache_category();
        }
    }

    /**
     * 添加分类
     */
    public function store(Request $request)
    {
        $insertData = $this->checkInput($request);
        if (!is_array($insertData)) return $insertData;

        Category::create($insertData);

        return $this->response->created();
    }

    /**
     * 分类详情
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * 更新分类详情
     */
    public function update(Request $request, Category $category)
    {
        $updateData = $this->checkInput($request);
        if (!is_array($updateData)) return $updateData;

        $category->update($updateData);

        return $this->response->noContent();
    }

    /**
     * 验证提交的参数
     */
    protected function checkInput($request)
    {
        $request->validate([
            'name' => 'required|max:16',
        ], [
            'name.required' => '分类名称不能为空',
        ]);
        //获取分组
        $group = $request->input('group', 'goods');

        //获取pid
        $pid = $request->input('pid', 0);

        //计算level
        $level = $pid == 0 ? 1 : (Category::find($pid)->level + 1);//计算level

        //分类不超过3级
        if ($level > 3) return $this->response->errorBadRequest('不能超过三级分类');

        //封装数据
        return [
            'name' => $request->input('name'),
            'pid' => $pid,
            'level' => $level,
            'group' => $group
        ];
    }

    /**
     * 状态
     */
    public function status(Category $category)
    {
        $category->status = $category->status == 1 ? 0 : 1;
        $category->save();
        //更新需要刷新缓存
        forget_cache_category_all();
        return $this->response->noContent();
    }


}
