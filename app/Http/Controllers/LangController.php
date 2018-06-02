<?php

namespace App\Http\Controllers;

use App\Lang;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LangController extends Controller
{


    public function lang()
    {
        $langs=Lang::all();
        $arr=array('langs'=>$langs);
        return view('auth.register',$arr);
    }
    public function userProfile()
    {
//        $id=Auth::user()->id;
//        $user_profile=User::find($id);
//        $profile=Profile::find($id);
//        if (!$profile) {
//            $profile = new Profile();
//            $profile->user_id = $id;
//        }
//        $arr=array(
//            'user_profile'=>$user_profile,
//            'profile' => $profile,
//        );
//        return view('profile.accountsettings',$arr);
        return redirect('profile/'.Auth::user()->name);
    }
}
