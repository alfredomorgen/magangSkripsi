<?php

namespace App\Http\Controllers;

use App\Company;
use App\Jobseeker;
use App\Job;
use App\User;
use App\Constant;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class SearchController extends Controller
{
    public function indexCompany()
    {
        $company = User::select('*')
            ->where('role', '=', '1')
            ->paginate(3);
        $data = ['companies' => $company];
        return view('admin.search_company', $data);
    }

    public function indexJobseeker()
    {
        $jobseeker = User::select('*')
            ->where('role', '=', '2')
            ->paginate(3);
        $data = ['jobseekers' => $jobseeker];
        return view('admin.search_jobseeker', $data);
    }

    public function indexJob()
    {
        $job = Job::withTrashed()->select('*')
            ->paginate(3);
        $data = ['jobs' => $job];
        return view('admin.search_job', $data);
    }

    public function searchJob($search)
    {
        $jobs = Job::select('*')
            ->where('title', 'LIKE', '%' . $search . '%')
            ->orderBy('id')
            ->paginate(3);
        if (count($jobs) == 0) {
            return view('admin.search_job')
                ->with('message', 'Job not Found')
                ->with('search', $search);
        } else {
            return view('admin.search_job')
                ->with('jobs', $jobs)
                ->with('search', 'Looking for' . ' ' . $search);
        }
    }

    public function searchCompany($search)
    {

        $companies = User::select('*')
            ->where('name', 'LIKE', '%' . $search . '%')
            ->Where('role', '=', '1')
            ->orderBy('id')
            ->paginate(3);
        if (count($companies) == 0) {
            return view('admin.search_company')
                ->with('message', 'Company not Found')
                ->with('search', $search);
        } else {
            return view('admin.search_company')
                ->with('companies', $companies)
                ->with('search', 'Looking for' . ' ' . $search);
        }
    }

    public function searchJobseeker($search)
    {

        $jobseekers = User::select('*')
            ->where('name', 'LIKE', '%' . $search . '%')
            ->Where('role', '=', '2')
            ->orderBy('id')
            ->paginate(3);
        if (count($jobseekers) == 0) {
            if (Auth::user()->role == constant::user_admin) {
                return view('admin.search_jobseeker')
                    ->with('message', 'Jobseeker not Found')
                    ->with('search', $search);
            } else if (Auth::user()->role == constant::user_company) {
                return view('company.company_search_jobseeker')
                    ->with('message', 'Jobseeker not Found')
                    ->with('search', $search);
            }
        } else {
            if (Auth::user()->role == constant::user_admin) {
                return view('admin.search_jobseeker')
                    ->with('jobseekers', $jobseekers)
                    ->with('search', 'Looking for' . ' ' . $search);
            } else if (Auth::user()->role == constant::user_company) {
                return view('company.company_search_jobseeker')
                    ->with('jobseekers', $jobseekers)
                    ->with('search', 'Looking for' . ' ' . $search);
            }

        }
    }
}
