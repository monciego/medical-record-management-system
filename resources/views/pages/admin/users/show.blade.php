<x-app-layout>
    @section('title', isset($user) ? $user->user_patient_full_name : 'User')
    <div class="px-4 py-5 sm:px-6 bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="flex-col flex md:flex-row justify-between">
            <div class="sm:pb-0 md:pb-5 ">
                <div class="flex items-center gap-2">
                    <div>
                        <h3 class="text-lg leading-6 font-medium capitalize text-gray-900">
                            @if ($user->user_patient_role === 'student')
                            Student
                            @elseif($user->user_patient_role === 'teaching_staff')
                            Teacher
                            @elseif($user->user_patient_role === 'non_teaching_staff')
                            Employee
                            @endif
                            Information
                    </div>
                    <div
                        class="px-4 py-1 text-xs font-medium tracking-wide bg-slate-500 text-white capitalized rounded transform">
                        @include('utils.user-patient-role')
                    </div>
                </div>
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details of
                    {{$user->user_patient_full_name }}
                </p>
            </div>
            <div class="py-5 md:p-0 flex items-start gap-2">
                <a href="{{ route('users.edit', $user->id) }}"
                    class="px-4 py-2 font-medium text-xs inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-indigo-500 hover:bg-indigo-600 text-white">
                    <svg class="h-4 w-4" viewBox="0 0 16 16" fill="#f6f6f6">
                        <path
                            d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z">
                        </path>
                    </svg>
                    <span class="xs:block text-xs ml-2">Edit this user</span>
                </a>
                @include('pages.admin.users.delete-user')
            </div>
        </div>

        <hr>
        <div class=" pb-5 pt-5 grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">User ID</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $user->user_patient_id }}
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Full name</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $user->user_patient_full_name }}
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Sex/Gender</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $user->user_patient_gender }}
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">
                    @if ($user->user_patient_role === 'student')
                    Year and Section
                    @elseif($user->user_patient_role === 'teaching_staff')
                    Department
                    @elseif($user->user_patient_role === 'non_teaching_staff')
                    Role
                    @endif
                </h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $user->user_year_department_role }}
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Contact Number</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $user->patient_phone_number }}
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Birth Date</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ \Carbon\Carbon::parse($user->user_patient_birthday)->isoFormat('MMM D YYYY')}}
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Age</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ \Carbon\Carbon::parse($user->user_patient_birthday)->age }}
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Blood Type</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $user->user_patient_blood_type }}
                    @if($user->user_patient_blood_type == null )
                    Not Specified
                    @endif
                </p>
            </div>
            <div class="col-span-6">
                <h5 class="text-sm text-gray-800 mb-1">Medical History</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $user->user_patient_medical_history }}
                    @if ($user->user_patient_medical_history == null)
                    N/A
                    @endif
                </p>
            </div>
        </div>
        <p>{{ $user->id }}</p>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <a href="{{ route('consult', $user->id ) }}"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Consult
            </a>
        </div>
    </div>
</x-app-layout>
