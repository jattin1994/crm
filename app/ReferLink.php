<?php

namespace App;

use App\Notifications\AgentResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ReferLink extends Authenticatable
{
	protected $table='referlink';
    protected $fillable = [
    	'link',

    ];



}
