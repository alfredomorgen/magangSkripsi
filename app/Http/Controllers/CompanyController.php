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
        $job->company_id = Auth::user()->company->id;
        $job->jobcategory_id = Input::get('jobcategory_id');
        $job->name = Input::get('name');
        $job->type = Input::get('type');
        $job->salary = Input::get('salary');
        $job->period = Input::get('period');
        $job->benefit = Input::get('benefit');
        $job->requirement = Input::get('requirement');
        $job->description = Input::get('description');
        $job->save();

        return redirect('/company/manage_post')->with('success', 'New Job Added');
    }

    public function manage_post()
    {
        $job = Job::select('*')->where('company_id', '=', Auth::user()->company->id)->paginate(3);
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
        $job->name = Input::get('name');
        $job->type = Input::get('type');
        $job->salary = Input::get('salary');
        $job->period = Input::get('period');
        $job->benefit = Input::get('benefit');
        $job->requirement = Input::get('requirement');
        $job->description = Input::get('description');
        $job->save();

        return redirect('/company/manage_post/')->with('success','Job Updated');
    }

    public function manage_post_delete($id)
    {
        $job = Job::find($id);
        $job->delete();
        return redirect('/company/manage_post/')->with('success', 'Job Deleted');
    }

    public function view_post()
    {
        $job = Job::select('*')->where('company_id','=',Auth::user()->company->id)->paginate(3);

        $data = ['jobs' => $job];

        return view('company.view_post_job',$data);
    }

    public function indexJobseeker()
    {
        $jobseeker = User::select('*')
            ->where('role','=','2')
            ->paginate(3);
        $data = ['jobseekers' => $jobseeker];
        return view('company.search_jobseeker', $data);
    }

    public function searchJobseeker($search)
    {

        $jobseekers = User::select('*')
            ->where('name','LIKE', '%'.$search.'%')
            ->Where('role','=','2')
            ->orderBy('id')
            ->paginate(3);
        if (count($jobseekers) == 0 ){
            return view('company.company_search_jobseeker')
                ->with('message','Jobseeker not Found')
                ->with('search',$search);
        }else{
            return view('company.company_search_jobseeker')
                ->with('jobseekers',$jobseekers)
                ->with('search','Looking for'.' '. $search);
        }
    }

    public function view_candidate()
    {
        return view('company.candidate');
    }
}
