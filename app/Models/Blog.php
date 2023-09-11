<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['author_id', 'category_id', 'title', 'seo_title', 'excerpt', 'body', 'image', 'slug', 'status', 'featured'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($query, array $filter)
    {
        if ($filter['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%');
                // ->orWhere('description', 'like', '%' . request('search') . '%');
        }
        if ($filter['status'] ?? false) {
            $query->where('status', 'like', '%' . request('status') . '%');
        }
        // } else {
        //     $query->where('status', 'like', '%' . request('status') . '%');
        // }
    }

}
