<?php

namespace App;

use App\Notifications\AgentResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class BankingDetail extends Authenticatable
{
	protected $table='agent_bankingdetail';
    protected $fillable = [
    	'userid', 'bankname', 'bankaddress','bankaddress1','bankaddress2','routingno', 'accountholdername', 'accoutnumber', 'accounttype',

    ];



}
