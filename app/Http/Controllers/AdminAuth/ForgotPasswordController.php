<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Redirect;
use Hash;
use Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.guest');
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('admin.auth.passwords.email');
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('admins');
    }


    public function sendResetLinkEmail(Request $request)
    {

        $exist=Admin::where('email',$request->email)->first();
        if($exist)
        {
                $id= encrypt($exist->id); 

                $bodyMessage=url('/').'/admin/password/reset/'.$id;

                $data = array("bodymessage" => $bodyMessage, "email" => $request->email);

                Mail::send('mail.resetpasswordemail', $data, function($message) use ($data) {

                    $message->to($data['email'], $data['email'])

                            ->subject('Reset Password Email');

                    $message->from('admin@crm.com','CRM Portal');

                });

            return view('admin.auth.forgot_email');
        }
        else
        {
            $errors = ['email' => 'Your email address is not exist.'];
            return redirect::back()->withErrors($errors);
        }
    }
}
