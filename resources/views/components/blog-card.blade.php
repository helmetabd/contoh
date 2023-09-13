@props(['blog'])
<div class="col col-span-1">
    <div
        class="block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
        <div>
            <img src={{ $blog->image }} class="rounded-md mb-5 shadow-md shadow-warning-600" alt="placeholder">
        </div>
        <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50 text-center">
            {{ $blog->seo_title }}
        </h5>
        <a class="mb-2 inline-block whitespace-nowrap rounded-full bg-primary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-primary-700"
            href="/?category={{ $blog->category ? $blog->category->name : 'Uncategorized' }}">
            {{ $blog->category ? $blog->category->name : 'Uncategorized' }}
        </a>
        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200 text-justify">
            {{ substr($blog->excerpt, 0, 100) }}
        </p>
        <div class="grid grid-cols-2 gap-2">
            <div>
                <a href="{{ route('blogs.detail', $blog->id) }}"
                    class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                    Read More
                </a>
            </div>
            <div class="grid grid-row-2 justify-center">
                @if( $blog->status =  "published")
                    <a href="/?status={{ $blog->status }}" class="mb-2 inline-block whitespace-nowrap rounded-[0.27rem] bg-success-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-success-700">
                        {{ $blog->status }}
                    </a>
                @elseif( $blog->status  = "draft" )
                    <a href="/?status={{ $blog->status }}" class="mb-2 inline-block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800">
                        {{ $blog->status }}
                    </a>
                @else
                    <a href="/?status={{ $blog->status }}"    class="mb-2 inline-block whitespace-nowrap rounded-[0.27rem] bg-primary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-primary-700">
                        {{ $blog->status }}
                    </a>
                @endif
                <p class="text-sm"> {{ $blog->updated_at ? $blog->updated_at->format('Y-m-d') : $blog->created_at->format('Y-m-d')}} </p>
            </div>
        </div>
    </div>
</div>
