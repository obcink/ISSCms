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
// +-----------------------------------------------------------------------------------------


namespace App\Http\Controllers\Admincp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Validator;
//use GuzzleHttp\Psr7\Response;

class IndexController extends Controller
{
    /**
    * [Index 首页]
    * @author   Reflux Lewse
    * @copyleft http://www.icoterie.top
    * @version  0.0.1
    * @datetime 2017-02-22T16:50:32+0800
    */

    public function index()
    {
		//PLAN 变量赋值

		//DO 开发需求：后台首页

		//CHECK 变量确认 得到数据

		//ACTION 演进执行 数据操作
    	return view('admincp/index/index');
    }
	
	/**
    * [Login 登录]
    * @author   Reflux Lewse
    * @copyleft http://www.icoterie.top
    * @version  0.0.1
    * @datetime 2017-08-16T16:44:32+0800
    */
	public function login(Request $request)
    {
		//PLAN 变量赋值
		$icoterie_smart_user ='';
		$icoterie_smart_user_id ='';
		$icoterie_smart_log_id ='';
		$icoterie_smart_where = [];
		$icoterie_smart_form_request_data = '';
		$icoterie_smart_user_password ='';
		
		//DO 开发需求：账号登录/创建初始账号及密码
		$icoterie_smart_user = DB::table('icoterie_smart_admin_user')->first();

		if(empty($icoterie_smart_user)){
            $icoterie_smart_salt = rand(11111,99999);
			$icoterie_smart_user_password = $icoterie_smart_salt . '000000';
			$icoterie_smart_user_create = DB::table('icoterie_smart_admin_user')
				->insert([
					'user_name' => 'admin',
					'password' => Hash::make($icoterie_smart_user_password),
					'action_list' => 'all',
					'lang_type' => 'cn',
					'agency_id' => 0,
					'suppliers_id' => 0,
					'role_id' => 0,
					'add_time' =>time(),
					'ec_salt' => $icoterie_smart_salt
				]);
			if(!empty($icoterie_smart_user_create)){
				$icoterie_smart_user = DB::table('icoterie_smart_admin_user')->where('user_id',$icoterie_smart_user_create->user_id)->first();
				session(['user' => $icoterie_smart_user]);
				$create_log['user_id'] = 0;//'system'
                $create_log['ip_address'] = $_SERVER['REMOTE_ADDR'];
                $create_log['log_info'] = '初始ID:' . $icoterie_smart_user->user_id . '账号:' . $icoterie_smart_user->user_name . '完成';
				$create_log['log_time'] = time();
                $icoterie_smart_log_id = DB::table('icoterie_smart_admin_log')::insert($create_log);	
			}
		}else if($icoterie_smart_user->ec_salt == 37936){
			$icoterie_smart_salt = rand(11111,99999);
			$icoterie_smart_user_update = DB::table('icoterie_smart_admin_user')
				->where('user_id',$icoterie_smart_user->user_id)
				->update([
					'password' => Hash::make($icoterie_smart_salt . '000000'),
					'ec_salt' => $icoterie_smart_salt
				]);
			if(isset($icoterie_smart_user_update)){
                $icoterie_smart_log = DB::table('icoterie_smart_admin_log')
					->insert([
						'user_id' => $icoterie_smart_user->user_id,
						'ip_address' => $_SERVER['REMOTE_ADDR'],
						'log_info' => '更新:' . $icoterie_smart_user->user_id . '账号:' . $icoterie_smart_user->user_name . '密码完成',
						'log_time' => time()
					]);
			}
		}

		//CHECK 变量确认 得到数据

		//ACTION 演进执行 数据操作
        if ($request -> method() == "POST") {//登录验证账号密码
            $icoterie_smart_form_request_data = $request -> except('_token');
			if(isset($icoterie_smart_form_request_data['user_name'])){
				$icoterie_smart_where['user_name'] = $icoterie_smart_form_request_data['user_name'];
			}
            $icoterie_smart_user = DB::table('icoterie_smart_admin_user')->where($icoterie_smart_where)->first();

            if (empty($icoterie_smart_user) || $icoterie_smart_user->user_name !== $icoterie_smart_form_request_data['user_name']) {
                return back() -> with('msg', '账号错误');
            }else{
				$icoterie_smart_user_password= $icoterie_smart_user->ec_salt . $icoterie_smart_form_request_data['password'];
				$icoterie_smart_user->ec_salt = rand(11111,99999);
			}
			
            if (Hash::check(rtrim($icoterie_smart_user_password), $icoterie_smart_user -> password)) {
				
				session(['user' => $icoterie_smart_user]);
				$icoterie_smart_log = DB::table('icoterie_smart_admin_log')
					->insert([
						'user_id' => $icoterie_smart_user->user_id,
						'ip_address' => $_SERVER['REMOTE_ADDR'],
						'log_info' => '账号:' . $icoterie_smart_user->user_name . '完成登录',
						'log_time' => time()
					]);
                return redirect('admincp/index') -> with('msg', '验证成功');
            } else {
                return back() -> with('msg', '密码错误');
            }
        } else {
			
            return view('admincp/index/login');
        }
    }
	
	/**
    * [Loginout 登出]
    * @author   Reflux Lewse
    * @copyleft http://www.icoterie.top
    * @version  0.0.1
    * @datetime 2017-08-16T17:16:32+0800
    */
    public function loginout()
    {
		//PLAN 变量赋值

		//DO 开发需求：后台首页

		//CHECK 变量确认 得到数据
		
		
		//ACTION 演进执行 数据操作
        $icoterie_smart_log = DB::table('icoterie_smart_admin_log')
			->insert([
					'user_id' => session('user')->user_id,
					'ip_address' => $_SERVER['REMOTE_ADDR'],
					'log_info' => '账号:' . session('user')->user_name . '退出登录',
					'log_time' => time()
			]);
		if($icoterie_smart_log){
			session(['user' => null]);
			session(['menu' => null]);
			session(['effective' => null]);
		}
        return redirect('admincp/login') -> with('msg', '退出成功');
    }
}
