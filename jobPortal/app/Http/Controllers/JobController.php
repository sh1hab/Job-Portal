<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use App\Job as Job;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index(){
        $companies=Company::find( Auth::id() )->get();
        $jobs=Job::all();
        $user=User::find(Auth::id());
        return view('job.index',compact('jobs','user'));
    }

    public function create(){
        $companies=Company::find( Auth::id() )->get();
        return view('job.register',compact('companies',$companies));
    }

    public function store(Request $request){
        $data=$request->all();
        Job::create($data);
        return redirect(route('jobs'));
    }
}
