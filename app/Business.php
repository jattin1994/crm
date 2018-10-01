<?php

namespace App;

use App\Notifications\AgentResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Business extends Authenticatable
{
	protected $table='business';
    protected $fillable = [
    	'id','userid','usertype','name','middlename','lastname','suffix','social', 'phone', 'phone1', 'email', 'email1', 'birthday', 'address', 'address1', 'country', 'state', 'city', 'pincode','correspondence',

    ];

    public function amount()
    {
    	return $this->hasOne('App\BusinessDetail','business_id');
    }

        public function file()
    {
    	return $this->hasMany('App\BusinessFile','business_id');
    }

    public function username()
    {
        return $this->belongsTo('App\Agent','userid');
    }

    public function sales()
    {
        return $this->hasMany('App\BusinessDetail','business_id')->orderby('id','desc');
    }
        public function clientbank()
    {
        return $this->hasone('App\ClientBank','businessid');
    }




}
