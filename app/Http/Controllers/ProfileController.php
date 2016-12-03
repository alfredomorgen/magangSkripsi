<?php

namespace App\Http\Controllers;

use App\Jobseeker;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

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
}
