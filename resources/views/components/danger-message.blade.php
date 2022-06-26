@if (session('danger-message'))
<div x-data="{open: true}" x-show="open" x-init="setTimeout(() => open = false, 3000)"
    class="rounded bg-red-600 mx-4 mb-4 sm:mx-4">
    <div class="max-w-7xl mx-auto py-2 px-3 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between flex-wrap">
            <div class="w-0 flex-1 flex items-center">
                <span class="flex p-2 rounded-lg " style="background: #ca0f0f">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25.688" height="23.231" viewBox="0 0 25.688 23.231">
                        <g id="warning" transform="translate(-0.001 -9.193)">
                            <g id="Group_2" data-name="Group 2" transform="translate(0.001 9.193)">
                                <g id="Group_1" data-name="Group 1" transform="translate(0 0)">
                                    <path id="Path_1" data-name="Path 1"
                                        d="M14.464,27.265a1.556,1.556,0,0,1-1.609,1.647h-.034a1.647,1.647,0,1,1,1.643-1.647Zm-2.64-2.55h2.065l.395-8.2H11.426Zm13.627,6.916a1.647,1.647,0,0,1-1.4.792H1.643A1.642,1.642,0,0,1,.232,29.939L11.477,9.99a1.63,1.63,0,0,1,1.407-.8h.044a1.632,1.632,0,0,1,1.406.875L25.5,30.019A1.634,1.634,0,0,1,25.452,31.632Zm-1.4-.856L12.882,10.832,1.644,30.776Z"
                                        transform="translate(-0.001 -9.193)" fill="#fff" />
                                </g>
                            </g>
                        </g>
                    </svg>
                </span>
                <p class="ml-3 font-medium text-white truncate">
                    <span class="md:inline">
                        {{ session('danger-message') }}
                    </span>
                </p>
            </div>
            <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                <button type="button" x-on:click="open = false" type="button"
                    class="-mr-1 flex p-2 rounded-md hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
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
