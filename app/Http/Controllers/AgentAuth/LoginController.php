<?php

namespace App\Http\Controllers\AgentAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Hesto\MultiAuth\Traits\LogsoutGuard;
use Illuminate\Http\Request;
use App\Agent;
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
    public $redirectTo = '/agent/sales';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('agent.guest', ['except' => 'logout']);
    }



    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('agent.auth.login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('agent');
    }


     public function logout() 
    {
        if(Auth::guard('agent')->user())
        {
            Auth::guard('agent')->logout();
            return redirect('/agent/login');
        }
        else
        {
         return redirect('/agent/login');   
        }
    }

    public function verifyemail(Request $request)
    {
        $id=decrypt($request->id);
        $user=Agent::find($id);
        $user->status='1';
        $insert=$user->save();
        if($insert)
        {
            return view('agent.auth.confirm');
        }
        else
        {
         return route('agent/register');   
        }

    }

    public function login (Request $request)
    {
        $exist=Agent::where('email',$request->email)->first();
        if($exist)
        {
           $password=Hash::check($request->password, $exist->password);
           if($password)
            { 
                $verifyemail=Agent::where('email', $request->email)->where('status','>=','1')->first();
                if($verifyemail)
                {
                    $user=Auth::guard('agent')->loginUsingId($verifyemail->id);
                    if(!empty($request->remember))
                    {
                        Session::forget('rememberemail');
                        Session::push('rememberemail',$request->email);
                    }

                    return redirect('agent/sales');
                    
                }
                else
                {
                    $errors = ['status' => 'Please verify email address.'];
                    return redirect::back()->withErrors($errors);   
                }
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


}
