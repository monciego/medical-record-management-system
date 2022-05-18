<x-app-layout>
    <div class="col-span-full xl:col-span-6 bg-white shadow-lg rounded-sm border border-slate-200">
        <header class="px-5 py-4 border-b border-slate-100 flex justify-between items-center">
            <h2 class="font-semibold text-slate-800">Medicines</h2>
            <button
                class="px-4 py-2 font-medium text-sm inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-indigo-500 hover:bg-indigo-600 text-white">
                <svg class="w-3 h-3 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                    <path
                        d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                </svg>
                <span class="xs:block text-sm ml-2">Add medicine</span>
            </button>
        </header>
        <div class="p-3">
            @include('pages.admin.medicine.medicine-table')
        </div>
    </div>

    <form class="mt-4" action="/medicine-create" method="POST">
        @csrf
        <div>
            <x-label for="medicine_name" :value="__('Medicine Name')" />
            <x-input id="medicine_name" class="block mt-1 w-2/4" type="text" name="medicine_name"
                :value="old('medicine_name')" required autofocus />
        </div>
        <div class="mt-4">
            <x-label for="medicine_quantity" :value="__('Medicine Quantity')" />
            <x-input id="medicine_quantity" class="block mt-1 w-2/4" type="number" name="medicine_quantity"
                :value="old('medicine_quantity')" required autofocus />
        </div>
        <div class="mt-4">
            <x-label for="medicine_cost" :value="__('Medicine Cost')" />
            <x-input id="medicine_cost" class="block mt-1 w-2/4" type="number" name="medicine_cost"
                :value="old('medicine_cost')" required autofocus />
        </div>
        <div class="mt-4">
            <x-label for="date_of_acquisition" :value="__('Date of Acquisition')" />
            <x-input id="date_of_acquisition" class="block mt-1 w-2/4" type="text" name="date_of_acquisition"
                :value="old('date_of_acquisition')" required autofocus />
        </div>

        <x-button class="mt-4">
            {{ __('Add') }}
        </x-button>
    </form>

</x-app-layout>
