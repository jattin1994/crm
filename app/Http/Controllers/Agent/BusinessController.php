<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Business;
use App\BusinessDetail;
use App\BusinessFile;
use App\Notification;
use Auth;
use Illuminate\Support\Facades\Input;
use View;
use Redirect;
use Hash;
use Mail;
use Session;
use URL;


class BusinessController extends Controller
{
    
    public function business(Request $request)
    {
        session()->forget('sidebarid');
        session()->forget('cart');
        session()->forget('cart1');
        session()->put('sidebarid','2');
        if(Auth::guard('agent')->user()->status == '1')
        {
            return redirect::back()->with('error','Your account is not contracted,please contact admin');
        }
        else
        {
    	   return view::make('agent.submit_new_business'); 
        }
    }
    
    public function business1(Request $request)
    {
    	$id=$request->id;
    	return view::make('agent.submit_new_business2',compact('id',$id));
    }
    
    public function business2(Request $request)
    {
    	$id=$request->id;
    	return view::make('agent.submit_new_business3',compact('id',$id));
    }
    public function upload_document(Request $request)
    {
        $id=$request->id;
        return view::make('agent.upload_saledocument',compact('id',$id));
    }

    public function add_business(Request $request)
    {
        $user=Auth::guard('agent')->user();
        $exist=Business::where('userid',$user->id)->where('usertype','agent')->where('email',$request->email)->first();
        if($exist == '')
        {

        	$insert=new Business($request->all());
        	$save=$insert->save();
        	if($save)
        	{
        		return redirect('/agent/business1/'.$request->id)->with('success','Client added successfully.');
        	}
        	else
        	{
        		return redirect::back()->with('error','Something went wrong, please try later');	
        	}
        }
        else
        {
            return redirect::back()->with('error','Client information(Email Id) is already exist on table.');   
        }
    }

    public function edit_business(Request $request)
    {
    	session()->put('previous_url', URL::previous());
    	$data=Business::where('id',$request->id)->first();
    	if($data)
    	{
    		return view::make('agent.edit_business',compact('data',$data));
    	}
    	else
    	{
    		return redirect::back()->with('error','Something went wrong, please try later');	
    	}
    }

    public function update_business(Request $request)
    {
    	$update=Business::find($request->id);
    	$update->name=$request->name;
        $update->lastname=$request->lastname;
    	$update->social=$request->social;
    	$update->phone=$request->phone;
    	$update->phone1=$request->phone1;
    	$update->email=$request->email;
    	$update->email1=$request->email1;
    	$update->birthday=$request->birthday;
    	$update->address=$request->address;
    	$update->address1=$request->address1;
    	$update->country=$request->country;
    	$update->state=$request->state;
    	$update->city=$request->city;
    	$update->pincode=$request->pincode;
        $update->correspondence=$request->correspondence;
        $update->middlename=$request->middlename;
        $update->lastname=$request->lastname;
    	$save=$update->save();

    	if($save)
    	{	
    		if((session::get('previous_url')) !='')
    		{
    			$url=session::get('previous_url');

    			return redirect($url)->with('success','Client was added successfully');	
    		}
    		else
    		{
    			return redirect('/agent/business1/'.$update->id)->with('success','Client information edited successfully');
    		}
    	}
    	else
    	{
    		return redirect::back()->with('error','Something went wrong, please try later');	
    	}
    }

    public function business_detail(Request $request)
    {
    	$insert=new BusinessDetail($request->all());
    	$insert->type=$request->optradio;
        $insert->usertype='agent';
        $insert->userid=Auth::guard('agent')->user()->id;
        if($request->optradio=='Qualified')
        {
           $insert->custodian=$request->custodian;
		  $insert->account_type=$request->account_type;
    	}
    	else
    	{
    		$insert->funding=$request->funding;	
    	}
    	$save=$insert->save();
    	if($save)
    	{
    		return redirect('/agent/business2/'.$request->id)->with('success','Sale Amount added successfully');
    	}
    	else
    	{
    		return redirect::back()->with('error','Something went wrong, please try later');	
    	}
    }

    public function edit_business1($id)
    {
        $data=BusinessDetail::where('id',$id)->first();
    	if($data)
    	{
                $url=URL::previous();
                session()->put('sales_url', $url);


    		return view::make('agent.edit_business1',compact('data',$data));
    	}
    	else
    	{
    		return redirect::back()->with('error','Something went wrong, please try later.');	
    	}
    }


    public function update_business1(Request $request)
    {

    	$update=BusinessDetail::find($request->id);
    	$update->amount=$request->amount;
    	$update->type=$request->optradio;
        if($request->optradio=='Qualified')
        {
            $update->custodian=$request->custodian;
    		$update->account_type=$request->account_type;
    	}
    	else
    	{
    		$update->funding=$request->funding;	
    	}
    	$save=$update->save();
    	if($save)
    	{
            $url=session::get('sales_url');

            if(strpos($url,'sales_detail') ==! false)
            {
                    
                return redirect($url)->with('success','Sales information added successfully');   
            }

            else
            {
    		  return redirect('/agent/business2/'.$update->id)->with('success','Your business amount add successfully');
                
            }
    	}
    	else
    	{
    		return redirect::back()->with('error','Something went wrong, please try later');	
    	}
    }

    public function submit_business(Request $request)
    {
        if ($request->file!='') 
         {
                // Set the destination path
                $destinationPath = public_path().'/file';
                // Get the orginal filname or create the filename of your choice
                $filename2 = str_replace(' ', '_', $request->file->getClientOriginalName());
                $request->file->move($destinationPath, $filename2);
                $files=$filename2;
                Session::push('cart1', $files);
        }   
        else
        {
            $filename2='';
        }

        if(!empty($request->id) && $request->id=='1')
        {
            $files=Session::get('cart1');
            if($files != '')
            {
                foreach($files as $file)
                {

                    $data=BusinessDetail::where('id',$request->lastid)->first();

                    $insert=new BusinessFile($request->all());
                    $insert->userid=Auth::guard('agent')->user()->id;
                    $insert->usertype='agent';
                    $insert->business_detail_id=$data->id;
                    $insert->business_id=$data->business_id;
                    $insert->image=$file;
                    $insert->save();
                }

                    session()->forget('cart');
                    session()->forget('cart1');

                    $insert=new Notification();
                    $insert->userid=Auth::guard('agent')->user()->id;
                    $insert->usertype='agent';
                    $insert->title='Sales Upload';
                    $insert->message=(Auth::guard('agent')->user()->name). 'Agent new sales material upload, Please check.';
                    $insert->save();


                return redirect::route('agent.sales')->with('success','File uploaded successfully');
            }

            return redirect::back()->with('error','Please Choose the file');
        }

    }
    public function delete_document(Request $request)
    {
        $key=$request->arrayid;
        $data=Session::get('cart1');
        unset($data[$key]);
        Session::forget('cart1');
        foreach($data as $d)
        {
            Session::push('cart1',$d);
        }
        return redirect::route('agent.business2',$request->saleid);
    }

}
