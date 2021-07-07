<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class food extends Model
{
    protected $casts = [
        'toppings' => 'array',
      ];
}
