<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class JobseekerController extends Controller
{
    public function index($user_id){
        return view('user.profile');
    }
}
