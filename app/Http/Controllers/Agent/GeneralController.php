<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Business;
use App\BusinessDetail;
use App\BusinessFile;
use App\BankingDetail;
use App\Agent;
use Auth;
use Illuminate\Support\Facades\Input;
use View;
use Redirect;
use Hash;
use Mail;
use Session;
use URL;


class GeneralController extends Controller
{
    
    public function profile(Request $request)
    {
    	return view::make('agent.profile');
    }

    public function add_banking(Request $request)
    {
    	return view::make('agent.add_banking');
    }

    public function submit_bankingdetail(Request $request)
    {

    	$insert=new BankingDetail($request->all());
    	$insert->userid=Auth::guard('agent')->user()->id;
    	$save=$insert->save();

    	if($save)
    	{
    		return redirect::route('agent.profile')->with('success','Your banking details were submitted successfully.');
    	}
    	else
    	{
    		return redirect::route('agent.profile')->with('error','Something went wrong, please try again later');
    	}
    }


    public function changepasswordForm(Request $request)
    {
    	$id=decrypt($request->id);
        return view::make('agent.passwordreset',compact('id'));
    }

    public function resetpassword(Request $request)
    {

        $id=decrypt($request->id);
        $exist=Agent::find($id);
        if($exist)
        {
            $exist->password=Hash::make($request->password);
            $update=$exist->save();
            if($update)
            {
                $errors = ['status' => 'Password is set successfully.'];
                return redirect::route('agent.profile')->withErrors($errors)->with('success','Password is set successfully');
            }
            else
            {
                $errors = ['status' => 'Something went wrong, Please try later.'];
                return redirect::route('agent.profile')->withErrors($errors)->with('error','Something went wrong, Please try later.');
            }
        }
        else
        {
                $errors = ['status' => 'Data is not exist, Please contact admin.'];
                return redirect::route('agent.profile')->withErrors($errors)->with('error','Data is not exist, Please contact admin.');
        }
    }

    public function delete_bankdetail(Request $request)
    {
    	$userid=Auth::guard('agent')->user()->id;
    	$delete=BankingDetail::where('userid',$userid)->delete();
    	if($delete)
    	{
    		$errors = ['status' => 'Your banking information has been removed.'];
    		return redirect::back()->with('success','Your banking information has been removed')->withErrors($errors);
    	}
    	else
    	{
    		$errors = ['status' => 'something went wrong.'];
    		return redirect::back()->with('error','something went wrong')->withErrors($errors);
    	}
    }

    public function edit_profile(Request $request)
    {
        return view::make('agent.edit_profile');
    }


    public function remove_pic(Request $request)
    {
        $id=Auth::guard('agent')->user()->id;
        $update=Agent::find($id);
        $update->image='';
        $updated=$update->save();
        if($updated)
        {
            return response('success','200');
        }
        else
        {
            return response('error','500');
        }
    }

    
    public function change_profile(Request $request)
    {
        if ($request->file !='') 
         {
                $rand=rand(1,1000);
                // Set the destination path
                $destinationPath = public_path().'/agentimage';
                // Get the orginal filname or create the filename of your choice
                $filename = str_replace(' ', '_', $request->file->getClientOriginalName());
                $filename=$rand.''.$filename;
                $request->file->move($destinationPath, $filename);
        }   
        else
        {
            $filename='';
        }

        $id=Auth::guard('agent')->user()->id;
        $update=Agent::find($id);
        $update->image=$filename;
        $updated=$update->save();
        if($updated)
        {
            return response('success','200');
        }
        else
        {
            return response('error','500');
        }
    }


    public function update_profile(Request $request)
    {

        $id=Auth::guard('agent')->user()->id;
        $update=Agent::find($id);
        $update->name=$request->name;
        $update->middlename=$request->middlename;
        $update->lastname=$request->lastname;
        $update->company_name=$request->company_name;
        $update->socail_security_number=$request->socail_security_number;
        $update->tax_id=$request->tax_id;
        $update->phone_number=$request->phone_number;
        $update->email=$request->email;
        $update->email2=$request->email2;
        $update->address=$request->address;
        $update->address2=$request->address2;
        $update->city=$request->city;
        $update->state=$request->state;
        $update->pincode=$request->pincode;
        $save=$update->save();
        if($save)
        {
            return redirect::route('agent.profile')->with('success','Your account edited successfully');
        }
        else
        {
            return redirect::back()->with('error','Something went wrong, try again later');
        }


    }




}
