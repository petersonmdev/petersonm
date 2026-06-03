<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'is_active',
        'style_path',
        'layout_view',
        'landing_view',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function guests()
    {
        return $this->hasMany(EventGuest::class);
    }

    public function gifts()
    {
        return $this->hasMany(EventGift::class);
    }
}
