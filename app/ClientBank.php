<?php

namespace App;

use App\Notifications\AgentResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class clientBank extends Authenticatable
{
	protected $table='client_bank';
    protected $fillable = [
    	'businessid', 'bankname', 'bankaddress', 'routingno', 'accountholdername', 'accoutnumber', 'accounttype',

    ];



}
