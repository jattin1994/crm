<?php

namespace App;

use App\Notifications\AgentResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SaleFolder extends Authenticatable
{
	protected $table='sale_folder';
    protected $fillable = [
    	'name','userid'

    ];

    public function username()
    {
        return $this->belongsTo('App\Admin','userid');
    }

}
