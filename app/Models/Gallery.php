<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'image', 
        'alt', 
        'description', 
        'order', 
        'is_active'
    ];
    
    protected $casts = [
        'is_active' => 'boolean'
    ];
}