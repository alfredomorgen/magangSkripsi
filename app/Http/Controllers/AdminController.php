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
use Illuminate\Http\Request;
use App\User;


class AdminController extends Controller
{
    public function indexCompany()
    {
        $company = User::select('*')
            ->where('role','=','1')
            ->paginate(2);
        $data = ['companies' => $company];
        return view('admin.search_company', $data);
        //return view('admin.search_company');
    }
    public function indexJobseeker()
    {
        $jobseeker = User::select('*')
            ->where('role','=','2')
            ->paginate(2);
        $data = ['jobseekers' => $jobseeker];
        return view('admin.search_jobseeker', $data);
        //return view('admin.search_company');
    }

    public function searchCompany($search)
    {

        $companies = User::select('*')
            ->where('name','LIKE', '%'.$search.'%')
            ->Where('role','=','1')
            ->orderBy('id')
            ->paginate(2);
        if (count($companies) == 0 ){
            return view('admin.search_company')
                ->with('message','Company not Found')
                ->with('search',$search);
        }else{
            return view('admin.search_company')
                ->with('companies',$companies)
                ->with('search','Looking for'.' '. $search);
        }
    }
    public function searchJobseeker($search)
    {

        $jobseekers = User::select('*')
            ->where('name','LIKE', '%'.$search.'%')
            ->Where('role','=','2')
            ->orderBy('id')
            ->paginate(2);
        if (count($jobseekers) == 0 ){
            return view('admin.search_jobseeker')
                ->with('message','Jobseeker not Found')
                ->with('search',$search);
        }else{
            return view('admin.search_jobseeker')
                ->with('jobseekers',$jobseekers)
                ->with('search','Looking for'.' '. $search);
        }
    }
}