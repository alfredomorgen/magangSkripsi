<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    protected $table = 'jobcategories';
    protected $primaryKey = "id";

    protected $fillable = [
        'name',
        'status',
    ];

    public function job()
    {
        return $this->hasMany('\App\Job');
    }
}
