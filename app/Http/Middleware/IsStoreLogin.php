<?php
// +----------------------------------------------------------------------
// | Icoterie Smart System 国内领先企业级智慧管理系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011~2099 IHFE Inc All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 辉丰时代教育科技河北有限责任公司
// +----------------------------------------------------------------------
// | copyleft http://www.icoterie.top
// +----------------------------------------------------------------------
// | version  0.0.1
// +----------------------------------------------------------------------
// | datetime 2016-12-01T21:51:08+0800
// +----------------------------------------------------------------------

namespace App\Http\Middleware;

use Closure;

class IsStoreLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session('storeuser')) {
            return $next($request);
        } else {
            return redirect('store/login') -> with('msg', '请先登录');
        }
    }
}
