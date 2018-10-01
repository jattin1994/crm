<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Hesto\MultiAuth\Traits\LogsoutGuard;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Redirect;
use Hash;
use Session;

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

    use AuthenticatesUsers, LogsoutGuard {
        LogsoutGuard::logout insteadof AuthenticatesUsers;
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = '/admin/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }


    public function login (Request $request)
    {
        $exist=Admin::where('email',$request->email)->first();
        if($exist)
        {
           $password=Hash::check($request->password, $exist->password);
           if($password)
            { 
                    $user=Auth::guard('admin')->loginUsingId($exist->id);
                    
                    if(!empty($request->remember))
                    {
                        Session::forget('adminrememberemail');
                        Session::push('adminrememberemail',$request->email);
                    }

                    return redirect('admin/index');
                    
            }
            else
            {
                    $errors = ['password' => 'password is wrong.'];
                    return redirect::back()->withErrors($errors);
            }

        }
        else
        {
            $errors = ['email' => 'Your email address is not in use.'];
            return redirect::back()->withErrors($errors);
        }
    }

     public function logout() 
    {
        if(Auth::guard('admin')->user())
        {
            Auth::guard('admin')->logout();
            return redirect('/admin/login');
        }
        else
        {
         return redirect('/admin/login');   
        }
    }

}
