<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SitesController extends Controller
{
    public function dashboard()
    {
        if(Auth::user()->hasRole(['admin'])){
            $data = Blog::latest()->filter(request(['status', 'search']))->paginate(10);
        } else {
            $data = Blog::where('author_id', Auth::id())->latest()->filter(request(['status', 'search']))->paginate(10);
        }
        return view('pages.blog.dashboard', [
            'data' => $data
        ]);
    }
}
