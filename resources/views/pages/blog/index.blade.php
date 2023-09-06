<x-layouts.app title="Percobaan">
    <div class="mt-10 mx-10 grid xs:grid-cols-1 lg:grid-cols-4 gap-5">
        @foreach ($data as $blog)
            <x-blog-card :blog="$blog" />
        @endforeach
    </div>
</x-layouts.app>
