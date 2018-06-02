<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','gender','phone','lang_id','birthday','verifyToken','status','username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function albums(){

            return $this->belongsToMany(Albums::class, 'albums_users', 'user_id', 'album_id');

    }

    public function socials(){

        return $this->belongsToMany(Social::class, 'social_links', 'user_id', 'social_id');

    }
    public function posts()
    {
        return $this->hasMany('App\Post')->orderBy('created_at','desc');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function getName()
    {
        if ($this->name && $this->username) {

            return "{$this->name}";
        } else {
            return null;
        }
    }

    public function getNameOrUsername()
    {
        return $this->getName() ?: $this->username;
    }


    public function friendOfMine()
    {
        return $this->belongsToMany('App\User', 'freinds', 'user_id', 'friend_id');
    }

    public function friendOf()
    {
        return $this->belongsToMany('App\User', 'freinds', 'friend_id', 'user_id');
    }

    public function friends()
    {
        return $this->friendOfMine()->wherePivot('status', 1)->get()
            ->merge($this->friendOf()->wherePivot('status', 1)->get());
    }

    public function friendRequest()
    {
        return $this->friendOfMine()->wherePivot('status', 0)->get();
    }

    public function friendRequestsPending()
    {
        return $this->friendOf()->wherePivot('status', 0)->get();
    }

    public function hasFriendRequestsPending(User $user)
    {
        return (bool)$this->friendRequestsPending()->where('id', $user->id)->count();
    }

    public function hasFriendRequestsRecieve(User $user)
    {
        return (bool)$this->friendRequest()->where('id', $user->id)->count();
    }

    public function addFriend(User $user)
    {
        $this->friendOf()->attach($user->id);
    }

    public function deleteFriend(User $user)
    {
        $this->friendOf()->detach($user->id);
        $this->friendOfMine()->detach($user->id);

    }

    public function acceptFreindRequest(User $user)
    {
        $this->friendRequest()->where('id', $user->id)->first()->pivot
            ->update([
                'status' => true,
            ]);
    }

    public function rejectFreindRequest(User $user)
    {
        $this->friendRequest()->where('id', $user->id)->first()->pivot
            ->update([
                'status' => 2,
            ]);
    }
    public function CancelRequest(User $user)
    {
        $this->friendOf()->detach($user->id);
        //$this->friendOfMine()->detach($user->id);

        /* $this->friendRequest()->where('id', $user->id)->first()->pivot
             ->update([
                 'status' => 2,
             ]);*/
    }

    public function isFriendWith(User $user)
    {
        return (bool)$this->friends()->where('id', $user->id)->count();
    }



}
