<x-app-layout>
    @section('title','Change Name')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <header class="flex justify-between items-center">
            <div class="text-gray-800 font-bold text-xl">Change Name</div>
        </header>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('update.name') }}">
            @csrf
            <!-- current password -->
            <div class="mt-4">
                <x-label for="name" :value="__('Current Name')" />

                <x-input id="name" value="{{ Auth::user()->name }}" class="block mt-1 w-full" type="text" name="name" />
            </div>



            <x-button class="mt-4">
                {{ __('Change Name') }}
            </x-button>
        </form>


    </div>
</x-app-layout>