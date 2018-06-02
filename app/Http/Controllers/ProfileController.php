<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use League\Flysystem\Exception;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function profile($username){
        //$profile=Profile::findOrfail($username);
        // $user=User::find($username);
        $profile = DB::table('users')
            ->leftJoin('profiles', 'profiles.user_id','users.id')
            ->where('users.username',$username)
            ->get();

//   $user=Profile::find(Auth::user()->id);
        $user=User::where('username',$username)->first();
        //  dd($user);

        if (count($profile)>0){

            $arr=array('profile'=>$profile,'user'=>$user);
            return view('profile.ProfilePage',$arr);
        }else{
            return back();
        }
        // dd($profile);

    }    public function settings(){
        return view('profile.accountsettings');
    }
//    public function test(){
//        return view('profile.test');
//    }

    public function editProfile(){
        $id=Auth::user()->id;
        $profile=Profile::find($id);
        $arr=array('profile'=>$profile);
        //dd($arr);
        return view('profile.accountsettings',$arr);
    }
    public function updateProfile(Request $request){
//        if ($request->hasFile('cover_pic')){
//            $filenameWithExtention = $request->file('cover_pic')->getClientOriginalName();
//            $fileName= pathinfo($filenameWithExtention,PATHINFO_FILENAME);
//            $extention=$request->file('cover_pic')->getClientOriginalExtension();
//            $fileStore=$fileName.'_'.time().'.'.$extention;
//            $path = $request->file('cover_pic')->move(base_path() . '/public/img/', $fileStore);
//
//        }
       $profile=Profile::find(Auth::user()->id);
        if (!$profile) {
            $profile = new Profile();
            $profile->user_id = Auth::user()->id;
        }
        $profile->nickname = $request->nickname;
        $profile->bio = $request->bio;
        $profile->work = $request->work;
        $profile->lacation = $request->lacation;
        $profile->save();
        /*
    Profile::where('user_id', Auth::user()->id)->update(array(
        'nickname' => $request->nickname,
        'bio' => $request->bio,
        'work' => $request->work,
        'lacation' => $request->lacation,
        //'cover_pic' => $request->hasFile('cover_pic') ? $fileStore : ''
    ));*/

     return redirect()->back();


    }

    public function editPersonal($id){

        $user_profile=User::find($id);
        $profile=Profile::find($id);
        if (!$profile) {
            $profile = new Profile();
            $profile->user_id = $id;
        }
        $arr=array(
            'user_profile'=>$user_profile,
            'profile' => $profile,
        );
        return view('profile.accountsettings',$arr);
    }

    public function updatePersonal(Request $request,$id){

        $user_profile=User::find($id);
        $user_profile->name=$request->name;
        $user_profile->username=$request->username;
        $user_profile->email=$request->email;
        $user_profile->phone=$request->phone;
        //$user_profile->lang=$request->lang;
        $user_profile->save();


        return back();
    }

    public function cahngepassowrd(){
        $user=User::find(Auth::user()->id);
        if (Hash::check(Input::get('password'),$user['password'])&&Input::get('newpassword')==Input::get('password_confirmation')){
            $user->password=bcrypt(Input::get('newpassword'));
            $user->save();
            session()->flash('success','Password change successfully');

            return back();
            //return back()->with('success','Password change successfully');

        }
        else{
            session()->flash('error','Opps..Password not changed!!');
            return back();
            // return back()->with('error','Opps..Password not changed!!');

        }
    }
}
