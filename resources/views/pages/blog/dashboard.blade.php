@extends('layouts.app', ['title' => 'Dashboard'])
@section('content')
    <div class="mt-10 mb-10 mx-10 grid xs:grid-cols-1 lg:grid-cols-1 gap-5">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rounded-md text-gray-500 dark:text-gray-400">
                <div class="flex flex-row row-2 items-center justify-between">
                    <label
                        class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        List of Blogs
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">There are
                            <span>{{ $data->count() }}</span> registered blogs listed.
                        </p>
                    </label>
                    <div class="flex flex-row row-2 items-center justify-between">
                        {{-- <p>asjbbfabkjsdvjkjabsvkabsdvjkbsdkjvbajskbdvsabdvka</p> --}}
                        {{-- <li
                            class="{{ Request::is('dashboard/*') || Request::is('products') || Request::is('product/*') ? 'active' : '' }}">
                            <a href="{{ url('products') }}"><i class="fa fa-code-fork"></i>&nbsp; Products</a>
                        </li> --}}
                        <a href="/dashboard" id="reload" title="create new blog"
                            class="bg-green-400 text-white p-3 mr-4 rounded flex flex-row {{ Request::is('/dashboard/*') ? 'active' : '' }}">
                            {{-- <label for="create" class="mr-1">Create</label> --}}
                            <svg class="w-4 h-4 text-white dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 1v5h-5M2 19v-5h5m10-4a8 8 0 0 1-14.947 3.97M1 10a8 8 0 0 1 14.947-3.97" />
                            </svg>
                        </a>
                        <a href="{{ route('blogs.create') }}" id="create" title="create new blog"
                            class="bg-green-400 text-white p-3 mr-4 rounded flex flex-row">
                            {{-- <label for="create" class="mr-1">Create</label> --}}
                            <svg class="w-4 h-4 text-white dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 19H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2v4M6 1v4a1 1 0 0 1-1 1H1m11 8h4m-2 2v-4m5 2a5 5 0 1 1-10 0 5 5 0 0 1 10 0Z" />
                            </svg>
                        </a>
                    </div>
                </div>
                <form>
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative mb-2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search" name="search"
                            class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-transparent focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search Blog">
                        <button type="submit"
                            class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>
                <thead class="text-xs text-gray-700 uppercase bg-indigo-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox" name="checkbox1"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all-search" class="sr-only p-1"></label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Content
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Featured
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $blog)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    {{-- <label for="checkbox-table-search-1" class="sr-only p-1">checkbox</label> --}}
                                </div>
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $blog->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $blog->title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $blog->excerpt }}
                            </td>
                            <td class="px-6 py-4">
                                <img class="w-10 h-10 rounded" src={{ $blog->image }} alt={{ $blog->title }}>
                            </td>
                            <td class="px-6 py-4">
                                <a href="/dashboard/?status={{ $blog->status }}">{{ $blog->status }}</a>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center mb-4">
                                    <input disabled id="disabled-checkbox" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        {{ $blog->featured ? 'checked="checked"' : '' }}>
                                </div>
                            </td>
                            <td class="flex items-center justify-around px-6 py-4 space-x-3">
                                <a href="#" class="text-blue-600 hover:underline" title="edit blog">
                                    <svg class="w-6 h-6 text-blue-600 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279" />
                                    </svg>
                                </a>
                                <form method="POST" action="{{ route('blogs.delete', $blog->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500" title="delete blog">
                                        <svg class="w-6 h-6 text-red-500 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                            {{-- <td class="flex items-center justify-around px-6 py-4 space-x-3">
                                <form method="POST" action="{{ route('blogs.trying', $blog->id) }}">
                                    @csrf
                                    @method('GET')
                                    <button class="text-red-500">
                                        <svg class="w-6 h-6 text-red-500 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M16 1v5h-5M2 19v-5h5m10-4a8 8 0 0 1-14.947 3.97M1 10a8 8 0 0 1 14.947-3.97" />
                                        </svg>
                                    </button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

{{-- @push('styles')
    @livewireStyles
    @powerGridStyles
@endpush

@push('scripts')
    @livewireScripts
    @powerGridScripts
@endpush --}}

@push('flowbite')
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
@endpush
