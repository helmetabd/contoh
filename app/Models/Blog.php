<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

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
