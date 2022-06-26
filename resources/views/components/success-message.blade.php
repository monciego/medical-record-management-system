@if (session('success-message'))
<div x-data="{open: true}" x-show="open" x-init="setTimeout(() => open = false, 3000)"
    class="bg-indigo-600 rounded mb-4 sm:mx-4">
    <div class="max-w-7xl mx-auto py-2 px-3 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between flex-wrap">
            <div class="w-0 flex-1 flex items-center">
                <span class="flex p-2 rounded-lg bg-indigo-800">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24.615" height="17.911" viewBox="0 0 24.615 17.911">
                        <g id="check" transform="translate(0 -55.188)">
                            <path id="Path_2" data-name="Path 2"
                                d="M23.894,59.393,10.908,72.378a2.464,2.464,0,0,1-3.484,0l-6.7-6.7A2.463,2.463,0,0,1,4.2,62.19l4.962,4.962L20.41,55.909a2.464,2.464,0,0,1,3.484,3.484Z"
                                fill="#fff" />
                        </g>
                    </svg>

                </span>
                <p class="ml-3 font-medium text-white truncate">
                    <span class="md:inline">
                        {{ session('success-message') }}
                    </span>
                </p>
            </div>
            <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                <button x-on:click="open = false" type="button"
                    class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
                    <span class="sr-only">Dismiss</span>
                    <!-- Heroicon name: outline/x -->
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
@endif
