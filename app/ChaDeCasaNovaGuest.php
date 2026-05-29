<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChaDeCasaNovaGuest extends Model
{
    protected $table = 'cha_de_casa_nova_guests';

    protected $fillable = [
        'full_name',
        'companions_count',
    ];
}
