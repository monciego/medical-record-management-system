{{-- Sidebar Header --}}
<header class="flex justify-between mb-10 pr-3 sm:px-2">
    {{-- Close button --}}
    <button class="lg:hidden text-slate-500 hover:text-slate-400">
        <span class="sr-only">Close sidebar</span>
        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
        </svg>
    </button>
    {{-- logo --}}
    <a href="/" class="block">
        <x-application-logo class="block h-12 " />
    </a>
</header>

{{-- links --}}
<nav class="space-y-8">
    {{-- Pages Group --}}
    <div>
        <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
            <span class="lg:block 2xl:block">Pages</span>
        </h3>
        <ul class="mt-3">
            {{-- Dashboard --}}
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <div class="flex items-center">
                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                        <path class="fill-current !text-indigo-500"
                            d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z"></path>
                        <path class="fill-current text-indigo-600"
                            d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z"></path>
                        <path class="fill-current text-indigo-200"
                            d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z">
                        </path>
                    </svg>
                    <span class="text-sm font-medium ml-3 lg:opacity-100 2xl:opacity-100 duration-200">
                        {{ __('Dashboard') }}
                    </span>
                </div>
            </x-nav-link>
            {{-- -** Admin sidebar --}}
            @if (Auth::user()->hasRole('administrator'))
            {{-- Analytics --}}
            <x-nav-link :href="route('analytics')" :active="request()->routeIs('analytics')">
                <div class="flex items-center">
                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                        <path class="fill-current text-slate-600 false" d="M0 20h24v2H0z"></path>
                        <path class="fill-current text-slate-400 false"
                            d="M4 18h2a1 1 0 001-1V8a1 1 0 00-1-1H4a1 1 0 00-1 1v9a1 1 0 001 1zM11 18h2a1 1 0 001-1V3a1 1 0 00-1-1h-2a1 1 0 00-1 1v14a1 1 0 001 1zM17 12v5a1 1 0 001 1h2a1 1 0 001-1v-5a1 1 0 00-1-1h-2a1 1 0 00-1 1z">
                        </path>
                    </svg>
                    <span class="text-sm font-medium ml-3 lg:opacity-100 2xl:opacity-100 duration-200">
                        {{ __('Analytics') }}
                    </span>
                </div>
            </x-nav-link>
            {{-- Analytics --}}
            <x-nav-link :href="route('medicine.index')" :active="request()->routeIs('medicine.index')">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-medicine-syrup"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#94A3B8" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 21h8a1 1 0 0 0 1 -1v-10a3 3 0 0 0 -3 -3h-4a3 3 0 0 0 -3 3v10a1 1 0 0 0 1 1z" />
                        <path d="M10 14h4" />
                        <path d="M12 12v4" />
                        <path d="M10 7v-3a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v3" />
                    </svg>
                    <span class="text-sm font-medium ml-3 lg:opacity-100 2xl:opacity-100 duration-200">
                        {{ __('Medicines') }}
                    </span>
                </div>
            </x-nav-link>
            {{-- Equipment --}}
            <x-nav-link :href="route('equipment')" :active="request()->routeIs('equipment')">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tool" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#94A3B8" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M7 10h3v-3l-3.5 -3.5a6 6 0 0 1 8 8l6 6a2 2 0 0 1 -3 3l-6 -6a6 6 0 0 1 -8 -8l3.5 3.5" />
                    </svg>
                    <span class="text-sm font-medium ml-3 lg:opacity-100 2xl:opacity-100 duration-200">
                        {{ __('Equipment') }}
                    </span>
                </div>
            </x-nav-link>
            {{-- Patient --}}
            <x-nav-link :href="route('patient')" :active="request()->routeIs('patient*')">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#94A3B8" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        <path d="M16 11h6m-3 -3v6" />
                    </svg>
                    <span class="text-sm font-medium ml-3 lg:opacity-100 2xl:opacity-100 duration-200">
                        {{ __('Patient') }}
                    </span>
                </div>
            </x-nav-link>
            @endif
        </ul>
    </div>
</nav>
