<?php

namespace App\Http\Controllers\AgentAuth;

use App\Agent;
use App\Admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Mail;
use App\Notification;
use Hash;
use View;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/agent/success';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('agent.guest');
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:agents',
            'password' => 'required|min:6',
            'lastname' => 'required|max:255', 
            'socail_security_number' =>'required|max:255', 
            'phone_number'=> 'required|max:255',
            'address'=> 'required|max:255',
            'city'=> 'required|max:255',
            'state'=> 'required|max:255',
            'pincode'=> 'required|max:255',
            'upline'=> 'required|max:255',
            'agentid'=> 'required|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Agent
     */
    protected function create(array $data)
    {

        return Agent::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'middlename' => $data['middlename'], 
            'lastname' => $data['lastname'], 
            'company_name' => $data['company_name'],
            'socail_security_number' => $data['socail_security_number'], 
            'tax_id'=> $data['tax_id'], 
            'phone_number'=> $data['phone_number'],
            'email2'=> $data['email2'],
            'address'=> $data['address'],
            'address2'=> $data['address2'],
            'city'=> $data['city'],
            'state'=> $data['state'],
            'pincode'=> $data['pincode'],
            'upline'=> $data['upline'],
            'uplinetype'=>$data['uplinetype'],
            'compensation'=>$data['compensation'],
            'override'=>$data['compensation'],
            'agentid'=> $data['agentid'],
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm(Request $request)
    {
        $exist=Agent::where('email',$request->email)->first();

        if($exist == '')
        {
            if($request->usertype=='agent')
            {

                $upline=Agent::where('id',$request->username)->first();
                if($upline != '')
                {
                    
                    $upline=$upline->name;   
					return View::make('agent.auth.register',compact('upline'));
                }
				else
				{
						$upline ='' ;
						return View::make('agent.auth.register',compact('upline'));
				}
            }
            else
            {
                $upline=Admin::where('id',$request->username)->first();
                if($upline != '')
                {
                    $upline=$upline->name; 
					
					return View::make('agent.auth.register',compact('upline'));
                }
				else
				{
						$upline ='' ;
						return View::make('agent.auth.register',compact('upline'));
				}
            }
        }
        else
        {
            return view('agent.auth.exist');

        }
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */

    public function register(Request $request)
    {
        

            $this->validator($request->all())->validate();

            event(new Registered($user = $this->create($request->all())));

            if($user != '')
            {
                $id= encrypt($user->id); 

                $bodyMessage=url('/').'/agent/verifyemail/'.$id;

                $data = array("bodymessage" => $bodyMessage, "email" => $request->email);

                Mail::send('mail.send_verifyemail', $data, function($message) use ($data) {

                    $message->to($data['email'], $data['email'])

                            ->subject('Verify Email');

                    $message->from('admin@crm.com','CRM Portal');

                });


                if ($request->file!='') 
                 {
                        $destinationPath = public_path().'/file/contract_file';
                        // Get the orginal filname or create the filename of your choice
                        $filename2 = str_replace(' ', '_', $request->file->getClientOriginalName());
                        $request->file->move($destinationPath, $filename2);
                }   
                else
                {
                    $filename2='';
                }


                $update=Agent::find($user->id);
                $update->contract_file=$filename2;
                $update->save();

                if($request->uplinetype=="agent")
                {
                    $updateoverride=Agent::where('id',$request->upline)->update(['override'=>$request->override]);
                }

                $insert=new Notification();
                $insert->usertype='agent';
                $insert->userid=$request->upline;
                $insert->title='New agent register';
                $insert->message='your refer agent'. ($request->email).'register successfully, only verify email is pending';
                $insert->save();

                return redirect($this->redirectPath())->with('success','Email is send on your email');
            }
            else
            {
                return $this->registered($request, $user);
            }

    
    }

    public function success()
    {
        return view('agent.auth.register_sucess');
    }

    protected function guard()
    {
        return Auth::guard('agent');
    }
}
