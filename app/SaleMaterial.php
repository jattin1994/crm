<?php

namespace App;

use App\Notifications\AgentResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SaleMaterial extends Authenticatable
{
	protected $table='sale_material';
    protected $fillable = [
    	'userid', 'usertype', 'file'

    ];


        public function username($type,$userid)
    {
        if($type=='agent')
        {
        	$name=Agent::where('id',$userid)->first();
            return ucfirst($name->name);	
        }
        else
        {
            $name=Admin::where('id',$userid)->first();
            return ucfirst($name->name);   
        }
    }

}
