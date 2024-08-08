<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function subs()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
