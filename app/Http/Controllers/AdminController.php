<?php
/**
 * Created by PhpStorm.
 * User: Hashner
 * Date: 12/2/2016
 * Time: 11:23 PM
 */

namespace App\Http\Controllers;


use App\Company;
use App\Jobseeker;
use App\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;


class AdminController extends Controller
{
    public function deleteJob($id)
    {
        $job = Job::find($id);
//        $job->deleted_at = Carbon::now();
//        $job->save();
        $job->delete();
        return redirect('/admin/search_job');
    }

    public function deleteCompany($id)
    {
        $company= Company::find($id);

        $company->job()->delete();
        $company->delete();
        $company->user->delete();

        return redirect('/admin/search_company');
    }
    public function deleteJobseeker($id)
    {
        $jobseeker = Jobseeker::find($id);
        $jobseeker->delete();
        $jobseeker->user->delete();

        return redirect('/admin/search_jobseeker');
    }
}