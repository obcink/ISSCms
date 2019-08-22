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

class ManageRoleController extends Controller
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

		
		//DO 开发需求：角色、权限列表

		//CHECK 变量确认 得到数据
		
		//ACTION 演进执行 数据操作
        $data = DB::table('icoterie_smart_role')
			->orderBy('role_id', 'desc')
            ->paginate(15);
		$menu = DB::table('icoterie_smart_role')->where('status',1)->orderBy('role_id', 'asc')->get();
        return view('admincp/managerole/index', compact('data','menu'));
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

			//dd($icoterie_smart_form_request_data);
			$icoterie_smart_form_data_create = DB::table('icoterie_smart_role')->insert($icoterie_smart_form_request_data);
			
			if($icoterie_smart_form_data_create){
				$icoterie_smart_log = DB::table('icoterie_smart_admin_log')
					->insert([
						'user_id' => session('user')->user_id,
						'ip_address' => $_SERVER['REMOTE_ADDR'],
						'log_info' => '账号:' . session('user')->user_name . '添加权限菜单' .$icoterie_smart_form_request_data['role_name'] ,
						'log_time' => time()
					]);
				if($icoterie_smart_log){
					return redirect('admincp/managerole/index') -> with('msg', '添加成功');
				}else{
					return redirect('admincp/managerole/index') -> with('msg', '日志失败');
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

			//dd($icoterie_smart_form_request_data,$id);
			$icoterie_smart_form_data_update = DB::table('icoterie_smart_role')
				->where('role_id',$id)
				->update($icoterie_smart_form_request_data);
			
			if($icoterie_smart_form_data_update){
				$icoterie_smart_log = DB::table('icoterie_smart_admin_log')
					->insert([
						'user_id' => session('user')->user_id,
						'ip_address' => $_SERVER['REMOTE_ADDR'],
						'log_info' => '账号:' . session('user')->user_name . '修改ID:'.$id.'角色:' .$icoterie_smart_form_request_data['role_name'] ,
						'log_time' => time()
					]);
				if($icoterie_smart_log){
					return redirect('admincp/managerole/index') -> with('msg', '修改成功');
				}else{
					return redirect('admincp/managerole/index') -> with('msg', '日志失败');
				}
			}else{
				return back() -> with('msg', '修改失败');
			}
        } else {
			$data = DB::table('icoterie_smart_role')->where('role_id', $id)->first();

			$menu = DB::table('icoterie_smart_role')->where('status',1)->orderBy('role_id', 'asc')->get();
			$grant = DB::table('icoterie_smart_backstage_menu')->where('status',1)->orderBy('sort', 'asc')->get();
			$role_grant = [];
			if(count(explode(',',$data->action_list))>1){
				$role_grant = explode(',', $data->action_list);
			}
			if(!empty($data)){
				$icoterie_smart_log = DB::table('icoterie_smart_admin_log')
					->insert([
						'user_id' => session('user')->user_id,
						'ip_address' => $_SERVER['REMOTE_ADDR'],
						'log_info' => '账号:' . session('user')->user_name . '读取ID:' . $data->role_id . '角色' ,
						'log_time' => time()
					]);
				if($icoterie_smart_log){
					return view('admincp/managerole/update', compact('data','menu','grant','role_grant')) -> with('msg', '读取成功');
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
		if ($request -> method() == "POST") {
			$icoterie_smart_form_data_delete = DB::table('icoterie_smart_role')
					->where('role_id',$id)
					->update(['status'=>0]);
			if($icoterie_smart_form_data_delete){
				$icoterie_smart_log = DB::table('icoterie_smart_admin_log')
					->insert([
						'user_id' => session('user')->user_id,
						'ip_address' => $_SERVER['REMOTE_ADDR'],
						'log_info' => '账号:' . session('user')->user_name . '停用角色ROLE ID:' . $id ,
						'log_time' => time()
					]);
				if($icoterie_smart_log){
					return redirect('admincp/managerole/index') -> with('msg', '停用成功');
				}else{
					return redirect('admincp/managerole/index') -> with('msg', '日志失败');
				}
			}else{
				return back() -> with('msg', '停用失败');
			}
		}
	}
	
	/**
     * [Grant 授权]
     * @author   Reflux Lewse
     * @copyleft http://www.icoterie.top
     * @version  0.0.1
     * @datetime 2017-02-22T16:50:32+0800
     */
	public function grant(Request $request,$id)
	{
		
		$icoterie_smart_form_data_delete = DB::table('icoterie_smart_role')
			->where('role_id',$id)
			->update(['status'=>0]);
		if($icoterie_smart_form_data_delete){
			$icoterie_smart_log = DB::table('icoterie_smart_admin_log')
				->insert([
					'user_id' => session('user')->user_id,
					'ip_address' => $_SERVER['REMOTE_ADDR'],
					'log_info' => '账号:' . session('user')->user_name . '停用角色ROLE ID:' . $id ,
					'log_time' => time()
				]);
			if($icoterie_smart_log){
				return redirect('admincp/managerole/index') -> with('msg', '停用成功');
			}else{
				return redirect('admincp/managerole/index') -> with('msg', '日志失败');
			}
		}else{
			return back() -> with('msg', '停用失败');
		}
	}
}
