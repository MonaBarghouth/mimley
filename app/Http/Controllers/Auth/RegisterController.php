<?php
namespace App\Http\Controllers\Auth;

use App\Lang;
use App\Mail\VerifyEmail;
use App\Profile;
use App\User;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('SendEmailDone');
    }

    public function registerFrom()
    {
        $langs=Lang::all();
        $arr=array('langs'=>$langs);
        return view('auth.register',$arr);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'gender' => 'required',
            'phone' => 'required',
            'lang_id' => 'required',
            'birthday' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user= User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'phone' => $data['phone'],
            'lang_id' => $data['lang_id'],
            'birthday' => $data['birthday'],
            'password' => bcrypt($data['password']),
            'verifyToken' => Str::random(40),
        ]);


        $user_id=User::findOrFail($user->id);
        $this->sendEmail($user_id);
        $id=$user->id;
        $profile = new Profile();
        $profile->user_id = $id;
        $profile->save();


        return $user;
    }

    public function sendEmail($thisUser){
        Mail::to($thisUser->email)->send(new VerifyEmail($thisUser));
    }

    public function verifyEmail(){
        return view('email.verifyEmail');
    }
    public function SendEmailDone($email,$verifyToken){
        $user=User::where(['email'=>$email,'verifyToken'=>$verifyToken])->first();

        //  return $user;
        if ($user){
            User::where(['email'=>$email,'verifyToken'=>$verifyToken])->update(['status'=>1,'verifyToken'=>null]);
            return view('auth.login');

        }else{
            return 'User not found';
        }
    }
}



