<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventGift extends Model
{
    protected $fillable = [
        'event_id',
        'name',
        'category',
        'description',
        'received',
        'gifted_by',
    ];

    protected $casts = [
        'received' => 'boolean',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
