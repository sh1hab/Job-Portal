<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Job;

class Company extends Model
{
    //
    protected $guarded=[];

    function jobs(){
        return Company::hasMany('App\Job');
    }

    function User(){
        return User::belongsTo('App\User');
    }
}
