<?php

namespace TelzirApp\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Planos extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id',
        'name',
        'description',
        'photography',
        'status'
    ];

}
