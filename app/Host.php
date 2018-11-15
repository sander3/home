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
     * Get the logs for the host.
     */
    public function logs()
    {
        return $this->hasMany('App\HostLog');
    }
}
