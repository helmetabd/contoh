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
        // dd('blah');
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
            $formFields['slug'] = Str::of($request->title)->slug('-');
            $formFields['author_id'] = Auth::id();
            Blog::create($formFields);
        } catch (Throwable $exception) {
            dd($exception);
        }
        return redirect('/')->with('message', 'Listing created successfully!');;
    }

    public function show($slug)
    {
        $data = Blog::where('slug', $slug)->first();
        // dd($data);
        return view('pages.blog.details', [
            'blog' => $data
        ]);
    }

    public function edit($slug)
    {
        $data = Blog::where('slug', $slug)->first();
        return view('pages.blog.edit', [
            'blog' => $data
        ]);
    }

    public function update(Request $request, $slug)
    {
        try {
            $data = Blog::where('slug', $slug)->first();
            $formFields = $request->validate([
                'title' => 'required|min:3|max:255',
                'seo_title' => 'sometimes|nullable|min:3|max:255',
                'excerpt' => 'sometimes|nullable|min:3',
                'body' => 'required|min:3',
                'image' => 'sometimes|nullable|string',
                'status' => 'required|in:published,draft,pending',
                'featured' => 'sometimes|boolean'
            ]);
            $formFields['slug'] = Str::of($request->title)->slug('-');
            $data->update($formFields);
        } catch (Throwable $exception) {
            dd($exception);
        }

        return redirect()->route('blogs.detail', $data['slug'])->withSuccess('You have successfully updated a Category!');
    }

    public function destroy($slug)
    {
        try {
            $data = Blog::where('slug', $slug)->first();
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

    

    public function register()
    {
        // $data = Blog::get();
        return view('pages.auth.register', [
            // 'data' => $data
        ]);
    }
}
