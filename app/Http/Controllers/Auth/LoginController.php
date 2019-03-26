<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(){
        return redirect('/');
    }

    public function showLoginAdmin(){
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $this -> validate($request, ['email' => 'required|email', 'password' => 'required']);
        $email = $request -> input('email');
        $password = $request -> input('password');
        if (!Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect() -> back() -> withErrors( 'لقد أدخلت بيانات غير صحيحة');
        }
        return redirect('/');
    }

    public function loginAdmin(Request $request){
        $this -> validate($request, ['email' => 'required|email', 'password' => 'required']);
        $email = $request -> input('email');
        $password = $request -> input('password');
        if (!Auth::attempt(['email' => $email, 'password' => $password], $request -> has('remember'))) {

            return redirect() -> back() -> withErrors( 'لقد أدخلت بيانات غير صحيحة');
        }
        elseif (Auth::user()->hasRole('admin')) {
            return redirect('/dashboard');
        }
    }

    public function logout(Request $request){
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }

    public function socialLogin($social){
        return Socialite::driver($social)->redirect();
    }

    public function handleprovidercallback($social){
        $usersocial=Socialite::driver($social)->user();
        $user=User::where(['email'=>$usersocial->getEmail()])->first();
        if ($user){
            Auth::login($user);
            return redirect()->action('HomeController@index');
        }
        else{
            return view('website.home',['name'=>$usersocial->getName(),'email'=>$usersocial->getEmail()]);
        }
    }
}
