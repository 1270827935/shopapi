<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Auth\LoginRequest;


class LoginController extends BaseController
{
    /**
     * 登录
     */
    public function login(LoginRequest $request)
    {
        $credentials = request(['email', 'password']);
        if (!$token = auth('api')->attempt($credentials)) {
            return $this->response()->errorUnauthorized();
        }

        //检查用户状态
        $user = auth('api')->user();
        if ($user->is_locked == 1){
            return $this->response->errorForbidden('该用户已禁用');
        }

        return $this->respondWithToken($token);
    }

    /**
     * 退出登录
     */
    public function logout()
    {
        auth('api')->logout();
        return $this->response->noContent();
    }

    /**
     * 刷新token
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * 返回格式
     */
    protected function respondWithToken($token)
    {
        //方法1
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
        //方法2
//        return $this->response()->array([
//            'access_token'=>$token,
//            'token_type'=>'Bearer',
//            'expires_in'=>auth('api')->factory()->getTTL()*60
//        ]);
    }

}

