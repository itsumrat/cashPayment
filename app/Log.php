<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\LogsActivityInterface as LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;



class Log extends Model implements LogsActivityInterface
{


    use LogsActivity;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'logs';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['login_time', 'logout_time', 'flight_start', 'flight_end', 'total_log_time', 'total_flight_time', 'total_rest_time', 'date', 'user_id'];


    /**
     * Get the message that needs to be logged for the given event name.
     *
     * @param string $eventName
     * @return string
     */
    public function getActivityDescriptionForEvent($eventName)
    {
        if ($eventName == 'created')
        {
            return 'Log "' . $this->id . '" was created';
        }

        if ($eventName == 'updated')
        {
            return 'Log "' . $this->id . '"  was updated';
        }

        if ($eventName == 'deleted')
        {
            return 'Log "' . $this->id . '"  was deleted';
        }

        return '';
    }


    public function user(){
        return $this->belongsTo('App\User');
    }
}
