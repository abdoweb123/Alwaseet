<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'workers';

    // The attributes that are mass assignable.
    protected $fillable = [
        'name',
        'personal_number',
        'passport_number',
        'phone',
        'email',
    ];

    // The attributes that should be cast to native types.
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


} //end of class
