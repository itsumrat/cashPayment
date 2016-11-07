<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'transactions';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['from', 'to_id', 'payment_method', 'amount', 'status','mobile','no_type','remarks'];



    public function agent()
    {
        return $this->belongsTo('App\User', 'to_id', 'id');
    }

    public function reseller()
    {
        return $this->belongsTo('App\User', 'from', 'id');
    }


    public function getFromAttribute($value)
    {
        $user = User::find($value);
        if(empty($user)){
            return $value;
        }
        return $user->name;
    }

    public function getToIdAttribute($value)
    {
        $user = User::find($value);
        if(empty($user)){
            return $value;
        }
        return $user->name;
     
    }




}
