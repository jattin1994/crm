<?php

namespace App;

use App\Notifications\AgentResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class BusinessNote extends Authenticatable
{
	protected $table='business_note';
    protected $fillable = [
    	'userid', 'usertype', 'businessfile_id', 'comment',

    ];

    public function username()
    {
    	return $this->belongsTo('App\Admin','userid');
    }

}
