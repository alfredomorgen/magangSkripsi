<?php

namespace App\Http\Controllers;

use App\Job;
use App\Jobseeker;
use App\Constant;
use App\Transaction;
use App\User;

use App\Http\Requests\CompanyRequest;
use App\Http\Requests\Post_jobRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Psy\Test\CodeCleaner\ValidClassNamePassTest;

class CompanyController extends Controller
{
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('company', ['except' => [
            'index',
        ]]);
    }

    public function index($user_id)
    {
        $user = User::find($user_id);
        if($user != null && $user->role == Constant::user_company){
            $jobs = $user->company->job;
            $data = [
                'user' => $user,
                'jobs' => $jobs,
            ];
            return view('company.profile', $data);
        } else {
            return redirect('/');
        }
    }

    public function edit($user_id){
        $user = User::find($user_id);
        if($user != null){
            $data = ['user' => $user];
            return view('company.profile_edit', $data);
        } else {
            return redirect('/');
        }
    }

    public function update($user_id, CompanyRequest $request)
    {
        $user = User::find($user_id);
        if ($user != null) {
            $user->phone = $request->get('phone');
            $user->description = $request->get('description');

            if ($request->has('password')) {
                $user->password = bcrypt($request->get('password'));
            }

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photo_name = md5(uniqid()) . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path() . '/images/', $photo_name);
                $user->photo = $photo_name;
            }

            $user->save();
            return redirect()->route('company.index', $user_id);
        } else {
            return redirect('/');
        }
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
        $job->status = Constant::status_active;
        $job->save();

        return redirect('/company/manage_post')->with('success', 'New Job Added');
    }

    public function manage_post()
    {
        $job = Job::select('*')
            ->where('company_id', '=', Auth::user()->company->id)
            ->orderBy('created_at','desc')
            ->paginate(10);
        $data = [
            'jobs' => $job
        ];
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

    public function manage_post_close($id)
    {
        $job = Job::find($id);
        $job->status = Constant::status_inactive;
        $job->save();
        return redirect('/company/manage_post/')->with('success', 'Job Closed');
    }

    public function view_post()
    {
        $job = Job::select('*')
            ->where('company_id','=',Auth::user()->company->id)
            ->paginate(3);

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

    public function view_candidate($id)
    {
        $transaction = Job::find($id)->transaction;
        $data = ['transactions' => $transaction];

        return view('company.candidate',$data);
    }

    public function view_resume($id)
    {
       $resume = Jobseeker::find($id)->resume;

        return response()->file(public_path().'\\uploads\\'.$resume);
    }

    public function approve($id)
    {
        $transaction = Transaction::find($id);

        $transaction->status = Constant::status_active;
        $transaction->save();

        return back();
    }
}
