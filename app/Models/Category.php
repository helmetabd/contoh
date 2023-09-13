<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function blogs()
    {   
        return $this->hasMany(Blog::class);
    }

    public function scopeFilter($query, array $filter)
    {
        if ($filter['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%');
            // ->orWhere('description', 'like', '%' . request('search') . '%');
        }
        if ($filter['name'] ?? false) {
            $query->where('name', 'like', '%' . request('name') . '%');
        }
    }
}
