<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Throwable;

class BlogController extends Controller
{
    public function index()
    {
        $data = Blog::latest()->paginate(10);
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
        $formFields = $request->validate([
            'title' => 'required',
            'gender' => 'required|in:male,female',
            'is_publish' => 'required|boolean',
            'description' => 'required'
        ]);

        Blog::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');;
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

    public function destroy($id)
    {
        try {
            $data = Blog::findOrFail($id);
            $data->delete();
        } catch(Throwable $exception){
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
