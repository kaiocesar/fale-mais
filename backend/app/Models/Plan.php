<?php

namespace TelzirApp\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plans';
    protected $fillable = [
        'name',
        'description',
        'photography',
        'status'
    ];

}
