<?php

namespace App\Http\Controllers\Admin;

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
use App\Admin;
use App\Agent;
use Carbon\Carbon;
use PDF;


class AdminController extends Controller
{
    
    public function index()
    {
    	session()->forget('sidebarid');
        session()->put('sidebarid','2');
        $data=Agent::where('status','>','0')->get();
        $terminated=Agent::where('status','3')->count();
        $working=Agent::where('status','2')->count();
        $not_working=Agent::where('status','1')->count();
        return view::make('admin.home',compact('data','not_working','working','terminated'));
    }

    public function agent_detail($id)
    {
        $data=Agent::find($id);
        return view::make('admin.agent_view',compact('data'));   
    }

        public function profile()
    {

        return view::make('admin.profile');
    }

            public function refernewagent()
    {
    	session()->forget('sidebarid');
        session()->put('sidebarid','4');
        return view::make('admin.refer_new_agent');
    }

                public function notification()
    {
    	session()->forget('sidebarid');
        session()->put('sidebarid','5');
        $data=Notification::where('userid',Auth::guard('admin')->user()->id)->where('status','1')->OrderBy('id','desc')->get();
        return view::make('admin.notification',compact('data'));
    }



    public function reports()
    {
        session()->forget('sidebarid');
        session()->put('sidebarid','6');
        return view::make('admin.reports');

    }

    public function edit_profile()
    {
        return view::make('admin.edit_profile');        
    }

        public function update_profile(Request $request)
    {

        $id=Auth::guard('admin')->user()->id;
        $update=Admin::find($id);
        $update->name=$request->name;
        $update->lastname=$request->lastname;
        $update->email=$request->email;
        $updated=$update->save();
        if($updated)
        {
            return redirect::route('admin.profile')->with('success','Profile edit successfully');        
            
        }
        else
        {
            return redirect::route('admin.profile')->with('error','something went wrong');
        }

    }
    public function change_password()
    {
        return view::make('admin.change_password');        
    }

        public function update_password(Request $request)
    {

        $id=Auth::guard('admin')->user()->id;
        $update=Admin::find($id);
        $update->password=Hash::make($request->password);
        $updated=$update->save();
        if($updated)
        {
            return redirect::route('admin.profile')->with('success','New Password edit successfully');        
            
        }
        else
        {
            return redirect::route('admin.profile')->with('error','something went wrong');
        }

    }

    public function remove_pic(Request $request)
    {
        $id=Auth::guard('admin')->user()->id;
        $update=Admin::find($id);
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
                $destinationPath = public_path().'/adminimage';
                // Get the orginal filname or create the filename of your choice
                $filename = str_replace(' ', '_', $request->file->getClientOriginalName());
                $filename=$rand.''.$filename;
                $request->file->move($destinationPath, $filename);
        }   
        else
        {
            $filename='';
        }

        $id=Auth::guard('admin')->user()->id;
        $update=Admin::find($id);
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


    public function delete_notification(Request $request)
    {
        $id=$request->notificationid;
        $update=Notification::find($id);
        $update->status='0';
        $update->save();
    }
    public function all_delete(Request $request)
    {
        $id=Auth::guard('admin')->user()->id;
        $data=Notification::where('userid',$id)->get();

        foreach($data as $d)
        {
            $d->status='0';
            $d->save();
        }
    }

    public function generate_report(Request $request)
    {

        $date=Carbon::now();
        $rand=rand(0000,1000);
        $path=public_path().'/pdfs/sales'.$rand.'.pdf';
        $url='sales'.$rand.'.pdf';
        
        
        if($request->period == '1')
        {
            if($request->periodvalue == '1')
            {

                $lastmonth=$date->subDays(30);
                $lastmonth=date('Y-m-d', strtotime($lastmonth));
                $data=Business::where('created_at','>', $lastmonth)->get();

                PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
                // pass view file
                $pdf = PDF::loadView('admin.generate_pdf', compact('data'))->save($path);

                return view::make('admin.report_ajax',compact('data','url'));



            }
            elseif($request->periodvalue == '2')
            {
                $year = Carbon::parse('first day of January');
                $yeardate= date('Y-m-d',strtotime($year));

                $data=Business::where('created_at','>', $yeardate)->get();
                PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
                // pass view file
                $pdf = PDF::loadView('admin.generate_pdf', compact('data'))->save($path);
                return view::make('admin.report_ajax',compact('data','url'));
            }
            // elseif($request->periodvalue == '3')
            // {

            //     $halfmonth=$date->subDays(182);
            //     $halfmonth=date('Y-m-d', strtotime($halfmonth));
            //     $data=Business::where('created_at','>', $halfmonth)->get();
            //     PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            //     // pass view file
            //     $pdf = PDF::loadView('admin.generate_pdf', compact('data'))->save($path);
            //     return view::make('admin.report_ajax',compact('data','url'));   
            // }
            elseif($request->periodvalue == '4')
            {
                $firstyear = Carbon::parse('first day of January previous year');
                $lastyear = Carbon::parse('last day of December previous year');
                $lastyearfirstdate= date('Y-m-d',strtotime($firstyear));
                $lastyearlastdate=date('Y-m-d', strtotime($lastyear));
                

                $data=Business::where('created_at','>', $lastyearfirstdate)->where('created_at','<', $lastyearfirstdate)->get();
                PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
                // pass view file
                $pdf = PDF::loadView('admin.generate_pdf', compact('data'))->save($path);
                return view::make('admin.report_ajax',compact('data','url'));   
            }
            elseif($request->periodvalue == '0')
            {

                $lastweek=$date->subDays(7);
                $lastweek=date('Y-m-d', strtotime($lastweek));
                $data=Business::where('created_at','>', $lastweek)->get();
                PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
                // pass view file
                $pdf = PDF::loadView('admin.generate_pdf', compact('data'))->save($path);
                return view::make('admin.report_ajax',compact('data','url'));   
                
            }

        }
        else
        {

            $enddate=date('Y-m-d', strtotime($request->regenddate));
            $day=date('Y-m-d', strtotime($request->regstartdate));
            $data=Business::where('created_at','>', $day)->where('created_at','<', $enddate)->get();
            return view::make('admin.report_ajax',compact('data','url'));

        }
    }

    public function download_report(Request $request)
    {
            $path=public_path().'/pdfs/'.$request->path;
            return response()->download($path);

    }

    public function registermanager(Request $request)
    {
        session()->forget('sidebarid');
        session()->put('sidebarid','8');
        return view::make('admin.registermanager');
    }
    public function submit_managar(Request $request)
    {

        $exist=Admin::where('email',$request->email)->first();
        if($exist == '')
        {
            $insert=new Admin($request->all());
            $insert->password=Hash::make($request->password);
            $insert->save();
            return redirect::back()->with('success','Admin registered successfully');
        }
        else
        {
            return redirect::back()->with('error','This email address is already in use.');
        }
    }

    public function changeagentstatus(Request $request)
    {
        $id=$request->agentid;
        $update=Agent::find($id);
        $update->status=$request->status;
        $updated=$update->save();
        if($updated)
        {
            return redirect::back()->with('success','Agent Status changed successfully');
        }
        else
        {
            return redirect::back()->with('error','something went wrong, try again later');
        }

    }


}
