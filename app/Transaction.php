<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'jobseeker_id',
        'job_id',
        'status',
    ];
}
