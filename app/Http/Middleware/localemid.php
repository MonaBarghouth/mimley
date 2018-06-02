<?php namespace App\Http\Middleware;

use Closure, Session, Auth;
use App;
class localemid {

    /**
     * The availables languages.
     *
     * @array $languages
     */
    protected $languages = ['ar','en','fr'];

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
// dd(Auth::user()->user_lang);
        if(Session::get('locale')==''){
            Session::put('locale', 'en');
            App()->setLocale(Session::get('locale'));
        }else{
            App()->setLocale(Session::get('locale'));
        }
        if(Session::get('locale')){

            App()->setLocale(Session::get('locale'));
        }
// App::setLocale(Auth::user()->user_lang);

        return $next($request);
    }

}


