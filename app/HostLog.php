<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HostLog extends Model
{
    /**
     * The relationships that should be touched on save.
     *
     * @var array
     */
    protected $touches = ['host'];

    /**
     * Get the host that owns the log.
     */
    public function host()
    {
        return $this->belongsTo('App\Host');
    }
}
