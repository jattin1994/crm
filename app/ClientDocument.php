<?php

namespace App;

use App\Notifications\AgentResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ClientDocument extends Authenticatable
{
	protected $table='client_document';
    protected $fillable = [
    	'userid', 'usertype', 'file','business_id'

    ];

    public function username()
    {
    	return $this->belongsTo('App\Admin','userid');
    }

}
