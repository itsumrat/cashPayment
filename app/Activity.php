<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'activity_log';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['text', 'user_id', 'ip_address'];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
