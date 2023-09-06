<x-layouts.app title="Detail">
    <!-- Container for demo purpose -->
    <a href="/" class="inline-block text-black ml-4 mb-1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-7 h-7 my-3">
            <path fill-rule="evenodd"
                d="M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z"
                clip-rule="evenodd" />
        </svg>
    </a>
    <div class="container my-24 mx-auto md:px-6">
        <!-- Section: Design Block -->
        <section class="mb-32">
            <img src={{ $blog->image }} class="mb-6 w-full rounded-lg shadow-lg dark:shadow-black/20" alt="image" />

            <div class="mb-6 flex items-center">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (23).jpg" class="mr-2 h-8 rounded-full"
                    alt="avatar" loading="lazy" />
                <div>
                    <span> {{ $blog->status }} <u>{{ $blog->created_at }}</u> by </span>
                    <a href="#!" class="font-medium">Anna Maria Doe</a>
                </div>
            </div>

            <h1 class="mb-6 text-3xl font-bold">
                {{ $blog->title }}
            </h1>

            <p>
                {{ $blog->body }}
            </p>
        </section>
        <!-- Section: Design Block -->
    </div>
    <!-- Container for demo purpose -->
</x-layouts.app>
