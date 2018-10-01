<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Business;
use App\BusinessDetail;
use App\BusinessFile;
use Auth;
use Illuminate\Support\Facades\Input;
use View;
use Redirect;
use Hash;
use Mail;
use Session;
use URL;


class SalesController extends Controller
{
    
    public function sales(Request $request)
    {
        session()->forget('sidebarid');
        session()->put('sidebarid','1');
        $id=Auth::guard('agent')->user()->id;

        
        $businessdata=BusinessDetail::where('userid',$id)->orderby('id','desc')->get();
        $total=BusinessDetail::where('userid',$id)->count();
        $completed=BusinessDetail::where('userid',$id)->where('status','6')->count();
        $pending=BusinessDetail::where('userid',$id)->where('status','5')->count();
        $funds=BusinessDetail::where('userid',$id)->where('status','1')->count();
        $action=BusinessDetail::where('userid',$id)->where('status','2')->count();
        $cancel=BusinessDetail::where('userid',$id)->where('status','4')->count();
        $signing=BusinessDetail::where('userid',$id)->where('status','3')->count();
        $processing=BusinessDetail::where('userid',$id)->where('status','0')->count();

        return view::make('agent.sales',compact('businessdata','total','completed','pending','funds','action','cancel','signing','processing'));
    }

    public function salefilter(Request $request)
    {
        session()->forget('sidebarid');
        session()->put('sidebarid','1');
        $id=Auth::guard('agent')->user()->id;
        $businessdata=BusinessDetail::where('userid',$id)->where('status',$request->id)->get();
        $total=BusinessDetail::where('userid',$id)->count();
        $completed=BusinessDetail::where('userid',$id)->where('status','6')->count();
        $pending=BusinessDetail::where('userid',$id)->where('status','5')->count();
        $funds=BusinessDetail::where('userid',$id)->where('status','1')->count();
        $action=BusinessDetail::where('userid',$id)->where('status','2')->count();
        $cancel=BusinessDetail::where('userid',$id)->where('status','4')->count();
        $signing=BusinessDetail::where('userid',$id)->where('status','3')->count();
        $processing=BusinessDetail::where('userid',$id)->where('status','0')->count();

        return view::make('agent.sales',compact('businessdata','total','completed','pending','funds','action','cancel','signing','processing'));
    }

    public function sales_detail($id)
    {
    	$businessdata=BusinessDetail::find($id);
    	return view::make('agent.sale_detail',compact('businessdata'));
    }

    public function download(Request $request)
    {
    	$path=public_path().'/file/'.$request->filename;
    	
    	return response()->download($path);
    }

            public function download1(Request $request)
    {
        $path=public_path().'/file/contract_file/'.$request->filename;
        
        return response()->download($path);
    }


}
