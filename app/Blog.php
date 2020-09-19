<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $fillable =
    [
        'title',
        'content',
        'user_id',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
