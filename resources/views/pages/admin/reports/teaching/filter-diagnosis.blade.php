<!-- This example requires Tailwind CSS v2.0+ -->
<div class="mr-4  relative inline-block text-left" x-data="{filterOpen:false}">
    <div x-show="filterOpen" x-cloak x-on:click="filterOpen = false"
        class="z-[500] fixed top-0 bottom-0 right-0 left-0">
    </div>
    <div>
        <button type="button" x-on:click="filterOpen = !filterOpen"
            class="inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100"
            id="menu-button" aria-expanded="true" aria-haspopup="true">
            Filter by diagnosis
            <!-- Heroicon name: mini/chevron-down -->
            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    <div x-show="filterOpen" x-cloak
        class="z-[600] max-h-56 overflow-y-scroll absolute right-0  mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="filter" aria-orientation="vertical" aria-labelledby="filter-button" tabindex="-1">
        <a class="text-gray-700 block px-4 py-3 text-sm hover:bg-slate-100"
            href="{{ route('report.teaching') }}">All</a>
        @foreach ($diagnosis as $diagnosis_item)
        <a class="text-gray-700 block px-4 py-3 text-sm hover:bg-slate-100"
            href="{{ route('report.teaching') }}/?diagnosis={{ $diagnosis_item }}">
            {{ $diagnosis_item }}
        </a>
        @endforeach
    </div>
</div>