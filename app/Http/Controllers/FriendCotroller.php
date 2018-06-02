<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FriendCotroller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('CheckTime');
    }
    public function getIndex($user_id){

        //if(Auth::check() && Auth::user()->id && Auth::user()->case=='child')

     //   {
        $friends=Auth::user()->myFriends($user_id);
          //  dd($friends);
        $requests=Auth::user()->friendRequest();

        $profile = DB::table('users')
            ->leftJoin('profiles', 'profiles.user_id','users.id')
            ->where('users.id',$user_id)
            ->get();
       // dd($profile);
        $arr=array('friends'=>$friends,'requests'=>$requests,'profile'=>$profile);
        return view('profile.ProfilePage',$arr);
//        return view('posts.view',$arr);
//
//}else{
   // return redirect()->back();
       // }
    }

    public function getAdd($username){
       // dd($username);
        $user=User::where('username',$username)->first();
        if(!$user){
            return redirect('ProfilePage')->with('info','That user could not be found');
        }
        //----- لو ما حطيته بطلع خطأ عند عملية الاضافة وفي الفيو نفس الشي موجود
//        if(Auth::user()->id !== $user->id){
//            return redirect()->back();
//        }
        //-----
        if (Auth::user()->hasFriendRequestsPending($user) || $user->hasFriendRequestsPending(Auth::user())){
         return redirect()->back()->with('info','Friend Request alredy pending');
        }
        if (Auth::user()->isFriendWith($user)){
            return redirect()->back()->with('info','You are aleady friend');
        }
        Auth::user()->addFriend($user);
        return redirect()->back()->with('info','Friend request sent');

    }

    public function getAccept($username){
//dd($username);
        $user=User::where('username',$username)->first();
        if(!$user){
            return redirect('ProfilePage')->with('info','That user could not be found');
        }
        if (!Auth::user()->hasFriendRequestsRecieve($user)){
            return redirect('ProfilePage');
        }
        Auth::user()->acceptFreindRequest($user);
        return redirect()->back();
    }
    public function getReject($username){
//dd($username);
        $user=User::where('username',$username)->first();
        if(!$user){
            return redirect('ProfilePage')->with('info','That user could not be found');
        }
        if (!Auth::user()->hasFriendRequestsRecieve($user)){
            return redirect('ProfilePage');
        }
        Auth::user()->rejectFreindRequest($user);
        return redirect()->back();
    }

    public function getCancel($username){
//dd($username);
        $user=User::where('username',$username)->first();
        if(!$user){
            return redirect('ProfilePage')->with('info','That user could not be found');
        }
        if (!Auth::user()->hasFriendRequestsPending($user)){
            return redirect('ProfilePage');
        }
        Auth::user()->CancelRequest($user);
        return redirect()->back();
    }


    public function deleteFriend($username){
        //dd($username);
        $user=User::where('username',$username)->first();
        if (!Auth::user()->isFriendWith($user)){
            return redirect()->back();
        }
        Auth::user()->deleteFriend($user);
        return redirect()->back()->with('info','You are aleady not friend');
    }
}
