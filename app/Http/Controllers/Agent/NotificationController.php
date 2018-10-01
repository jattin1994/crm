<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Business;
use App\BusinessDetail;
use App\BusinessFile;
use App\Notification;
use App\Agent;
use Auth;
use Illuminate\Support\Facades\Input;
use View;
use Redirect;
use Hash;
use Mail;
use Session;
use URL;


class NotificationController extends Controller
{
    
    public function notification()
    {
    	session()->forget('sidebarid');
        session()->put('sidebarid','5');
        $id=Auth::guard('agent')->user()->id;
        $data=Notification::where('userid',$id)->where('status','1')->OrderBy('id','desc')->get();
        return view::make('agent.notification',compact('data'));
    }

    public function delete_notification(Request $request)
    {
    	$id=$request->notificationid;
    	$update=Notification::find($id);
    	$update->status='0';
    	$update->save();
    }
    public function all_delete(Request $request)
    {
    	$id=Auth::guard('agent')->user()->id;
    	$data=Notification::where('userid',$id)->get();

    	foreach($data as $d)
    	{
    		$d->status='0';
    		$d->save();
    	}
    }


}
