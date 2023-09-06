<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $data = Blog::get();
        return view('pages.blog.index', [
            'data' => $data
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Blog $blog)
    {
        return view('pages.blog.details', [
            'blog' => $blog       
        ]);
    }

    public function edit(Blog $blog)
    {
        //
    }

    public function update(Request $request, Blog $blog)
    {
        //
    }

    public function destroy(Blog $blog)
    {
        //
    }
}
