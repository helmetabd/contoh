<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('includes.page-styles')
    <title>{{ $title }}</title>
</head>

<body>
    <header>
        @include('includes.navbar')
    </header>
    <main>
        @yield('content')
    </main>
    @include('includes.footer')
    @include('includes.page-js')
</body>

</html>
