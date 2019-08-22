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


namespace App\Http\Controllers\Admincp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManagementController extends Controller
{
    /**
     * [Index 列表]
     * @author   Reflux Lewse
     * @copyleft http://www.icoterie.top
     * @version  0.0.1
     * @datetime 2017-02-22T16:50:32+0800
     */

    public function index()
    {
		//PLAN 变量赋值

		//DO 开发需求：管理员列表

		//CHECK 变量确认 得到数据

		
		//ACTION 演进执行 数据操作
        $data = DB::table('icoterie_smart_admin_user')
			->orderBy('user_id', 'desc')
			->select('user_id','user_name','email','add_time','last_ip','last_login')
            ->paginate(15);
		$menu = DB::table('icoterie_smart_role')->where('status',1)->orderBy('role_id', 'asc')->get();
        return view('admincp/management/index', compact('data','menu'));
    }
	
	/**
     * [Create 添加]
     * @author   Reflux Lewse
     * @copyleft http://www.icoterie.top
     * @version  0.0.1
     * @datetime 2017-02-22T16:50:32+0800
     */
	public function create(Request $request)
	{
		if ($request -> method() == "POST") {//登录验证账号密码
            $icoterie_smart_form_request_data = $request -> except('_token');
			if(!empty($icoterie_smart_form_request_data['password'])){
				$icoterie_smart_form_request_data['ec_salt'] = rand(11111,99999);
				$icoterie_smart_form_request_data['password'] = Hash::make($icoterie_smart_form_request_data['ec_salt'] . $icoterie_smart_form_request_data['password']);
			}
			//dd($icoterie_smart_form_request_data);
			$icoterie_smart_form_data_create = DB::table('icoterie_smart_admin_user')->insert($icoterie_smart_form_request_data);
			
			if($icoterie_smart_form_data_create){
				$icoterie_smart_log = DB::table('icoterie_smart_admin_log')
					->insert([
						'user_id' => session('user')->user_id,
						'ip_address' => $_SERVER['REMOTE_ADDR'],
						'log_info' => '账号:' . session('user')->user_name . '添加管理员' . $icoterie_smart_form_request_data['user_name'] ,
						'log_time' => time()
					]);
				if($icoterie_smart_log){
					return redirect('admincp/management/index') -> with('msg', '添加成功');
				}else{
					return redirect('admincp/management/index') -> with('msg', '日志失败');
				}
			}else{
				return back() -> with('msg', '添加失败');
			}
		}
	}
	
	/**
     * [Update 更新]
     * @author   Reflux Lewse
     * @copyleft http://www.icoterie.top
     * @version  0.0.1
     * @datetime 2017-02-22T16:50:32+0800
     */
	public function update(Request $request,$id)
    {
		//PLAN 变量赋值

		//DO 开发需求：更新菜单

		//CHECK 变量确认 得到数据
		
		//ACTION 演进执行 数据操作
		if ($request -> method() == "POST") {
            $icoterie_smart_form_request_data = $request -> except('_token');
			if(!empty($icoterie_smart_form_request_data['password'])){
				$icoterie_smart_encryption_lenght = rand(3,9);
				$icoterie_smart_encryption_chars = 'ABCDEFGHIJKLMNPQRSTUVWXYZ0123456789abcdefghijkmnpqrstuvwxyz';
				$icoterie_smart_encryption_chars_lenght_max = strlen($icoterie_smart_encryption_chars) - 1;
				$icoterie_smart_encryption = '';
				mt_srand((double)microtime() * 1000000);
				for($i = 0; $i < $icoterie_smart_encryption_lenght; $i++){
					$icoterie_smart_encryption .= $icoterie_smart_encryption_chars[mt_rand(0, $icoterie_smart_encryption_chars_lenght_max)];
				}
				$icoterie_smart_form_request_data['ec_salt'] = $icoterie_smart_encryption;
				$icoterie_smart_form_request_data['password'] = Hash::make($icoterie_smart_encryption . $icoterie_smart_form_request_data['password']);
				
				//dd($icoterie_smart_form_request_data,$id,$icoterie_smart_encryption,$icoterie_smart_encryption_lenght,$icoterie_smart_encryption_chars_lenght_max);
				
			}
			//
			$icoterie_smart_form_data_update = DB::table('icoterie_smart_admin_user')
				->where('user_id',$id)
				->update($icoterie_smart_form_request_data);
			
			if($icoterie_smart_form_data_update){
				$icoterie_smart_log = DB::table('icoterie_smart_admin_log')
					->insert([
						'user_id' => session('user')->user_id,
						'ip_address' => $_SERVER['REMOTE_ADDR'],
						'log_info' => '账号:' . session('user')->user_name . '修改ID:'.$id.'管理员:' .$icoterie_smart_form_request_data['user_name'] ,
						'log_time' => time()
					]);
				if($icoterie_smart_log){
					return redirect('admincp/management/index') -> with('msg', '修改成功');
				}else{
					return redirect('admincp/management/index') -> with('msg', '日志失败');
				}
			}else{
				return back() -> with('msg', '修改失败');
			}
        } else {
			$data = DB::table('icoterie_smart_admin_user')->where('user_id', $id)->first();

			$menu = DB::table('icoterie_smart_role')->where('status',1)->orderBy('role_id', 'asc')->get();
			if(!empty($data)){
				$icoterie_smart_log = DB::table('icoterie_smart_admin_log')
					->insert([
						'user_id' => session('user')->user_id,
						'ip_address' => $_SERVER['REMOTE_ADDR'],
						'log_info' => '账号:' . session('user')->user_name . '读取ID:' . $data->role_id . '管理员' ,
						'log_time' => time()
					]);
				if($icoterie_smart_log){
					return view('admincp/management/update', compact('data','menu')) -> with('msg', '读取成功');
				}else{
					return back() -> with('msg', '日志失败');
				}
			}
        }
    }
	
	/**
     * [Destroy 删除]
     * @author   Reflux Lewse
     * @copyleft http://www.icoterie.top
     * @version  0.0.1
     * @datetime 2017-02-22T16:50:32+0800
     */
	public function destroy($id)
	{
		$icoterie_smart_form_data_delete = DB::table('icoterie_smart_admin_user')
			->where('user_id',$id)
			->update(['status'=>0]);
				
		if($icoterie_smart_form_data_delete){
			$icoterie_smart_log = DB::table('icoterie_smart_admin_log')
				->insert([
					'user_id' => session('user')->user_id,
					'ip_address' => $_SERVER['REMOTE_ADDR'],
					'log_info' => '账号:' . session('user')->user_name . '停用管理员 ID:' . $id ,
					'log_time' => time()
				]);
			if($icoterie_smart_log){
				return redirect('admincp/management/index') -> with('msg', '停用成功');
			}else{
				return redirect('admincp/management/index') -> with('msg', '日志失败');
			}
		}else{
			return back() -> with('msg', '停用失败');
		}
	}
}
