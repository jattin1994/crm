<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Business;
use App\BusinessDetail;
use App\BusinessFile;
use App\BusinessNote;
use App\ClientDocument;
use App\ClientBank;
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
    	$data=Business::all();
        
    	return view::make('admin.clients',compact(
        'data'));
    }

    public function client_overview(Request $request)
    {
        $data=Business::find($request->id);
        
        return view::make('admin.clients_overview',compact(
        'data'));
    }

    public function add_newsale(Request $request)
    {
        $data=Business::find($request->id);
        return view::make('admin.add_newsale',compact(
        'data'));
    }

        public function add_sale(Request $request)
    {
        $update=Business::find($request->id);
        $update->name=$request->name;
        $update->middlename=$request->middlename;
        $update->lastname=$request->lastname;
        $update->suffix=$request->suffix;
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
        $userid=$update->userid;
        $usertype=$update->usertype;
        if($save)
        {
            return view::make('admin.add_sale',compact('id','userid','usertype'))->with('success','client information is submited');
            
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
        $insert->id=$request->new_id;
        $save=$insert->save();
        if($save)
        {
            return redirect('/admin/edit_sale2/'.$request->new_id)->with('success','Your sale amount add successfully');
        }
        else
        {
            return redirect::back()->with('error','Something went wrong, please try later');    
        }
    }

    public function client_file(Request $request)
    {

        return view::make('admin.client_file');

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
        $insert->userid=Auth::guard('admin')->user()->id;
        $insert->usertype='admin';
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


    public function add_newclient(Request $request)
    {
        $userid=$request->id;
        return view::make('admin.add_newclient',compact('userid'));
    }

        public function submit_client(Request $request)
    {
        $exist=Business::where('userid',$request->userid)->where('usertype',$request->usertype)->where('email',$request->email)->first();
        if($exist == '')
        {

                $insert=new Business($request->all());
                $insert->id=$request->newid;
                $save=$insert->save();
                if($save)
                {
                    return redirect::route('admin.agent_detail',$insert->userid)->with('success','client information add successfully');
                    
                }
                else
                {
                    return redirect::back()->with('error','something went wrong,try again later');
                }
        }
        else
        {
                return redirect::back()->with('error','Client information(Email id) already exist on this agent.');
        }
    }

    public function add_clientbanking(Request $request)
    {
        $id=$request->id;
        return view::make('admin.add_clientbanking',compact('id'));
    }
    public function submit_clientbankingdetail(Request $request)
    {
        $insert=new ClientBank($request->all());
        $inserted=$insert->save();
        if($inserted)
        {
            return redirect('admin/client_overview/'.$request->businessid)->with('success','Client Bank add successfully');
        }
        else
        {
            return redirect::back()->with('error','Something went wrong,try again later');
        }
    }

    public function delete_clientbankdetail(Request $request)
    {
        $deleteclient=ClientBank::where('businessid',$request->businessid)->delete();
        if($deleteclient)
        {
            return redirect::back()->with('success','Client account deleted successfully');
        }
        else
        {
            return redirect::back()->with('error','Something went wrong, please try agin later');
        }
    }

    public function editclient_account(Request $request)
    {
        $data=ClientBank::where('businessid',$request->id)->first();
        return view::make('admin.edit_clientbanking',compact('data'));
    }


    public function update_clientbankingdetail(Request $request)
    {
        $update=ClientBank::find($request->id);
        $update->bankname=$request->bankname;
        $update->bankaddress=$request->bankaddress;
        $update->routingno=$request->routingno;
        $update->accountholdername=$request->accountholdername;
        $update->accoutnumber=$request->accoutnumber;
        $update->accounttype=$request->accounttype;
        $updated=$update->save();
        if($updated)
        {
            return redirect('admin/client_overview/'.$update->businessid)->with('success','Client Bank Edited successfully');
        }
        else
        {
            return redirect::back()->with('error','Something went wrong,try again later');
        }
    }



}
