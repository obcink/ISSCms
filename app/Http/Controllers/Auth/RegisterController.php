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

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
