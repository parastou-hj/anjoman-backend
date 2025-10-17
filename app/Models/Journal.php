<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
        use HasFactory;
    protected $fillable = ['title', 'description', 'image', 'tag', 'link', 'is_active'];
protected $casts = ['is_active' => 'boolean'];
}
