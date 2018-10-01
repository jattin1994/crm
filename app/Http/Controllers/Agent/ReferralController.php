<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Business;
use App\BusinessDetail;
use App\BusinessFile;
use App\ReferLink;
use Auth;
use Illuminate\Support\Facades\Input;
use View;
use Redirect;
use Hash;
use Mail;
use Session;
use URL;


class ReferralController extends Controller
{
    
    public function referral()
    {
        session()->forget('sidebarid');
        session()->put('sidebarid','4');
        return view::make('agent.referral');
    }
    public function submit_referral(Request $request)
    {

                $bodyMessage=url('/').'/agent/referralregister/'.$request->name.'/'.$request->lastname.'/'.$request->email.'/'.$request->compensation.'/'.$request->username.'/agent/'.$request->override;

                $data = array("bodymessage" => $bodyMessage, "email" => $request->email);

                Mail::send('mail.send_referralemail', $data, function($message) use ($data) {

                    $message->to($data['email'], $data['email'])

                            ->subject('Register on Crm Portal Email');

                    $message->from('admin@crm.com','CRM Portal');

            });

                $insert=new ReferLink($request->all());
                $insert->link=$bodyMessage;
                $insert->save();
                
                return redirect::back()->with('success','Your referral has been sent.');

    }

    public function override(Request $request)
    {   
        $agent_compensation=Auth::guard('agent')->user()->override;

        $compensation=$request->compensationvalue;

        $override=$agent_compensation-$compensation;

        return view::make('agent.override_ajax',compact('compensation','override'));

    }

}
