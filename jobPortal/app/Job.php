<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded=[];

    function company(){
        return $this->belongsTo(Company::Class);
    }
}
