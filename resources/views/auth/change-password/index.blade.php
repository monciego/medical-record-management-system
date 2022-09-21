<x-app-layout>
    @section('title','Change Password')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <header class="flex justify-between items-center">
            <div class="text-gray-800 font-bold text-xl">Change Password</div>
        </header>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('change.password') }}">
            @csrf

            <!-- current password -->
            <div class="mt-4">
                <x-label for="current_password" :value="__('Current Password')" />

                <x-input id="current_password" class="block mt-1 w-full" type="password" name="current_password" />
            </div>

            <!-- new password -->
            <div class="mt-4">
                <x-label for="new_password" :value="__('New Password')" />

                <x-input id="new_password" class="block mt-1 w-full" type="password" name="new_password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="new_password_confirmation" :value="__('Confirm Password')" />

                <x-input id="new_password_confirmation" class="block mt-1 w-full" type="password"
                    name="new_password_confirmation" />
            </div>



            <x-button class="mt-4">
                {{ __('Change Password') }}
            </x-button>
        </form>


    </div>
</x-app-layout>
