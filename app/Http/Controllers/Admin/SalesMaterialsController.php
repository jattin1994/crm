<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Business;
use App\BusinessDetail;
use App\BusinessFile;
use App\SaleMaterial;
use App\SaleFolder;
use App\Notification;
use Auth;
use Illuminate\Support\Facades\Input;
use View;
use Redirect;
use Hash;
use Mail;
use Session;
use URL;


class SalesMaterialsController extends Controller
{
    
    public function salesmaterials()
    {
    	session()->forget('sidebarid');
        session()->put('sidebarid','3');
        // $data=BusinessFile::all();
        $folders=SaleFolder::all();
        $data=SaleMaterial::orderby('id','desc')->get();
        return view::make('admin.salesmaterials',compact('data','folders'));
    }

        public function download(Request $request)
    {
    	$path=public_path().'/file/'.$request->filename;
    	
    	return response()->download($path);
    }

    public function salesmaterialsform()
    {
        return view::make('admin.uploadsales_material');
    }

        public function submit_salematerial(Request $request)
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
                    $sale=$data->business_id;
                }
                return redirect('admin/sales_detail/'.$sale)->with('success','Files are updated sucessfully');
            }
            return redirect::back()->with('error','Please Choose the files.');
        }    
    }


    public function admin_salesmaterialsform()
    {
        $folders=SaleFolder::all();
        return view::make('admin.adminsales_material',compact('folders'));
    }

    public function admin_submit_salematerial(Request $request)
    {


        if ($request->file!='') 
         {
                // Set the destination path
                $destinationPath = public_path().'/file';
                // Get the orginal filname or create the filename of your choice
                $filename2 = str_replace(' ', '_', $request->file->getClientOriginalName());
                $request->file->move($destinationPath, $filename2);
            $files[]=$filename2;
            Session::push('cart', $files);
        }   
        else
        {
            $filename2='';
        }
        
        if(!empty($request->id) && $request->id == '1')
        {
            $files=Session::get('cart');
            
            if($files != '')
            {
                foreach($files as $file)
                {

                $insert=new SaleMaterial($request->all());
                $insert->userid=Auth::guard('admin')->user()->id;
                $insert->categoryname=$request->categoryname;
                $insert->usertype='admin';
                $insert->file=$file['0'];
                $insert->save();    
            }

                Session::forget('cart');
            
                $insert=new Notification();
                $insert->userid=Auth::guard('admin')->user()->id;
                $insert->usertype='admin';
                $insert->title='Sales Material';
                $insert->message='Admin add new sales material, Please check.';
                $insert->save();
                return redirect::route('admin.salesmaterials')->with('success','File uploaded successfully');
        }
                return redirect::back()->with('error','Please Choose the files.');
        } 
    }

    public function cancel()
    {
        session::forget('cart');
        return redirect::back();
    }

    public function sales_material_delete(Request $request)
    {

        $delete=SaleMaterial::where('id',$request->saleid)->delete();
        if($delete)
        {
            return redirect::back()->with('success','File deleted successfully');
        }
        else
        {
            return redirect::back()->with('error','something went wrong');
        }
    }

    public function add_salefolder(Request $request)
    {
        $data=SaleFolder::all();
        return view::make('admin.add_salefolder',compact('data'));
    }

    public function submit_folder(Request $request)
    {
        $insert= new SaleFolder($request->all());
        $update=$insert->save();
        if($update)
        {
            return redirect::route('admin.add_salefolder')->with('success','Folder added successfully');
        }
        else
        {
            return redirect::back()->with('error','something went wrong, try again later');
        }
    }

    public function salefolder_delete(Request $request)
    {
        $delete=SaleFolder::where('id',$request->saleid)->delete();
        if($delete)
        {
            $deleted=SaleMaterial::where('categoryname',$request->saleid)->delete();
            if($deleted)
            {
                return redirect::back()->with('success','Folder is deleted successfully');
            }
            else
            {
                return redirect::back()->with('error','something went wrong,try again later');
            }
        }
        else
        {

                return redirect::back()->with('error','something went wrong,try again later');
        }
    }


}
