<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reseller extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'mobile', 'email', 'password', 'role_id', 'balance','pin_number'];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted = true)
            ->where('role_id', '=', 3);
    }

}
