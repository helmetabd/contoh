<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Throwable;

class BlogController extends Controller
{
    public function index()
    {
        $data = Blog::latest()->filter(request(['status', 'category']))->paginate(10);
        return view('pages.blog.index', [
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('pages.blog.create');
    }

    public function store(Request $request)
    {
        try {
            $formFields = $request->validate([
                'title' => 'required|min:3|max:255',
                'seo_title' => 'sometimes|nullable|min:3|max:255',
                'category_id' => 'required|numeric',
                'excerpt' => 'sometimes|nullable|min:3',
                'body' => 'required|min:3',
                'image' => 'sometimes|nullable|string',
                'status' => 'required|in:published,draft,pending',
                'featured' => 'sometimes|boolean'
            ]);
            // $formFields['slug'] = Str::of('title')->slug('-');
            $formFields['author_id'] = Auth::id();
            Blog::create($formFields);
        } catch (Throwable $exception) {
            dd($exception);
        }
        return redirect('/')->with('message', 'Listing created successfully!');;
    }

    public function show($blog)
    {
        $data = Blog::findOrFail($blog);
        // dd($data);
        return view('pages.blog.details', [
            'blog' => $data
        ]);
    }

    public function edit($blog)
    {
        $data = Blog::findOrFail($blog);
        return view('pages.blog.edit', [
            'blog' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $data = Blog::findOrFail($id);
            $formFields = $request->validate([
                'title' => 'required|min:3|max:255',
                'seo_title' => 'sometimes|nullable|min:3|max:255',
                'excerpt' => 'sometimes|nullable|min:3',
                'body' => 'required|min:3',
                'image' => 'sometimes|nullable|string',
                'status' => 'required|in:published,draft,pending',
                'featured' => 'sometimes|boolean'
            ]);
            $data->update($formFields);
        } catch (Throwable $exception) {
            dd($exception);
        }
    }

    public function destroy($id)
    {
        try {
            $data = Blog::findOrFail($id);
            $data->delete();
        } catch (Throwable $exception) {
            dd($exception);
        }
        return redirect('/dashboard')->with('message', 'Blog deleted successfully!');
    }

    public function trying($id)
    {
        $data = Blog::findOrFail($id);
        dd($data);
    }

    public function login()
    {
        // $data = Blog::get();
        return view('pages.auth.login', [
            // 'data' => $data
        ]);
    }

    public function dashboard()
    {
        $data = Blog::latest()->filter(request(['status', 'search']))->paginate(10);
        return view('pages.blog.dashboard', [
            'data' => $data
        ]);
    }

    public function register()
    {
        // $data = Blog::get();
        return view('pages.auth.register', [
            // 'data' => $data
        ]);
    }
}
