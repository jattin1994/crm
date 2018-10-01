<?php

namespace App;

use App\Notifications\AgentResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Agent;
use App\Admin;

class BusinessDetail extends Authenticatable
{
	protected $table='business_detail';
    protected $fillable = [
    	'id','userid','usertype','business_id', 'amount', 'type','custodian', 'funding','account_type'

    ];

    public function client()
    {
    	return $this->belongsTo('App\Business','business_id');
    }

    public function username($type,$userid)
    {

    	if($type=='agent')
    	{
    		$name=Agent::where('id',$userid)->first();
        	if($name != '')
        	{
        		return $name->name;
        		
        	}
        	else
        	{
        		$name= '';
        		return $name;
        	}
    		
    	}
    	else
    	{
    		$name=Admin::where('id',$userid)->first();

        	if($name != '')
        	{
        		return $name->name;
        		
        	}
        	else
        	{
        		$name= '';
        		return $name;
        	}

    	}
    }

     public function file()
    {
    	return $this->hasMany('App\BusinessFile','business_detail_id')->orderby('id','desc');
    }

        public function clientdocument()
    {
        return $this->hasMany('App\ClientDocument','business_id');
    }


}
