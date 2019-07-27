<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    function updateProfile(){
        $user=$this->user;
        return view('profile.index',compact('user'));
    }

    public function apply()
    {


        return redirect(route('jobs'));
    }
}
