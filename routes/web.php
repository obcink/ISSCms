<?php
/*
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
*/

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::any('admincp/index', 'Admincp\IndexController@index');//后台首页
Route::any('admincp/login', 'Admincp\IndexController@login');//后台登录
Route::group(
	[
		'middleware' => ['IsLogin', 'IsPermission'], 
		'namespace' => 'Admincp', 
		'prefix' => 'admincp'
	], function () {
		Route::get('permission/index', 'PermissionMemuController@index');//菜单列表
		Route::post('permission/create', 'PermissionMemuController@create');//添加
		Route::any('permission/update/{id}', 'PermissionMemuController@update');//修改
		Route::get('permission/destroy/{id}', 'PermissionMemuController@destroy');//删除
		
		Route::get('managerole/index', 'ManageRoleController@index');//角色列表
		Route::post('managerole/create', 'ManageRoleController@create');//添加
		Route::any('managerole/update/{id}', 'ManageRoleController@update');//修改
		Route::get('managerole/destroy/{id}', 'ManageRoleController@destroy');//删除
		Route::any('managerole/grant/{id}', 'ManageRoleController@grant');//授权
		
		Route::get('management/index', 'ManagementController@index');//管理列表
		Route::post('management/create', 'ManagementController@create');//添加
		Route::any('management/update/{id}', 'ManagementController@update');//修改
		Route::get('management/destroy/{id}', 'ManagementController@destroy');//删除
      
      	Route::get('basic/index', 'ConfigurationController@index');//基础配置
		Route::post('basic/create', 'ConfigurationController@create');//添加
		Route::any('basic/update/{id}', 'ConfigurationController@update');//修改
		Route::get('basic/destroy/{id}', 'ConfigurationController@destroy');//删除
      
      	Route::any('parameter/index/{id}', 'ParameterController@index');//配置选项
		Route::any('parameter/create', 'ParameterController@create');//添加
		Route::any('parameter/update', 'ParameterController@update');//修改
		Route::get('parameter/destroy/{id}', 'ParameterController@destroy');//删除
		
		Route::get('friendlink/index', 'FriendlinkController@index');//友链列表
		Route::post('friendlink/create', 'FriendlinkController@create');//添加
		Route::any('friendlink/update/{id}', 'FriendlinkController@update');//修改
		Route::get('friendlink/destroy/{id}', 'FriendlinkController@destroy');//删除
		
		Route::get('articlesort/index', 'ArticlesortController@index');//文章分类
		Route::post('articlesort/create', 'ArticlesortController@create');//添加
		Route::any('articlesort/update/{id}', 'ArticlesortController@update');//修改
		Route::get('articlesort/destroy/{id}', 'ArticlesortController@destroy');//删除
		
		Route::get('article/index', 'ArticleController@index');//文章列表
		Route::post('article/create', 'ArticleController@create');//添加
		Route::any('article/update/{id}', 'ArticleController@update');//修改
		Route::get('article/destroy/{id}', 'ArticleController@destroy');//删除

		Route::get('announcement/index', 'AnnouncementController@index');//通知公告
		Route::post('announcement/create', 'AnnouncementController@create');//添加
		Route::any('announcement/update/{id}', 'AnnouncementController@update');//修改
		Route::get('announcement/destroy/{id}', 'AnnouncementController@destroy');//删除
		
		Route::get('rotarybanner/index', 'RotaryBannerController@index');//轮播列表
		Route::post('rotarybanner/create', 'RotaryBannerController@create');//添加
		Route::any('rotarybanner/update/{id}', 'RotaryBannerController@update');//修改
		Route::get('rotarybanner/destroy/{id}', 'RotaryBannerController@destroy');//删除

		Route::get('member/index', 'MemberController@index');//会员列表
		Route::post('member/create', 'MemberController@create');//添加
		Route::any('member/update/{id}', 'MemberController@update');//修改
		Route::get('member/destroy/{id}', 'MemberController@destroy');//删除

		Route::get('membership/index', 'MembershipController@index');//会员等级
		Route::post('membership/create', 'MembershipController@create');//添加
		Route::any('membership/update/{id}', 'MembershipController@update');//修改
		Route::get('membership/destroy/{id}', 'MembershipController@destroy');//删除
		Route::any('membership/grant/{id}', 'MembershipController@grant');//审核(注册审核、注销审核)
		
		
		Route::get('loginout', 'IndexController@loginout');//登录退出
		Route::any('index', 'IndexController@index');//后台首页
		Route::get('background','OperationsLogController@index');//日志列表	
	}
);
