<x-app-layout>
    @section('title', isset($user) ? $user->user_patient_full_name . ' - Edit' : 'Edit User')
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

        </div>
        <hr>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class=" pb-5 pt-5 grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-2">
                    <label for="user_patient_role" class="block text-sm font-medium text-gray-700">Patient
                        Role</label>
                    <select onChange="update(this);" id="patient_role" name="user_patient_role"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option {{ $user->user_patient_role == 'student' ? 'selected' : '' }} id="student"
                            value="student">Student</option>
                        <option {{ $user->user_patient_role == 'teaching_staff' ? 'selected' : '' }} id="teaching_staff"
                            value="teaching_staff">Teaching Staff</option>
                        <option id="non_teaching_staff" {{ $user->user_patient_role == 'non_teaching_staff' ? 'selected'
                            : '' }}
                            value="non_teaching_staff">Non-Teaching Staff
                        </option>
                    </select>
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="user_patient_id" class="text-sm text-gray-800 mb-1 block">User ID</label>
                    <input type="text" name="user_patient_id" id="user_patient_id" :value="old('user_patient_id')"
                        value="{{$user->user_patient_id}}" class="{{($errors->first('user_patient_id') ? "
                        border-red-600" : "border-gray-300" )}} text-sm dark-text font-medium capitalize w-full border
                        border-gray-300 shadow rounded-md px-4 py-2">
                    @error('user_patient_id')
                    <div class="flex items-center gap-1 mt-1 ml-1">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="#cc0000">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                    </div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="user_patient_full_name" class="text-sm text-gray-800 mb-1 block">Full name</label>
                    <input type="text" name="user_patient_full_name" id="user_patient_full_name"
                        :value="old('user_patient_full_name')" value="{{$user->user_patient_full_name}}"
                        class="{{($errors->first('user_patient_full_name') ? " border-red-600" : "border-gray-300" )}}
                        text-sm dark-text font-medium capitalize w-full border border-gray-300 shadow rounded-md px-4
                        py-2">
                    @error('user_patient_full_name')
                    <div class="flex items-center gap-1 mt-1 ml-1">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="#cc0000">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                    </div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="user_patient_gender" class="text-sm text-gray-800 mb-1 block">Sex/Gender</label>
                    <select id="user_patient_gender" name="user_patient_gender"
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                        <option {{ $user->user_patient_gender == 'male' ? 'selected' : '' }} value="male">Male
                        </option>
                        <option {{ $user->user_patient_gender == 'female' ? 'selected' : '' }} value="female">
                            Female</option>
                    </select>
                </div>
                <div id="department_year_role" class="col-span-6 sm:col-span-2">
                    <label for="user_year_department_role" class="text-sm text-gray-800 mb-1 block" id="label">
                        @if ($user->user_patient_role === 'student')
                        Year & Section
                        @elseif($user->user_patient_role === 'teaching_staff')
                        Department
                        @elseif($user->user_patient_role === 'non_teaching_staff')
                        Role
                        @endif
                    </label>
                    <input type="text" name="user_year_department_role" id="user_year_department_role"
                        autocomplete="patient-department" value="{{ $user->user_year_department_role }}"
                        class="{{($errors->first('user_year_department_role') ? " border-red-600" : "border-gray-300"
                        )}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm
                        border-gray-300 rounded-md">
                    @error('user_year_department_role')
                    <div class="flex items-center gap-1 mt-1 ml-1">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="#cc0000">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                    </div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="patient_phone_number" class="text-sm text-gray-800 mb-1 block">Contact Number</label>
                    <input type="text" name="patient_phone_number" id="patient_phone_number"
                        :value="old('patient_phone_number')" value="{{ $user->patient_phone_number }}"
                        class="{{($errors->first('patient_phone_number') ? " border-red-600" : "border-gray-300" )}}
                        text-sm dark-text font-medium capitalize w-full border border-gray-300 shadow rounded-md px-4
                        py-2">
                    @error('patient_phone_number')
                    <div class="flex items-center gap-1 mt-1 ml-1">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="#cc0000">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                    </div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="user_patient_birthday" class="text-sm text-gray-800 mb-1 block">Birth Date</label>
                    <input type="date" name="user_patient_birthday" id="user_patient_birthday"
                        :value="old('user_patient_birthday')" value="{{ $user->user_patient_birthday }}"
                        class="{{($errors->first('user_patient_birthday') ? " border-red-600" : "border-gray-300" )}}
                        text-sm dark-text font-medium capitalize w-full border border-gray-300 shadow rounded-md px-4
                        py-2">
                    @error('user_patient_birthday')
                    <div class="flex items-center gap-1 mt-1 ml-1">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="#cc0000">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                    </div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="user_patient_blood_type" class="text-sm text-gray-800 mb-1 block">Blood Type</label>
                    <input type="text" name="user_patient_blood_type" id="user_patient_blood_type"
                        :value="old('user_patient_blood_type')"
                        value="{{ $user->user_patient_blood_type === null ? 'Not Specified' : $user->user_patient_blood_type }}"
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-300 shadow rounded-md px-4 py-2">
                </div>
                <div class="col-span-6">
                    <label for="user_patient_medical_history" class="text-sm text-gray-800 mb-1 block">Medical
                        History</label>
                    <textarea name="user_patient_medical_history" id="user_patient_medical_history"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $user->user_patient_medical_history }}</textarea>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent border-gray-300 shadow text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save
                    Changes</button>
            </div>
    </div>
    </form>
</x-app-layout>

<script>
    // This script tells what to do if you select a patient role
    // will hide some inputs or enable inputs
    const student = document.getElementById("student").value;
    const teaching_staff = document.getElementById("teaching_staff").value;
    const non_teaching_staff = document.getElementById("non_teaching_staff").value;
    const label = document.getElementById("label");

    function update(that) {
        if (that) {
            if (teaching_staff === that.value) {
                label.textContent = "Department";
            } else if (student === that.value) {
                label.textContent = "Year & Section";
            } else if (non_teaching_staff === that.value) {
                label.textContent = "Role";
            }
        }
    }
</script>
