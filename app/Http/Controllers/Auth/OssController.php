<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Storage;


class OssController extends BaseController
{
    public function token()
    {
        $disk = Storage::disk('oss');
        /**
         * 1.前缀如：'images/'
         * 2.回调服务器 url
         * 3.回调自定义参数，oss回传应用服务器时会带上
         * 4.当前直传配置链接有效期
         */
        $config = $disk->getAdapter()->signatureConfig($prefix = '/', $callBackUrl = '', $customData = [], $expire = 300);
        $configArr = json_decode($config,true);
        return $this->response->array($configArr);
    }
}
