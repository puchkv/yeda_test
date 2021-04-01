<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public static $rules = [
        'name' => ['required', 'string', 'max:30'],
        'surname' => ['required', 'string', 'max:30'],
        'email' => ['required', 'email', 'max:40', 'unique:users']
    ];

    protected $fillable = [
        'name', 'surname', 'email',
    ];
}
