<?php

namespace App;

use App\Notifications\AgentResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Agent;
use App\Admin;

class BusinessFile extends Authenticatable
{
	protected $table='business_file';
    protected $fillable = [
    	'userid','business_id', 'business_detail_id', 'image',

    ];

    public function business_detail()
    {
    	return $this->belongsTo('App\BusinessDetail','business_detail_id');
    }

    public function username($type,$userid)
    {
        if($type=='agent')
        {
        	$name=Agent::where('id',$userid)->first();
            if($name != '')
            {
                return ucfirst($name->name);	
                
            }
            else
            {
                $name='';
                return ucfirst($name);
            }
        }
        else
        {
            $name=Admin::where('id',$userid)->first();
            if($name != '')
            {
                return ucfirst($name->name);    
                
            }
            else
            {
                $name='';
                return ucfirst($name);
            }   
        }
    }


}
