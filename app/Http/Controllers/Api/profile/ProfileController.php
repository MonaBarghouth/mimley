<?php

namespace App\Http\Controllers\Api\Profile;

use App\Lang;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lang()
    {
        $langs=Lang::all();
        return response()->json($langs,200);
    }

    public function profile($username){
        //$profile=Profile::findOrfail($username);

        $profile = DB::table('users')
            ->leftJoin('profiles', 'profiles.user_id','users.id')
            ->where('users.username',$username)
            ->get();
        if (count($profile)>0){

            $arr=array('profile'=>$profile);
            return view('profile.ProfilePage',$arr);
        }else{
            return back();
        }
        // dd($profile);

    }
    public function settings(){
        return view('profile.accountsettings');
    }
//    public function test(){
//        return view('profile.test');
//    }

    public function editProfile(){
        $id=Auth::user()->id;
        $profile=Profile::find($id);
//        $arr=array('profile'=>$profile);
        //dd($arr);
//        return view('profile.accountsettings',$arr);
      return response()->json($profile,200);

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

//        return redirect()->back();
        return response()->json($profile,200);


    }

    public function editPersonal(){

        $user_profile=Auth::user();

        return response()->json($user_profile,200);

    }


    public function updatePersonal(Request $request){

        $user_profile=User::find(Auth::user()->id);
        $user_profile->name=$request->name;
        $user_profile->username=$request->username;
        $user_profile->email=$request->email;
        $user_profile->phone=$request->phone;
        $user_profile->gender=$request->gender;
        $user_profile->lang_id=$request->lang_id;
        $user_profile->birthday=$request->birthday;
        $user_profile->save();


        return response()->json($user_profile,200);
    }

    public function cahngePassowrd(){
        $user=User::find(Auth::user()->id);
        if (Hash::check(Input::get('password'),$user['password'])&&Input::get('newpassword')==Input::get('password_confirmation')){
            $user->password=bcrypt(Input::get('newpassword'));
            $user->save();
            session()->flash('success','Password change successfully');

//            return back();
            //return back()->with('success','Password change successfully');
            return response()->json($user,200);

        }
        else{
            session()->flash('error','Opps..Password not changed!!');
            return back();
            // return back()->with('error','Opps..Password not changed!!');

        }
    }
    public function doSearch(Request $request){
        $search= $request->dosearch;
        return $users=DB::table('users')
            ->where('name','like','%'.$search.'%')
            ->get();

    }
}
