@extends('layouts.app', ['title' => 'Edit Blog'])
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('blogs.update', $blog->slug) }} ">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Title <span class="text-red-500">*</span></label></br>
                            <input oninput="titleToSlug(this.value)" type="text"
                                class="border-2 border-gray-300 p-2 w-full" name="title" id="title"
                                value="{{ $blog->title }}" placeholder="Title Here" required>
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="slug" class="text-xl text-gray-600">Slug <span
                                    class="text-red-500">*</span></label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="slug" id="slug"
                                required value="{{ $blog->slug }}">
                            @error('slug')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="relative flex flex-wrap items-stretch mb-8">
                            <label
                                class="flex items-center whitespace-nowrap rounded-l border border-r-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700 dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200"
                                for="category_id">Category</label>
                            <select
                                class="form-select relative m-0 block w-[1px] min-w-0 flex-auto rounded-r border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:bg-neutral-800 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                id="category_id" name="category_id" value="{{ $blog->category_id }}" disabled>
                                <option selected>Choose...</option>
                                @foreach (App\Models\Category::pluck('name', 'id') as $key => $item)
                                    <option value={{ $key }}
                                        @if ($blog->category_id == $key) 
                                            @selected(true) 
                                        @endif>
                                        {{ $item }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="body" class="text-xl text-gray-600">Content <span
                                    class="text-red-500">*</span></label></br>
                            <textarea name="body" class="border-2 border-gray-500">
                                {{$blog->body}}
                            </textarea>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="text-xl text-gray-600">Image Url</label></br>
                            <input type="url" class="border-2 border-gray-300 p-2 w-full" name="image" id="image"
                                value="{{ $blog->image }}" placeholder="Image url here">
                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- <div class="mb-4">
                        <label for="image" class="mb-2 inline-block text-neutral-700 dark:text-neutral-200">Cover
                            Image</label>
                        <input
                            class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                            type="file" id="image" name="image"/>
                    </div> --}}

                        <h2 class="text-left text-gray-700 font-normal text-2xl my-5">SEO Tags</h2>

                        <div class="mb-4">
                            <label for="seo_title" class="text-xl text-gray-600">Meta Title</label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="seo_title"
                                id="seo_title" value="{{ $blog->seo_title }}" placeholder="Meta title Here">
                            @error('seo_title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="excerpt" class="text-xl text-gray-600">Meta Description</label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="excerpt" id="excerpt"
                                placeholder="Optional" value="{{$blog->excerpt}}">
                            @error('excerpt')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="featured" class="text-xl text-gray-600">Featured <span
                                    class="text-red-500">*</span></label></br>
                            <input type="checkbox" class="border-2 border-gray-300 p-2 ml-2" name="featured" id="featured"
                                @if ($blog->featured = true)
                                    @checked(true)
                                @else
                                    @checked(false)
                                @endif
                                
                                @if ('checked="checked"') 
                                    value="1" 
                                @else
                                    value="0" 
                                @endif>
                            @error('featured')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex p-1">
                            <label
                                class="flex items-center whitespace-nowrap rounded-l border border-r-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700 dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200"
                                for="status">Status Mode <span class="text-red-500">*</span></label>
                            <select class="border-2 border-gray-300 border-r p-2" name="status" id="status"
                                value="{{$blog->status}}">
                                <option value="published">Save and Publish</option>
                                <option value="draft">Save as Draft</option>
                                <option value="pending">Save as Pending</option>
                            </select>
                            <button type="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('body');
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        function titleToSlug(text) {
            // console.log(text);
            let slug = Lodash.kebabCase(text);
            document.getElementById('slug').value = slug;
        }
    </script>
@endsection
