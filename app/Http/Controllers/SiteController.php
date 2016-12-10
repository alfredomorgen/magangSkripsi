<?php

namespace App\Http\Controllers;

use App\Constant;
use App\Job;
use Illuminate\Http\Request;


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
    public function searchJob(Request $request)
    {
        $search = $request->input('search');
        $type = $request->input('type');
        $salary = $request->input('salary');
        $location = $request->input('location');

        $query = Job::where('name', 'LIKE', '%' . $search . '%')
            ->where('status',Constant::status_active);

        if($type != null){
            $query->where('type',$type);
        }
        if($salary != null){
            $query->where('salary',$salary);
        }
        if($location != null){
            $query->where('location', 'LIKE', '%' . $location . '%');
        }

        $jobs = $query->orderBy('id')->paginate(5);

        if (count($jobs) == 0) {
            return view('home')
                ->with('message', 'Job not Found')
                ->with('search', $search);
        } else {
            return view('home')
                ->with('jobs', $jobs)
                ->with('search', 'Looking for' . ' ' . $search);
        }
    }

}
