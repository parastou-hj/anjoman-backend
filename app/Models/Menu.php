<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'url', 
        'target',
        'parent_id',
        'order',
        'is_active'
    ];
    
    protected $casts = [
        'is_active' => 'boolean'
    ];

    // رابطه والد
    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    // رابطه فرزندان
    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('order');
    }

    // منوهای فعال
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // منوهای اصلی (بدون والد)
    public function scopeMain($query)
    {
        return $query->whereNull('parent_id');
    }

    // منوها به ترتیب
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    // دریافت منوهای اصلی با فرزندان
    public static function getMainMenusWithChildren()
    {
        return self::active()
            ->main()
            ->ordered()
            ->with(['children' => function($query) {
                $query->active()->ordered();
            }])
            ->get();
    }

    // بررسی اینکه آیا منو فرزند دارد یا نه
    public function hasChildren()
    {
        return $this->children()->active()->count() > 0;
    }
}