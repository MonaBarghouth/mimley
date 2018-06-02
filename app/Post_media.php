<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post_media extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function post(){
        return $this->belongsTo('App\Post');
    }
}
