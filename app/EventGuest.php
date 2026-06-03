<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventGuest extends Model
{
    protected $fillable = [
        'event_id',
        'full_name',
        'companions_count',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
