{{-- Sidebar Header --}}
<header class="flex justify-between mb-10 pr-3 sm:px-2">
  {{-- Close button --}}
  <button class="lg:hidden text-slate-500 hover:text-slate-400">
    <span class="sr-only">Close sidebar</span>
    <svg
      class="w-6 h-6 fill-current"
      viewBox="0 0 24 24"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
    </svg>
  </button>
  {{-- logo --}}
  <a href="/" class="block">
    <svg width="32" height="32" viewBox="0 0 32 32">
      <defs>
        <linearGradient
          x1="28.538%"
          y1="20.229%"
          x2="100%"
          y2="108.156%"
          id="logo-a"
        >
          <stop stop-color="#A5B4FC" stop-opacity="0" offset="0%"></stop>
          <stop stop-color="#A5B4FC" offset="100%"></stop>
        </linearGradient>
        <linearGradient
          x1="88.638%"
          y1="29.267%"
          x2="22.42%"
          y2="100%"
          id="logo-b"
        >
          <stop stop-color="#38BDF8" stop-opacity="0" offset="0%"></stop>
          <stop stop-color="#38BDF8" offset="100%"></stop>
        </linearGradient>
      </defs>
      <rect fill="#6366F1" width="32" height="32" rx="16"></rect>
      <path
        d="M18.277.16C26.035 1.267 32 7.938 32 16c0 8.837-7.163 16-16 16a15.937 15.937 0 01-10.426-3.863L18.277.161z"
        fill="#4F46E5"
      ></path>
      <path
        d="M7.404 2.503l18.339 26.19A15.93 15.93 0 0116 32C7.163 32 0 24.837 0 16 0 10.327 2.952 5.344 7.404 2.503z"
        fill="url(#logo-a)"
      ></path>
      <path
        d="M2.223 24.14L29.777 7.86A15.926 15.926 0 0132 16c0 8.837-7.163 16-16 16-5.864 0-10.991-3.154-13.777-7.86z"
        fill="url(#logo-b)"
      ></path>
    </svg>
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
              <path
                class="fill-current !text-indigo-500"
                d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z"
              ></path>
              <path
                class="fill-current text-indigo-600"
                d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z"
              ></path>
              <path
                class="fill-current text-indigo-200"
                d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z"
              ></path>
            </svg>
            <span class="text-sm font-medium ml-3 lg:opacity-100 2xl:opacity-100 duration-200">
              {{ __('Dashboard') }}
            </span>
          </div>
        </x-nav-link>
        {{-- Analytics --}}
       <x-nav-link :href="route('analytics')" :active="request()->routeIs('analytics')">
          <div class="flex items-center">
            <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
              <path
                class="fill-current text-slate-600 false"
                d="M0 20h24v2H0z"
              ></path>
              <path
                class="fill-current text-slate-400 false"
                d="M4 18h2a1 1 0 001-1V8a1 1 0 00-1-1H4a1 1 0 00-1 1v9a1 1 0 001 1zM11 18h2a1 1 0 001-1V3a1 1 0 00-1-1h-2a1 1 0 00-1 1v14a1 1 0 001 1zM17 12v5a1 1 0 001 1h2a1 1 0 001-1v-5a1 1 0 00-1-1h-2a1 1 0 00-1 1z"
              ></path>
            </svg>
            <span class="text-sm font-medium ml-3 lg:opacity-100 2xl:opacity-100 duration-200">
              {{ __('Analytics') }}
            </span>
          </div>
        </x-nav-link>
      {{-- Analytics --}}
      {{-- <li class="">
        <a
          href=""
          class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 block text-slate-200 truncate transition duration-150 hover:text-slate-200"
        >
          <div class="flex items-center">
            <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
              <path
                class="fill-current text-slate-600 false"
                d="M0 20h24v2H0z"
              ></path>
              <path
                class="fill-current text-slate-400 false"
                d="M4 18h2a1 1 0 001-1V8a1 1 0 00-1-1H4a1 1 0 00-1 1v9a1 1 0 001 1zM11 18h2a1 1 0 001-1V3a1 1 0 00-1-1h-2a1 1 0 00-1 1v14a1 1 0 001 1zM17 12v5a1 1 0 001 1h2a1 1 0 001-1v-5a1 1 0 00-1-1h-2a1 1 0 00-1 1z"
              ></path>
            </svg>
            <span
              class="text-sm font-medium ml-3 lg:opacity-100 2xl:opacity-100 duration-200"
              >Analytics</span
            >
          </div>
        </a>
      </li> --}}
    </ul>
  </div>
</nav>