<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Business;
use App\BusinessDetail;
use App\BusinessFile;
use App\BusinessNote;
use App\ClientDocument;
use App\Notification;
use Auth;
use Illuminate\Support\Facades\Input;
use View;
use Redirect;
use Hash;
use Mail;
use Session;
use URL;


class ClientsController extends Controller
{
    
    public function clients(Request $request)
    {
        session()->forget('sidebarid');
        session()->put('sidebarid','9');
        $id=Auth::guard('agent')->user()->id;

    	$data=Business::where('userid',$id)->where('usertype','agent')->get();
        
    	return view::make('agent.clients',compact(
        'data'));
    }

    public function client_overview(Request $request)
    {
        $id=Auth::guard('agent')->user()->id;
        $data=Business::find($request->id);
        
        return view::make('agent.clients_overview',compact(
        'data'));
    }

    public function add_newsale(Request $request)
    {
        $data=Business::find($request->id);
        return view::make('agent.add_newsale',compact(
        'data'));
    }

    public function add_clientsale(Request $request)
    {
        $id=$request->id;
        return view::make('agent.add_sale',compact('id'));
    }

        public function add_sale(Request $request)
    {
        $update=Business::find($request->id);
        $update->name=$request->name;
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
        $save=$update->save();
        $id=$update->id;
        if($save)
        {
            return view::make('agent.add_sale',compact('id'))->with('success','client information is submited');
            
        }
        else
        {
            return redirect::back()->with('error','something went wrong,try again later');
        }
    }

    public function add_saleamount(Request $request)
    {
        $insert=new BusinessDetail($request->all());
        $insert->type=$request->optradio;
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
            return redirect('/agent/business2/'.$insert->id)->with('success','Your sale amount add successfully');
        }
        else
        {
            return redirect::back()->with('error','Something went wrong, please try later');    
        }
    }

    public function client_file(Request $request)
    {

        return view::make('agent.client_file');

    }

    public function submit_clientfile(Request $request)
    {
        if ($request->file!='') 
         {
                // Set the destination path
                $destinationPath = public_path().'/file';
                // Get the orginal filname or create the filename of your choice
                $filename2 = str_replace(' ', '_', $request->file->getClientOriginalName());
                $request->file->move($destinationPath, $filename2);
        }   
        else
        {
            $filename2='';
        }

        $insert=new ClientDocument($request->all());
        $insert->userid=Auth::guard('agent')->user()->id;
        $insert->usertype='agent';
        $insert->business_id=$request->clientid;
        $insert->file=$filename2;
        $insert->save();
    }

    public function client_filedelete(Request $request)
    {

        $delete=ClientDocument::where('id',$request->fileid)->delete();
        if($delete)
        {
            return redirect::back()->with('success','Client File are deleted successfully');
        }
        else
        {
            return redirect::back()->with('error','something went wrong');
        }
    }



}
