<div x-data="{createOpen:false}" class="inline">
    <button x-on:click="createOpen = true"
        class="px-4 py-2 font-medium text-sm inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-indigo-500 hover:bg-indigo-600 text-white">
        <svg class="w-3 h-3 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
            <path
                d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
        </svg>
        <span class="xs:block text-sm ml-2">Add medicine</span>
    </button>
    <div x-show="createOpen" x-cloak x-on:click="createOpen = false"
        class="bg-black/40 z-[500] fixed top-0 bottom-0 right-0 left-0">
    </div>

    {{-- create modal --}}
    <div x-show="createOpen" x-cloak>
        <div class="absolute bg-slate-50 shadow-md rounded-md top-2/4 left-2/4 w-3/4 -translate-y-2/4 -translate-x-2/4"
            style="z-index: 501;">

            <header class="flex justify-between items-center  p-4 border rounded-md border-b-1 border-gray-200">
                <h2 class="font-medium">Add Medicine</h2>
                <svg x-on:click="createOpen = false" class="h-4 w-4 cursor-pointer" viewBox="0 0 16 16" fill="gray">
                    <path
                        d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z">
                    </path>
                </svg>
            </header>
            <form class=" p-4" action="/medicine-create" method="POST">
                @csrf
                <div>
                    <x-label for="medicine_name" :value="__('Medicine Name')" />
                    <x-input id="medicine_name" class="block mt-1 w-full" type="text" name="medicine_name"
                        :value="old('medicine_name')" required autofocus />
                </div>
                <div class="mt-4">
                    <x-label for="medicine_quantity" :value="__('Medicine Quantity')" />
                    <x-input id="medicine_quantity" class="block mt-1 w-full" type="number" name="medicine_quantity"
                        :value="old('medicine_quantity')" required autofocus />
                </div>
                <div class="mt-4">
                    <x-label for="medicine_cost" :value="__('Medicine Cost')" />
                    <x-input id="medicine_cost" class="block mt-1 w-full" type="number" name="medicine_cost"
                        :value="old('medicine_cost')" required autofocus />
                </div>
                <div class="mt-4">
                    <x-label for="date_of_acquisition" :value="__('Date of Acquisition')" />
                    <x-input id="date_of_acquisition" class="block mt-1 w-full" type="text" name="date_of_acquisition"
                        :value="old('date_of_acquisition')" required autofocus />
                </div>

                <button
                    class="mt-4 bg-indigo-500 hover:bg-indigo-600 inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest  active:bg-indigo-900 focus:outline-none focus:border-v-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    {{ __('Yes, Create it') }}
                </button>
            </form>
        </div>
    </div>
</div>
