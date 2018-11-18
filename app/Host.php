<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'macAddress',
        'vendor',
    ];

    /**
     * Get the user that owns the host.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the logs for the host.
     */
    public function logs()
    {
        return $this->hasMany('App\HostLog');
    }

    /**
     * Get a string representation of the host.
     *
     * @return string
     */
    public function toString()
    {
        return $this->macAddress . PHP_EOL . $this->vendor;
    }
}
