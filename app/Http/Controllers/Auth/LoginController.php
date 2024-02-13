<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
Use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showSuperAdminLoginForm(){

        return view('Server.SuperAdmin.Auth.login');
    }

    public function UserLoginPost(Request $request){

        return $request->all();

    }

    // public function UserRegistrationPost(Request $request){

    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8','confirmed'],
    //         'phone' => ['required','unique:users'],
    //         'designation' => ['required'],
    //         'institute' => ['required'],
    //     ]);

    //     // dd('ok');


    //     $store = new User();
    //     $store->name = $request->name;
    //     $store->email = $request->email;
    //     $store->phone = $request->phone;
    //     $store->designation = $request->designation;
    //     $store->institute = $request->institute;
    //     $store->password = $request->password;
    //     $store->save();

        
    //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    //         return redirect('/home');
    //     }
    
    //     return back()->withInput($request->only('email', 'remember'));


    //     // return $request->all();

    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
