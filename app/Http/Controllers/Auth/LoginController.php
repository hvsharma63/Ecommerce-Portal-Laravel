<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Cart;
use Validator;

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
    // protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('layouts.admin.login');
    }
    public function login(Request $request)
    {
        $this->validateLogin($request);


        //  $v = Validator::make($request->all(), 
        //     [
        //         "email"=>'required',
        //         "password"=>'required',
        //     ]);
        // if ($v->fails())
        // {
        //     return redirect()->back()->withErrors($v->errors());
        // }
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/viewCart/cartProcess');
            // dd($request->user());
                // return $next($request);
        }else{
            return redirect()->back();
        }
    }
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
        // return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {

        Auth::logout();
        Session::forget('billingId');
        Session::forget('shippingId');
        // $this->guard()->logout();

        // $request->session()->invalidate();
        if (isset($request->view) && $request->view=="front") {
            return redirect(url('index'));
        }else{
            return redirect()->Route('login');
        }

    }
}
