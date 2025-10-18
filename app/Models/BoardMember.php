<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardMember extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'position', 
        'email',
        'job_title',
        'specialization',
        'website_url',
        'image',
        'bio',
        'order',
        'is_active'
    ];
    
    protected $casts = [
        'is_active' => 'boolean'
    ];

    // اعضای فعال
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // اعضا به ترتیب
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    // دریافت اعضای فعال به ترتیب
    public static function getActiveMembers()
    {
        return self::active()->ordered()->get();
    }
}