<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Business;
use App\BusinessDetail;
use App\BusinessFile;
use App\BusinessNote;
use App\Notification;
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
    	$businessdata=BusinessDetail::all();
        $total=BusinessDetail::count();
        $completed=BusinessDetail::where('status','6')->count();
        $pending=BusinessDetail::where('status','5')->count();
        $funds=BusinessDetail::where('status','1')->count();
        $action=BusinessDetail::where('status','2')->count();
        $cancel=BusinessDetail::where('status','4')->count();
        $signing=BusinessDetail::where('status','3')->count();
        $processing=BusinessDetail::where('status','0')->count();

    	return view::make('admin.sales',compact('businessdata','total','completed','pending','funds','action','cancel','signing','processing'));
    }

    public function salefilter(Request $request)
    {
        session()->forget('sidebarid');
        session()->put('sidebarid','1');
        $businessdata=BusinessDetail::where('status',$request->id)->get();
        $total=BusinessDetail::count();
        $completed=BusinessDetail::where('status','6')->count();
        $pending=BusinessDetail::where('status','5')->count();
        $funds=BusinessDetail::where('status','1')->count();
        $action=BusinessDetail::where('status','2')->count();
        $cancel=BusinessDetail::where('status','4')->count();
        $signing=BusinessDetail::where('status','3')->count();
        $processing=BusinessDetail::where('status','0')->count();

        return view::make('admin.sales',compact('businessdata','total','completed','pending','funds','action','cancel','signing','processing'));
    }

    public function sales_detail($id)
    {
        Session::forget('cart1');
    	$businessdata=BusinessDetail::find($id);
        return view::make('admin.sale_detail',compact('businessdata'));
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

    public function changestatus(Request $request)
    {
        $id=$request->saleid;
        $update=BusinessDetail::find($id);
        $update->status=$request->status;
        $updated=$update->save();
        if($updated)
        {
            return redirect::back()->with('success','Status changed successfully');
        }
        else
        {
            return redirect::back()->with('error','Status not change, something went wrong');
        }

    }

    public function sale_filedelete(Request $request)
    {
        $delete=BusinessFile::where('id',$request->saleid)->delete();

        if($delete)
        {
            return redirect::back()->with('success','The document was deleted successfully');
        }
        else
        {
            return redirect::back()->with('error','something went wrong, try again later');
        }
    }


    public function edit_sale(Request $request)
    {
        $detail=BusinessDetail::find($request->id)->first();
        $data=Business::where('id',$detail->business_id)->first();
        if($data)
        {
            return view::make('admin.edit_sale',compact('data',$data));
        }
        else
        {
            return redirect::back()->with('error','Something went wrong, please try later');    
        }
    }

    public function update_sale(Request $request)
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
        $update->correspondence=$request->correspondence;
        $save=$update->save();


        $detailid=BusinessDetail::where('id',$request->businessdetail_id)->first();

        if($save)
        {   
            
            return redirect('/admin/edit_sale1/'.$detailid->id)->with('success','Your 1st sale form edit successfully');
        
        }
        else
        {
            return redirect::back()->with('error','Something went wrong, please try later');    
        }
    }

    public function edit_sale1($id)
    {
        $data=BusinessDetail::where('id',$id)->first();
        if($data)
        {

            return view::make('admin.edit_sale1',compact('data',$data));
        }
        else
        {
            return redirect::back()->with('error','Something went wrong, please try later');    
        }
    }

    public function update_sale1(Request $request)
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
              return redirect('/admin/edit_sale2/'.$update->id)->with('success','Your sale amount edit successfully');
                
        }
        else
        {
            return redirect::back()->with('error','Something went wrong, please try later');    
        }
    }


    public function edit_sale2(Request $request)
    {
        $id=$request->id;
        $business=BusinessDetail::where('id',$id)->first();
        return view::make('admin.edit_sale2',compact('id'));
    }


        public function submit_sale(Request $request)
    {

        if ($request->file!='') 
         {
                $destinationPath = public_path().'/file';
                // Get the orginal filname or create the filename of your choice
                $filename2 = str_replace(' ', '_', $request->file->getClientOriginalName());
                $request->file->move($destinationPath, $filename2);
                $files[]=$filename2;
                Session::push('cart1', $files);
        }   
        else
        {
            $filename2='';
        }


        if(!empty($request->id) && $request->id == '1')
        {
            $files=Session::get('cart1');
            if($files != '')
            {
                foreach($files as $file)
                {

                    $data=BusinessDetail::where('id',$request->lastid)->first();
                    $insert=new BusinessFile($request->all());
                    $insert->userid=Auth::guard('admin')->user()->id;
                    $insert->usertype='admin';
                    $insert->business_detail_id=$data->id;
                    $insert->business_id=$data->business_id;
                    $insert->image=$file['0'];
                    $insert->save();
                    $sale=$data->id;
                 }
                return redirect('admin/sales_detail/'.$sale)->with('success','Files are updated sucessfully');
            }
            return redirect::back()->with('error','Please Choose the files.');
        }    


        $insert=new Notification();
        $insert->userid=Auth::guard('admin')->user()->id;
        $insert->usertype='admin';
        $insert->title='Edit Sales Files';
        $insert->message=(Auth::guard('admin')->user()->name). ' Admin edit sales, Please check.';
        $insert->save();

    }

    public function sale_delete(Request $request)
    {
        $id=$request->id;
        $cancel=BusinessDetail::where('id',$id)->first();
        if($cancel->status != '4')
        {
		    $delete1=BusinessDetail::where('id',$id)->delete();
		    $delete2=BusinessFile::where('business_detail_id',$id)->delete();

		    if($delete2)
		    {
		        return redirect('admin/sales')->with('success','Sale deleted successfully');
		    }
		    else
		    {
		        return redirect::back()->with('error','something went wrong, try again later');
		    }
		}
		else
		{
			return redirect::back()->with('error','Sale is cancel, so you can not delete');
		}

    }

    public function salenote(Request $request)
    {
        $data=BusinessNote::where('businessfile_id',$request->businessfile_id)->orderby('id','desc')->get();
        return view::make('admin.salenote',compact('data'));
    }
    public function submit_salenote(Request $request)
    {
        $insert=new BusinessNote($request->all());
        $insert->userid=Auth::guard('admin')->user()->id;
        $insert->usertype='admin';
        $inserted=$insert->save();
        if($inserted)
        {
            return redirect::back()->with('success','Note added successfully');
        }
        else
        {
            return redirect::back()->with('error','something went wrong,try again later');
        }
    }

    public function sale_notedelete(Request $request)
    {
        $delete=BusinessNote::where('id',$request->id)->delete();
        if($delete)
        {
            return redirect::back()->with('success','Note is deleted successfully');
        }
        else
        {
            return redirect::back()->with('error','Something is went wrong');
        }
    }


}
