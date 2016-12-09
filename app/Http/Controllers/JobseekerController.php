<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;


class JobseekerController extends Controller
{
    public function index($id){
        $user = User::find($id);
        if($user != null){
            $data = ['user' => $user];
            return view('user.profile', $data);
        } else {
            return redirect('/');
        }
    }

    public function edit($user_id){
        $user = User::find($user_id);
        if($user != null){
            $data = ['user' => $user];
            return view('user.profile_edit', $data);
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
                //dd($photo_name);
                $photo->move(public_path().'/images/', $photo_name);
                $user->photo = $photo_name;
            }

            if($request->hasFile('resume')){
                //dd($request->file('resume'));
                $resume = $request->file('resume');
                $resume_name = md5(uniqid()).'.'.$resume->getClientOriginalExtension();
                $resume->move(public_path().'/uploads/', $resume_name);
                $user->jobseeker->resume = $resume_name;

                $user->jobseeker->save();
            }
//            if(\File::isfile($request['resume'])){
//                dd($request->file('resume'));
//            }
            $user->save();

            return redirect()->route('user.index', $user_id);
        } else {
            return redirect('/');
        }
    }

    public function apply($job_id)
    {
        $message = "";
        $transaction = null;
        $isTransactionExist = Transaction::where('job_id', '=', $job_id)->where('jobseeker_id', '=', Auth::user()->id)->first();

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

        $data = [
            'message' => $message,
        ];
        return redirect()->route('job.index', $id)->with($data);
    }
}
