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

    public function store(Post_jobRequest $request)
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
        $job->description = Input::get('description');
        $job->save();

        return redirect('/');
    }


    public function manage_post()
    {
        $columns = [
            'id',
            'title',
            'created_at',
        ];

        $job = Job::select('*')->paginate(3);

        $data = ['jobs' => $job];


        return view('company.manage_post', $data);
    }


    public function manage_post_edit($id)
    {
        $job = Job::find($id);
        $data = ['job' => $job];

        return view('company.manage_post_edit', $data);
    }

    public function manage_post_update($id)
    {
        $job = Job::find($id);
        $job->jobcategory_id = Input::get('jobcategory_id');
        $job->title = Input::get('title');
        $job->type = Input::get('type');
        $job->salary = Input::get('salary');
        $job->period = Input::get('period');
        $job->benefit = Input::get('benefit');
        $job->requirement = Input::get('requirement');
        $job->description = Input::get('description');
        $job->save();

        return redirect('/company/manage_post/');
    }

    public function manage_post_delete($id)
    {
        $job = Job::find($id);
        $job->delete();
        return redirect('/company/manage_post/')->with('success', 'Job Deleted');
    }

    public function view_post()
    {
        $columns = [
            'id',
            'title',
            'created_at',
        ];

        $job = Job::select('*')->paginate(3);

        $data = ['jobs' => $job];
        
        return view('/company/view_post_job',$data);
    }


}
