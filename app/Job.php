<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $table = 'jobs';
    protected $primaryKey = "id";

    protected $fillable = [
        'company_id',
        'jobcategory_id',
        'title',
        'type',
        'salary',
        'period',
        'benefit',
        'requirement'
    ];

}
