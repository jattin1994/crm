<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Business;
use App\BusinessDetail;
use App\BusinessFile;
use App\SaleFolder;
use App\SaleMaterial;
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
        session()->put('sidebarid','6');
        $folders=SaleFolder::all();
        $data=SaleMaterial::all();

        return view::make('agent.salesmaterials',compact('data','folders'));
    }


}
