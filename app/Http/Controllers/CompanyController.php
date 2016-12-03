<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Psy\Test\CodeCleaner\ValidClassNamePassTest;
use App\Http\Requests\Post_jobRequest;
use App\Job;

class CompanyController extends Controller
{
    //

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('company');
    }

    public function post_job()
    {
        return view('company.post_job');
    }

    public function store(Request $request)
    {
        $job = new Job();
        $job->company_id = Auth::user()->id;
        $job->jobcategory_id = Input::get('jobcategory_id');
        $job->title = Input::get('title');
        $job->type = Input::get('type');
        $job->salary = Input::get('salary');
        $job->period = Input::get('period');
        $job->benefit = Input::get('benefit');
        $job->requirement = Input::get('requirement');
        $job->save();

        return redirect('/');
    }

}
