<?php

namespace App\Http\Controllers\Admin;

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
use App\BusinessNote;


class FileNoteController extends Controller
{


    public function notepost($id)
    {
    	$businessdata=Businessfile::find($id);
    	return view::make('admin.filenote',compact('businessdata'));
    }

    public function submit_notepost(Request $request)
    {
    	$insert=new BusinessNote($request->all());
        $save=$insert->save();
        if($save)
        {

            return redirect::route('admin.sales_detail',$request->saleid)->with('success','note is submit successfully');
        }
        else
        {
            return redirect::back()->with('error','something went wrong, please try again later');
        }
    }


}
