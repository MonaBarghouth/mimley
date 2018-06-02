<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Social extends Model
{
    use SoftDeletes;

    public function users(){

        return $this->belongsToMany(User::class, 'social_links', 'social_id', 'user_id');

    }
}
