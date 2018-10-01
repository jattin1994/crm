<?php

namespace App;

use App\Notifications\AgentResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Agent extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name', 'middlename', 'lastname','contract_file','company_name', 'socail_security_number', 'tax_id', 'phone_number', 'email', 'password', 'status', 'email2', 'address', 'address2', 'city', 'state', 'pincode', 'upline','agentid','uplinetype','compensation','override'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AgentResetPassword($token));
    }


    public function bankingdetail()
    {
        return $this->hasone('App\BankingDetail', 'userid');
    }


    public function sales()
    {

        return $this->hasMany('App\BusinessDetail','userid');
    }

    public function notification()
    {
        return $this->hasMany('App\Notification','userid');   
    }

    public function upline($type,$userid)
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
                $name='';
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
                $name='';
                return $name;
            }
        }
    }

    public function downline($userid)
    {
             $downlines=Agent::where('upline',$userid)->get();   
           
            return $downlines;
        
    }
    public function clients()
    {
        return $this->hasMany('App\Business','userid');
    }


}
