<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'nickname', 'bio', 'work','lacation'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
