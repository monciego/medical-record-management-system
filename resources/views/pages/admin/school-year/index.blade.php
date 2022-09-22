<x-app-layout>
    @section('title','Change Password')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <header class="flex justify-between items-center">
            <div class="text-gray-800 font-bold text-xl">School Year</div>
        </header>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('school-year.store') }}">
            @csrf

            <!-- current password -->
            <div class="mt-4">
                <x-label for="school_year" :value="__('School Year')" />
                <x-input id="school_year" class="block mt-1 w-full" type="text" name="school_year" />
            </div>


            <x-button class="mt-4">
                {{ __('Save Changes') }}
            </x-button>
        </form>


        <ul class="mt-4">
            <h2 class="text-lg font-medium">School Years</h2>
            @foreach ($school_years as $school_year)
            <li>{{ $school_year->school_year }}</li>
            @endforeach
        </ul>

    </div>
</x-app-layout>
