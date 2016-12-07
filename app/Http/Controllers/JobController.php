<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

use App\Http\Requests;

class JobController extends Controller
{
    public function index($id){
        $job = Job::find($id);
        $data = [
            'job' => $job,
        ];
        return view('company.view_job_detail', $data);
    }
}
