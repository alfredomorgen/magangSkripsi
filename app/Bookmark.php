<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bookmark extends Model
{
    use SoftDeletes;
    protected $table = 'bookmarks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'target',
        'type',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo('\App\User');
    }
}
