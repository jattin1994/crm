<?php

namespace App;

use App\Notifications\AgentResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Notification extends Authenticatable
{
	protected $table='notification';
    protected $fillable = [
        'userid', 'usertype', 'title', 'message',
    	
    ];



}
