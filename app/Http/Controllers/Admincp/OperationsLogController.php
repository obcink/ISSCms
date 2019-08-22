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

class OperationsLogController extends Controller
{
    /**
     * [Index 首页]
     * @author   Devil
     * @copyleft http://www.icoterie.top
     * @version  0.0.1
     * @datetime 2017-02-22T16:50:32+0800
     */

    public function index()
    {
		//PLAN 变量赋值
		$start_time = '';
        $where1 = strtotime('1970-01-01');
		
		//DO 开发需求：后台首页

		//CHECK 变量确认 得到数据
		if (!empty($_GET['hj_start_time'])) {
            $where1 = strtotime($_GET['hj_start_time']);
            $start_time = $_GET['hj_start_time'];
        }
		
		//ACTION 演进执行 数据操作
        $data = DB::table('icoterie_smart_admin_log')
            ->whereBetween('log_time', [$where1, time()])
			->orderBy('log_id', 'desc')
            ->paginate(15);

        return view('admincp/index/log', compact('data', 'start_time', 'end_time'));
    }
	
}
