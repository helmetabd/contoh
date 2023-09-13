@extends('layouts.app', ['title' => 'Home'])
@section('content')
    <div class="mt-10 mx-10 grid xs:grid-cols-1 lg:grid-cols-4 gap-5">
        @foreach ($data as $blog)
            <x-blog-card :blog="$blog" />
        @endforeach
    </div>
@endsection

@push('breadcrumb')
    {{ Breadcrumbs::render('home') }}
@endpush
