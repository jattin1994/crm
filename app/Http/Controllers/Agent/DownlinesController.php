<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Business;
use App\BusinessDetail;
use App\BusinessFile;
use App\Agent;
use Auth;
use Illuminate\Support\Facades\Input;
use View;
use Redirect;
use Hash;
use Mail;
use Session;
use URL;


class DownlinesController extends Controller
{
    
    public function downlines()
    {
    	session()->forget('sidebarid');
        session()->put('sidebarid','3');
        $id=Auth::guard('agent')->user()->id;
        $data=Agent::where('upline',$id)->get();
        return view::make('agent.downlines',compact('data'));
    }

    public function downline_detail($id)
    {
    	$data=Agent::find($id);
        return view::make('agent.downline_view',compact('data'));
    }

    public function compensation_change($id)
    {

        $data=Agent::find($id);
        return view::make('agent.compensation_change',compact('data'));
    }

    public function update_compensation(Request $request)
    {

        $id=$request->id;
        $adminid=Auth::guard('agent')->user()->id;
        $overrideupdate=Agent::find($adminid);                
        
        $update=Agent::find($id);
        $subtract=$request->compensation-$update->compensation;
        
        if($overrideupdate->override >= $subtract)
        {
                    

                        $update->compensation=$request->compensation;
                        $update->override=$update->override+$subtract;
                        $updated=$update->save();

                        $overrideupdate->override=$overrideupdate->override-$subtract;
                        $adminupdated=$overrideupdate->save();
                    
                    if($adminupdated)
                    {
                        return redirect::route('agent.downlines')->with('success','Add compensation value successfully');
                    }
                    else
                    {
                        return redirect::back()->with('error','something wrong, please try again later');
                    }


        }
        else
        {
            return redirect::back()->with('error','Your override value is less than this value');   
        }
    }




}
