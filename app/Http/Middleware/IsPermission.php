<?php
// +----------------------------------------------------------------------------------------
// | Icoterie Smart System Intelligence Enterprise  Management System Priority Selective
// +----------------------------------------------------------------------------------------
// | Copyright (c) [2019] [Honor Full Epoch Educational Science Technology Hebei Co., Ltd.]
// | website  http://www.icoterie.top http://www.ihfe.top
// +----------------------------------------------------------------------------------------
// | [Icoterie Smart System] is licensed under the Mulan PSL v1.
// +----------------------------------------------------------------------------------------
// | You can use this software according to the terms and conditions of the Mulan PSL v1.
// +----------------------------------------------------------------------------------------
// | Licensed ( http://license.coscl.org.cn/MulanPSL )
// +----------------------------------------------------------------------------------------
// | THIS SOFTWARE IS PROVIDED ON AN "AS IS" BASIS, WITHOUT WARRANTIES OF ANY KIND, EITHER
// | EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO NON-INFRINGEMENT, MERCHANTABILITY OR
// | FIT FOR A PARTICULAR PURPOSE.
// +----------------------------------------------------------------------------------------
// | See the Mulan PSL v1 for more details.
// +----------------------------------------------------------------------------------------
// | Author: Reflux Lewse,Red Shadow Sue
// +----------------------------------------------------------------------------------------
// | version  0.0.1
// +----------------------------------------------------------------------------------------
// | datetime 2016-12-01T21:51:08+0800
// +----------------------------------------------------------------------------------------

namespace App\Http\Middleware;
use Closure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IsPermission
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

        $icoterie_smart_user_name = DB::table('icoterie_smart_admin_user')->where('user_id', session('user')->user_id)->value('user_name');

        $route = \Route::current()->getActionName();//路由规则

        switch ($route)//访问控制器
        {
            case 'App\Http\Controllers\Admincp\IndexController@index':
                $input['log_info'] = $icoterie_smart_user_name . '访问了后台首页';
                break;
			case 'App\Http\Controllers\Admincp\PermissionMemuController@index':
                $input['log_info'] = $icoterie_smart_user_name . '访问了权限菜单';
                break;
			case 'App\Http\Controllers\Admincp\ManageRoleController@index':
                $input['log_info'] = $icoterie_smart_user_name . '访问了角色列表';
                break;
			case 'App\Http\Controllers\Admincp\ManagementController@index':
                $input['log_info'] = $icoterie_smart_user_name . '访问了管理员列表';
                break;
			case 'App\Http\Controllers\Admincp\ParameterController@index':
                $input['log_info'] = $icoterie_smart_user_name . '访问了基本配置';
                break;
			case 'App\Http\Controllers\Admincp\FriendlinkController@index':
                $input['log_info'] = $icoterie_smart_user_name . '访问了友情链接';
                break;
			case 'App\Http\Controllers\Admincp\ArticlesortController@index':
                $input['log_info'] = $icoterie_smart_user_name . '访问了文章分类';
                break;
			case 'App\Http\Controllers\Admincp\ArticleController@index':
                $input['log_info'] = $icoterie_smart_user_name . '访问了文章类表';
                break;
			case 'App\Http\Controllers\Admincp\AnnouncementController@index':
                $input['log_info'] = $icoterie_smart_user_name . '访问了通知公告';
                break;
			case 'App\Http\Controllers\Admincp\RotaryBannerController@index':
                $input['log_info'] = $icoterie_smart_user_name . '访问了；轮播列表';
                break;
			case 'App\Http\Controllers\Admincp\MemberController@index':
                $input['log_info'] = $icoterie_smart_user_name . '访问了；会员列表';
                break;
			case 'App\Http\Controllers\Admincp\MembershipController@index':
                $input['log_info'] = $icoterie_smart_user_name . '访问了会员等级';
                break;

        }

        if (!empty($input['log_info'])){//菜单访问日志
			$input['log_time'] = time();
			$input['user_id'] = session('user')->user_id;
			$input['ip_address'] = $_SERVER['REMOTE_ADDR'];
            DB::table('icoterie_smart_admin_log')->insert($input);
        }

        $icoterie_smart_user_permissions = DB::table('icoterie_smart_role')
			->where('role_id', session('user')->role_id)
			->value('action_list');

		if(!empty($icoterie_smart_user_permissions) && $icoterie_smart_user_permissions =='all'){//管理员权限
			
		}else if(count(explode(',',$icoterie_smart_user_permissions))>1){//角色权限
			$icoterie_smart_user_permissions = explode(',', $icoterie_smart_user_permissions);

			$icoterie_smart_user_permissions_effective = [];
			$icoterie_smart_permissions_menu = [];
			$icoterie_smart_permissions = DB::table('icoterie_smart_backstage_menu')
				->orderBy('sort', 'asc')
				->orderBy('id', 'desc')
				->get();
			foreach ($icoterie_smart_permissions as $e => $r) {
				if(empty($r->pid)){$r->pid='';}
				if(empty($r->name)){$r->name='';}
				if(empty($r->url)){$r->url='';}
				if(empty($r->permission)){$r->permission='';}
				if(empty($r->ico)){$r->ico='';}
				if(empty($r->sort)){$r->sort='';}
				if(empty($r->status)){$r->status='';}
				$icoterie_smart_permissions[$e]=$r;
			}
			
			foreach ($icoterie_smart_permissions as $i => $c) {
				if($c->status == 1){//遍历有效菜单
					foreach ($icoterie_smart_permissions as $o => $t) {
						if($c->id == $t->pid  && $t->status == 1){//遍历出二级菜单
							$c->sub = true;
							break;
						}
					}
					$icoterie_smart_permissions_menu[] = $c;
				}
				
				if (in_array($c->id,$icoterie_smart_user_permissions) && !empty($c->permission)) {//遍历出权限
					$icoterie_smart_user_permissions_effective[] = $c->permission;
				}
			}

			if (in_array($route,$icoterie_smart_user_permissions_effective)) {//验证权限
				session(['menu' => $icoterie_smart_permissions_menu]);
				session(['effective' => $icoterie_smart_user_permissions_effective]);
				return $next($request);
			} else {
				session(['user' => null]);
				session(['menu' => null]);
				session(['effective' => null]);
				return redirect('admincp/login') -> with('msg', '没有权限');
			}
		}      
    }
}
