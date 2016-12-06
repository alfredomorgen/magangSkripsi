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
    public function index($user_id){
        $user = User::find($user_id);
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
                $photo->move(public_path().'/images/', $photo_name);
                $user->photo = $photo_name;
            }

            $user->save();
            return redirect()->route('user.profile', $user_id);
        } else {
            return redirect('/');
        }
    }

    public function loginType($user_type)
    {
        $data = ['user_types' =>$user_type];
        return view('auth.login',$data);
    }
}
