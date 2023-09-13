@unless ($breadcrumbs->isEmpty())
    <div class="flex w-full flex-wrap items-center justify-between px-3">
        <nav class="bg-grey-light w-full rounded-md" aria-label="breadcrumb">
            <ol class="list-reset flex breadcrumb">
                @foreach ($breadcrumbs as $breadcrumb)
                    @if (!is_null($breadcrumb->url) && !$loop->last)
                        <li class="breadcrumb-item">
                            <a class= "text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                        </li>
                        <li>
                            <span class="mx-2 text-neutral-500 dark:text-neutral-200">/</span>
                        </li>
                    @else
                        <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
                    @endif
                @endforeach
                {{-- <li>
                    <a href="/" class="text-neutral-500 hover:text-neutral-600 dark:text-neutral-200">Home</a>
                </li>
                <li>
                    <span class="mx-2 text-neutral-500 dark:text-neutral-200">/</span>
                </li>
                <li>
                    <a href="blogs.detail" class="text-neutral-500 hover:text-neutral-600 dark:text-neutral-200">Details</a>
                </li>
                <li>
                    <span class="mx-2 text-neutral-500 dark:text-neutral-200">/</span>
                </li>
                <li>
                    <a href="#" class="text-neutral-500 hover:text-neutral-600 dark:text-neutral-200">Dashboard</a>
                </li> --}}
            </ol>
        </nav>
    </div>
    <ol class="breadcrumb">

    </ol>
@endunless
