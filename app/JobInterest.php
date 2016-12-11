<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobInterest extends Model
{
    protected $table = 'jobinterest';
    protected $primaryKey = "id";

    protected $fillable = [
        'user_id',
        'jobcategory_id',
        'name',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo('\App\User');
    }

    public function job()
    {
        return $this->belongsTo('App\Job');
    }
}
