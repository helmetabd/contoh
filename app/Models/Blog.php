<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Cviebrock\EloquentSluggable\Sluggable;

class Blog extends Model
{
    use HasFactory;

    // use Sluggable;

    protected $fillable = ['author_id', 'category_id', 'title', 'seo_title', 'excerpt', 'body', 'image', 'slug', 'status', 'featured'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'title'
    //         ]
    //     ];
    // }

    public function scopeFilter($query, array $filter)
    {
        if ($filter['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%');
            // ->orWhere('description', 'like', '%' . request('search') . '%');
        }
        if ($filter['status'] ?? false) {
            $query->where('status', 'like', '%' . request('status') . '%');
        }

        // if ($filter['category'] ?? false) {
        //     Category::with('blogs')->where('name' , 'like', '%' . request('category') . '%');
            
        // }
        // } elseif ($filter['category'] ?? false) {
        //     $query->where('category', 'like', '%' . request('category') . '%');
        // } else {
        //     $query->where('category', 'like', '%' . request('category') . '%');
        // }
    }
}
