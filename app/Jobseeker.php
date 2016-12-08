<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jobseeker extends Model
{
    use SoftDeletes;
    protected $table = 'jobseekers';
    protected $primaryKey ='id';
    protected $fillable = [
        'user_id',
        'gender',
        'dob',
        'cv',
        'gpa',
        'major',
        'university'
    ];
    public function user()
    {
        return $this->belongsTo('\App\User');
    }

    public function transaction()
    {
        return $this->hasMany('\App\Transaction');
    }
}
