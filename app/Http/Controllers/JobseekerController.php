<?php

namespace App\Http\Controllers;

use App\Bookmark;
use App\Company;
use App\Constant;
use App\Transaction;
use App\User;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;


class JobseekerController extends Controller
{
    public function __construct()
    {
        $this->middleware('jobseeker', ['except' => [
            'index',
        ]]);
    }

    public function index($user_id){
        $user = User::find($user_id);
        if($user != null && $user->role == Constant::user_jobseeker){
            if(Auth::guest()){
                return redirect('/');
            } else if(Auth::user()->role == Constant::user_jobseeker && Auth::user()->id != $user->id){
                return redirect('/');
            }

            $data = ['user' => $user];
            return view('jobseeker.profile', $data);
        } else {
            return redirect('/');
        }
    }

    public function edit($user_id){
        $user = User::find($user_id);
        if($user != null){
            $data = ['user' => $user];
            return view('jobseeker.profile_edit', $data);
        } else {
            return redirect('/');
        }
    }

    public function update($user_id, UserRequest $request){
        $user = User::find($user_id);
        if($user != null){
            $user->phone = $request->get('phone');
            $user->description = $request->get('description');

            if($request->has('password')){
                $user->password = bcrypt($request->get('password'));
            }

            if($request->hasFile('photo')){
                $photo = $request->file('photo');
                $photo_name = md5(uniqid()).'.'.$photo->getClientOriginalExtension();
                $photo->move(public_path().'/images/', $photo_name);
                $user->photo = $photo_name;
            }

            if($request->hasFile('resume')){
                $resume = $request->file('resume');
                $resume_name = md5(uniqid()).'.'.$resume->getClientOriginalExtension();
                $resume->move(public_path().'/uploads/', $resume_name);
                $user->jobseeker->resume = $resume_name;

                $user->jobseeker->save();
            }

            $user->save();
            return redirect()->route('jobseeker.index', $user_id);
        } else {
            return redirect('/');
        }
    }

    public function apply($job_id)
    {
        $message = "";
        $transaction = null;
        $isTransactionExist = Transaction::where('job_id', '=', $job_id)
            ->where('jobseeker_id', '=', Auth::user()->jobseeker->id)
            ->first();

        if($isTransactionExist == null){
            $transaction = Transaction::create([
                'job_id' => $job_id,
                'jobseeker_id' => Auth::user()->jobseeker->id,
            ]);

            if($transaction == null){
                $message = "Failed to apply job...";
            } else {
                $message = "Job successfully applied!";
            }
        } else {
            $message = "You have already applied...";
        }

        $data = ['message' => $message];
        return redirect()->route('job.index', $job_id)->with($data);
    }

    public function applied_jobs()
    {
        $transactions = Transaction::where('jobseeker_id', Auth::user()->jobseeker->id)->paginate(10);
        $data = [
            'transactions' => $transactions,
        ];
        return view('jobseeker.applied_jobs', $data);
    }

    public function bookmark_index()
    {
        $bookmarks = Bookmark::where('user_id', Auth::user()->id)->paginate(10);
        $data = [
            'bookmarks' => $bookmarks,
        ];
        return view('jobseeker.bookmark', $data);
    }

    public function bookmark_add_company($user_id)
    {
        $message = "";
        $company = User::find($user_id)->company;
        $isBookmarkExist = Bookmark::where('user_id', '=', Auth::user()->id)
            ->where('target', '=', User::find($user_id))
            ->first();

        if($isBookmarkExist == null){
            $bookmark = Bookmark::create([
                'user_id' => Auth::user()->id,
                'target' => $company->id,
                'type' => Constant::user_company,
                'status' => Constant::status_active,
            ]);

            if($bookmark == null){
                $message = "Failed to bookmark company...";
            } else {
                $message = "Company successfully bookmarked!";
            }
        }

        $data = ['message' => $message];
        return redirect()->route('company.index', $user_id)->with($data);
    }

    public function bookmark_remove_company($user_id)
    {
        $message = "";
        $company = User::find($user_id)->company;
        $bookmark = Bookmark::where('user_id', '=', Auth::user()->id)
            ->where('target', '=', $company->id)
            ->first();

        if($bookmark->delete()){
            $message = "Company bookmark successfully removed!";
        } else {
            $message = "Failed to remove company bookmark...";
        }

        $data = ['message' => $message];
        return redirect()->route('company.index', $user_id)->with($data);
    }
}
