<?php

namespace App\Http\Controllers\Auth;

use App\Company;
use App\Constant;
use App\Jobseeker;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if($data['role']== Constant::user_jobseeker) {
            return Validator::make($data, [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'role' => 'required|in:2'
            ]);
        }elseif($data['role']==Constant::user_company){
            return Validator::make($data, [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'role' => 'required|in:1',
                'description' => 'required',
                'phone'=> 'required|numeric',
                'location' => 'required',
                'industry' => 'required',
                'website' => 'required'
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        if($data['role'] == Constant::user_company){
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'role' => $data['role'],
                'phone' => $data['phone'],
                'location' => $data['location'],
                'description' =>$data['description'],
                'status' => Constant::status_active,
            ]);
            Company::create([
                'user_id' => $user->id,
                'website' => $data['website'],
                'industry' => $data['industry'],
                'size' => $data['size'],
            ]);
        } else if($data['role'] == Constant::user_jobseeker){
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'role' => $data['role'],
                'status' => Constant::status_active,
            ]);
            Jobseeker::create([
                'user_id' => $user->id,
            ]);
        }

        return $user;
    }
}
