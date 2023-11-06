<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\SlideRequest;
use App\Models\Slide;
use App\Transformers\SliderTransformer;
use Illuminate\Http\Request;

class SlideController extends BaseController
{

    /**
     * 轮播图排序
     */
    public function seq(Request $request, Slide $slide)
    {
        $slide->seq = $request->input('seq', 1);
        $slide->save();
        return $this->response->noContent();
    }

    /**
     * 轮播图状态
     */
    public function status(Slide $slide)
    {
        $slide->status = $slide->status == 1 ? 0 : 1;
        $slide->save();
        return $this->response->noContent();
    }

    /**
     * 轮播图列表
     */
    public function index()
    {
        $slides = Slide::where('status', 1)->paginate(10);
        return $this->response->paginator($slides, new SliderTransformer());
    }

    /**
     * 新增轮播图
     */
    public function store(SlideRequest $request)
    {
        //查询最大的seq
        $max_seq = Slide::max('seq') ?? 0;
        $max_seq++;

        $request->offsetSet('seq', $max_seq);

        Slide::create($request->all());
        return $this->response->created();
    }

    /**
     * 轮播图详情
     */
    public function show(Slide $slide)
    {
        return $this->response->item($slide, new SliderTransformer());
    }

    /**
     * 轮播图更新
     */
    public function update(SlideRequest $request, Slide $slide)
    {
        $slide->update($request->all());
        return $this->response->noContent();
    }

    /**
     * 删除轮播图
     */
    public function destroy(Slide $slide)
    {
        $slide->delete();
        return $this->response->noContent();
    }
}
