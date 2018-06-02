<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Albums extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function users(){

        return $this->belongsToMany(User::class, 'albums_users', 'album_id', 'user_id');

    }
}
