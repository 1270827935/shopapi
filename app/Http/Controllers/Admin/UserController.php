<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\User;
use App\Transformers\GoodTransformer;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    /**
     * 禁用用户
     */
    public function lock(User $user)
    {
        $user->is_locked = $user->is_locked == 0 ? 1 : 0;
        $user->save();
        return $this->response()->noContent();
    }

    /**
     * 用户列表
     */
    public function index(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');

        $users = User::when($name, function ($query) use ($name) {
            $query->where('name', 'like', "%$name%");
        })
            ->when($email, function ($query) use ($email) {
                $query->where('email', $email);
            })
            ->paginate(10);
        return $this->response()->paginator($users, new UserTransformer());
    }


    /**
     * 用户详情
     */
    public function show(User $user)
    {
        return $this->response()->item($user, new UserTransformer());
    }




}
