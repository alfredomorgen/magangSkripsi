<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    protected  $table = 'companies';
    protected $primaryKey ='id';
    protected $fillable = [
        'user_id',
        'address',
        'website',
        'industry',
        'size'
    ];
    public function user()
    {
        return $this->belongsTo('\App\User');
    }
}
