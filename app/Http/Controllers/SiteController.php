<?php

namespace App\Http\Controllers;

use App\Job;

class SiteController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('created_at', 'desc')->paginate(5);
        $data = [
            'jobs' => $jobs,
        ];
        return view('home', $data);
    }

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
