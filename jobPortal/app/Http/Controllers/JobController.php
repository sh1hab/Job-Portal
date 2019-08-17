<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Resources\Jobs;
use App\Http\Resources\JobsResource;
use App\User;
use Illuminate\Http\Request;
use App\Job as Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function index(){
        $jobs=Job::with(['company:id,business_name'])->paginate(5);
//        return view('job.index',compact('jobs'));
        return JobsResource::collection($jobs);
    }

    function edit(Job $job){
        return new JobsResource($job);
    }

    public function create(){
        $companies=DB::table('companies')->where('user_id',Auth::id())->get();
        return view('job.register',compact('companies',$companies));
    }

    public function store(Request $request){
        $data=$request->all();
        Job::create($data);
        return redirect(route('jobs'));
    }

    function destroy(Request $request){
        try {
            $job = Job::find($request->id);
            $job->delete();
            return response('ok');
        }catch (\Exception $exception){

        }
    }


}
