<?php

namespace App\Http\Controllers;

use App\Constant;
use App\Jobseeker;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{
    public function loginType($user_type)
    {
        $data = ['user_types' =>$user_type];
        return view('auth.login',$data);
    }

    public function registerType($user_type)
    {
        if($user_type=='1'){
            return view('auth.register_company');
        }elseif($user_type=='2') {
            return view('auth.register_jobseeker');
        }
    }

}
