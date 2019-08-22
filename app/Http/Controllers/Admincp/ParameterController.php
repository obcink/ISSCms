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

class ParameterController extends Controller
{
    /**
     * [Index 列表]
     * @author   Reflux Lewse
     * @copyleft http://www.icoterie.top
     * @version  0.0.1
     * @datetime 2017-02-22T16:50:32+0800
     */

    public function index(request $request,$id)
    {
		//PLAN 变量赋值
		$where =[];
		$data=[];
		$icoterie_smart_site_options_name_array=[];
		$icoterie_smart_form='';

		//DO 开发需求：选项参数

		//CHECK 变量确认 得到数据
		if(!empty($id)){
			//$where['car.hj_end_time'] = ['car.hj_end_time', '>', strtotime($_GET['hj_end_time'])];
			$where['site_id'] = $id;
		}else{
			$where['site_id'] = 1;
		}
		//ACTION 演进执行 数据操作
		$icoterie_smart_site_options_data = DB::table('icoterie_smart_site_options')
			->where($where)
			->get();
		
		if ($request -> method() == "POST"){
			$icoterie_smart_form_request_data = $request -> except('_token');
			if(!empty($icoterie_smart_form_request_data)){
				$icoterie_smart_site_options_name_array = DB::table('icoterie_smart_site_options')->where($where)->pluck('option_name') ->toArray();
				
				foreach($icoterie_smart_form_request_data as $option_name=>$option_value){
					if(in_array($option_name,$icoterie_smart_site_options_name_array)){
						$icoterie_smart_form .= $this->update($id,$option_name,$option_value) . ',';
					}else{
						$icoterie_smart_form .= $this->create($id,$option_name,$option_value) . ',';
					}
					
				}
			}
			if(!empty($icoterie_smart_form) && count(explode(',',$icoterie_smart_form))>1){
				$icoterie_smart_form = explode(',', $icoterie_smart_form);
				if(in_array('success_c',$icoterie_smart_form)){
					return redirect('admincp/basic/update/' .$id) -> with('msg', '添加成功');
				}else if(in_array('success_u',$icoterie_smart_form)){
					return redirect('admincp/basic/update/' .$id) -> with('msg', '修改成功');
				}else{
					return redirect('admincp/parameter/index/' .$id) -> with('msg', '未曾添改');
				}
			}
			dd($icoterie_smart_form);
		}else{
			if(!empty($icoterie_smart_site_options_data)){
				foreach($icoterie_smart_site_options_data as $k=>$v){
					$option_name=$v->option_name;
					$data[$option_name]=$v->option_value;
				}
			}
			return view('admincp/parameter/index', compact('data','id'));
		}
    }
	
	/**
     * [Create 添加]
     * @author   Reflux Lewse
     * @copyleft http://www.icoterie.top
     * @version  0.0.1
     * @datetime 2017-02-22T16:50:32+0800
     */
	public function create($site_id,$option_name,$option_value)
	{
		//PLAN 变量赋值

		//DO 开发需求：添加选项

		//CHECK 变量确认 得到数据
		
		//ACTION 演进执行 数据操作
		$icoterie_smart_form_data_create = DB::table('icoterie_smart_site_options')
			->insert([
				'site_id'=>$site_id,
				'option_name'=>$option_name,
				'option_value'=>$option_value,
				'autoload'=>'yes'
			]);
			
		if($icoterie_smart_form_data_create){
			$icoterie_smart_log = DB::table('icoterie_smart_admin_log')
				->insert([
					'user_id' => session('user')->user_id,
					'ip_address' => $_SERVER['REMOTE_ADDR'],
					'log_info' => '账号:' . session('user')->user_name . '添加站点'. $site_id . '选项:' . $option_name,
					'log_time' => time()
				]);
			if($icoterie_smart_log){
				return 'success_c';
			}
		}else{
			return 'fail_c';
		}
	}
	
	/**
     * [Update 更新]
     * @author   Reflux Lewse
     * @copyleft http://www.icoterie.top
     * @version  0.0.1
     * @datetime 2017-02-22T16:50:32+0800
     */
	public function update($site_id,$option_name,$option_value)
    {
		//PLAN 变量赋值

		//DO 开发需求：更新选项

		//CHECK 变量确认 得到数据
		
		//ACTION 演进执行 数据操作
		$icoterie_smart_form_data_update = DB::table('icoterie_smart_site_options')
			->where('site_id',$site_id)
			->where('option_name',$option_name)
			->update([
				'option_value'=>$option_value
			]);
			
		if($icoterie_smart_form_data_update){
			$icoterie_smart_log = DB::table('icoterie_smart_admin_log')
				->insert([
					'user_id' => session('user')->user_id,
					'ip_address' => $_SERVER['REMOTE_ADDR'],
					'log_info' => '账号:' . session('user')->user_name . '添加选项'.$option_name.'值为:' . $option_value,
					'log_time' => time()
				]);
			if($icoterie_smart_log){
				return 'success_u';
			}
		}else{
			return 'fail_c';
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
		$icoterie_smart_form_data_delete = DB::table('icoterie_smart_site_options')
			->where('site_id',$id)
			->get();
		
		if($icoterie_smart_form_data_delete){
			foreach($icoterie_smart_form_data_delete as $k=>$v){
				DB::table('icoterie_smart_site_options')->where('option_id',$v->option_id)->delete();
			}
			$icoterie_smart_log = DB::table('icoterie_smart_admin_log')
				->insert([
					'user_id' => session('user')->user_id,
					'ip_address' => $_SERVER['REMOTE_ADDR'],
					'log_info' => '账号:' . session('user')->user_name . '停用站点 ID:' . $id ,
					'log_time' => time()
				]);
			if($icoterie_smart_log){
				return redirect('admincp/parameter/index') -> with('msg', '停用成功');
			}else{
				return redirect('admincp/parameter/index') -> with('msg', '日志失败');
			}
		}else{
			return back() -> with('msg', '停用失败');
		}
	}
}
