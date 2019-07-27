<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ApplicantsController extends Controller
{
    public $user='';

    function __construct()
    {
        $user=User::find(Auth::id());
    }

    function profile(){
        $user=$this->user;
        return view('profile.index',compact('user'));
    }

    function updateProfile(Request $request){
        if ($request->file('profile_picture')->isValid()) {
            $profile_picture = $request->profile_picture->store('images');
        }
        if ($request->file('resume')->isValid()) {
            $resume = $request->resume->store('resume');
        }
        $user=User::find(Auth::id());
        $user->profile_picture=$profile_picture;
        $user->resume=$resume;
        $user->skills=$request->skills;
        $user->save();

        return redirect(route('jobs'));

    }

    public function apply(Request $request)
    {
        $user=User::find(Auth::id());

        if ( $user['resume']==null){
            return back();
        }
//        dd($request->all());
        $data=array();
        $data['job_id']=$request->job_id;
        $data['company_id']=$request->company_id;
        $data['applicant_id']=$user['id'];
        DB::table('jobs_applicants_companies')->insert($data);
        return redirect(route('jobs'));
    }
}
