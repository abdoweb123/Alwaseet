<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    protected $table = 'wallet';

    protected $guarded = [];


    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) => $value == 1 ? __('dash.withdraw') : __('dash.deposit')
        );
    }


} //end of class
