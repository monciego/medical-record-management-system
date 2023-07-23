<nav x-data="{ open: false }" class="bg-white border-b border-slate-200 z-30">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex lg:hidden shrink-0 items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>
            </div>

            <div class="flex gap-4 items-center">

                {{-- Notifcation --}}
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex bg-indigo-500 hover:bg-indigo-600 p-2 rounded-full items-center text-sm font-medium text-gray-100 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                            </svg>

                        </button>
                    </x-slot>

                    <x-slot name="content" class="bg-red-500">
                        <div class="p-2">
                            @foreach ($medicines_global as $medicine_global)
                            @if ($medicine_global->medicine_quantity <= 100) <p
                                class="text-sm border-b border-b-black py-2">
                                {{ $medicine_global->medicine_name }} is
                                <span style="color: rgb(171, 133, 21)" class="underline">
                                    critical stock
                                </span>
                                </p>
                                @endif

                                @if ($medicine_global->date_of_expiration < $currentTimeGlobal) <p
                                    class="text-sm border-b border-b-black py-2">
                                    {{ $medicine_global->medicine_name }} is <span class="text-red-600 underline">
                                        expired
                                    </span>
                                    </p>
                                    @endif
                                    @endforeach
                        </div>
                    </x-slot>
                </x-dropdown>

                <!-- Settings Dropdown -->
                <div class="hidden lg:block ">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Change Password -->
                            @include('pages.admin.change-name.change-name')
                            <!-- Change Password -->
                            @include('auth.change-password.change-password')
                            <!-- School Year -->
                            @if (Auth::user()->hasRole('administrator'))
                            @include('pages.admin.school-year.dropdown-link')
                            @endif
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

            </div>
            <!-- Hamburger -->
            <div class="-mr-2 flex items-center lg:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="lg:hidden fixed left-0 right-0 z-50 bg-white shadow">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            @if (Auth::user()->hasRole('administrator'))
            <x-responsive-nav-link :href="route('analytics')" :active="request()->routeIs('analytics')">
                {{ __('Analytics') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('medicine.index')" :active="request()->routeIs('medicine.index')">
                {{ __('Medicines') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                {{ __('Clinical Records') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('patient.index')" :active="request()->routeIs('patient.index')">
                {{ __('Patient Records') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('treatment-records.index')"
                :active="request()->routeIs('treatment-records.index')">
                {{ __('Treatment Records') }}
            </x-responsive-nav-link>
            @endif
            <x-responsive-nav-link :href="route('medical-examination-report.index')"
                :active="request()->routeIs('medical-examination-report.index')">
                {{ __('Examination Reports') }}
            </x-responsive-nav-link>
            @if (Auth::user()->hasRole('superadministrator'))
            <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                {{ __('Create account') }}
            </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('change-password.index')"
                    :active="request()->routeIs('change-password.index')">
                    {{ __('Change Password') }}
                </x-responsive-nav-link>
                @if (Auth::user()->hasRole('administrator'))
                <x-responsive-nav-link :href="route('school-year.index')"
                    :active="request()->routeIs('school-year.index')">
                    {{ __('School Year') }}
                </x-responsive-nav-link>
                @endif
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>