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
            {{-- Medical Records --}}
            <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index*')">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="#94A3B8" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span class="text-sm font-medium ml-3 lg:opacity-100 2xl:opacity-100 duration-200">
                        {{ __('Clinical Records') }}
                    </span>
                </div>
            </x-nav-link>
            {{-- -** Admin (nurse) sidebar --}}
            @if (Auth::user()->hasRole('administrator|nurse'))
            {{-- Treatment Records --}}
            <x-nav-link :href="route('treatment-records.index')"
                :active="request()->routeIs('treatment-records.index*')">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        style="fill: rgba(148, 163, 184, 1);transform: ;msFilter:;">
                        <path
                            d="M6 22h12a2 2 0 0 0 2-2V8l-6-6H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2zm7-18 5 5h-5V4zM8 14h3v-3h2v3h3v2h-3v3h-2v-3H8v-2z">
                        </path>
                    </svg>
                    <span class="text-sm font-medium ml-3 lg:opacity-100 2xl:opacity-100 duration-200">
                        {{ __('Treatment Records') }}
                    </span>
                </div>
            </x-nav-link>
            {{-- Patient Records --}}
            <x-nav-link :href="route('patient.index')" :active="request()->routeIs('patient.index*')">
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
                        {{ __('Patient Records') }}
                    </span>
                </div>
            </x-nav-link>
            @endif

            @if (Auth::user()->hasRole('administrator'))
            {{-- Medicine --}}
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
            {{-- Daily Records Report --}}
            <x-nav-link :href="route('report.index')" :active="request()->routeIs('report.index*')">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        style="fill: rgba(148, 163, 184, 1);transform: ;msFilter:;">
                        <path
                            d="M19.903 8.586a.997.997 0 0 0-.196-.293l-6-6a.997.997 0 0 0-.293-.196c-.03-.014-.062-.022-.094-.033a.991.991 0 0 0-.259-.051C13.04 2.011 13.021 2 13 2H6c-1.103 0-2 .897-2 2v16c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V9c0-.021-.011-.04-.013-.062a.952.952 0 0 0-.051-.259c-.01-.032-.019-.063-.033-.093zM16.586 8H14V5.414L16.586 8zM6 20V4h6v5a1 1 0 0 0 1 1h5l.002 10H6z">
                        </path>
                        <path d="M8 12h8v2H8zm0 4h8v2H8zm0-8h2v2H8z"></path>
                    </svg>
                    <span class="text-sm font-medium ml-3 lg:opacity-100 2xl:opacity-100 duration-200">
                        {{ __('Reports') }}
                    </span>
                </div>
            </x-nav-link>
            @endif
            @if (Auth::user()->hasRole('administrator|superadministrator'))
            {{-- Medical Examination Report --}}
            <x-nav-link :href="route('medical-examination-report.index')"
                :active="request()->routeIs('medical-examination-report.index*')">
                <div class="flex items-center">

                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-files" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#94A3B8" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M15 3v4a1 1 0 0 0 1 1h4" />
                        <path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" />
                        <path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" />
                    </svg>
                    <span class="text-sm font-medium ml-3 lg:opacity-100 2xl:opacity-100 duration-200">
                        {{ __('Examination Reports') }}
                    </span>
                </div>
            </x-nav-link>
            @endif
            @if (Auth::user()->hasRole('superadministrator|nurse'))
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
            @endif
            {{-- -** Superadministrator (doctor) sidebar --}}
            @if (Auth::user()->hasRole('superadministrator'))
            {{-- Create account/Register --}}
            <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        style="fill: rgba(148, 163, 184, 1);transform: ;msFilter:;">
                        <path
                            d="M19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 8a3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4 3.91 3.91 0 0 0-4 4zm6 0a1.91 1.91 0 0 1-2 2 1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2zM4 18a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v1h2v-1a5 5 0 0 0-5-5H7a5 5 0 0 0-5 5v1h2z">
                        </path>
                    </svg>
                    <span class="text-sm font-medium ml-3 lg:opacity-100 2xl:opacity-100 duration-200">
                        {{ __('Create account') }}
                    </span>
                </div>
            </x-nav-link>
            @endif
        </ul>
    </div>
</nav>