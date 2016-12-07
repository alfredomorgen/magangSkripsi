<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class JobseekerController extends Controller
{
    public function apply($id)
    {
        $transaction = Transaction::create([
            'job_id' => $id,
        ]);

        return redirect('/job/'.$id);
    }
}
