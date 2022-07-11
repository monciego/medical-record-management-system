<x-app-layout>
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
                    <select onChange="update(this);" id="user_patient_role" name="user_patient_role"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option {{ $user->user_patient_role == 'student' ? 'selected' : '' }} id="student"
                            value="student">Student</option>
                        <option {{ $user->user_patient_role == 'teaching_staff' ? 'selected' : '' }} id="teaching_staff"
                            value="teaching_staff">Teaching Staff</option>
                        <option {{ $user->user_patient_role == 'non_teaching_staff' ? 'selected' : '' }}
                            value="non_teaching_staff">Non-Teaching Staff
                        </option>
                    </select>
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="user_patient_id" class="text-sm text-gray-800 mb-1 block">User ID</label>
                    <input type="text" name="user_patient_id" id="user_patient_id" :value="old('user_patient_id')"
                        value="{{$user->user_patient_id}}"
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-300 shadow rounded-md px-4 py-2">
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="user_patient_full_name" class="text-sm text-gray-800 mb-1 block">Full name</label>
                    <input type="text" name="user_patient_full_name" id="user_patient_full_name"
                        :value="old('user_patient_full_name')" value="{{$user->user_patient_full_name}}"
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-300 shadow rounded-md px-4 py-2">
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
                {{-- Patient Year & Section --}}
                <div id="yearSection" class="col-span-6 sm:col-span-2 hidden">
                    <label for="user_patient_year" class="block text-sm font-medium text-gray-700">Year &
                        Section
                    </label>
                    <input type="text" name="user_patient_year" id="user_patient_year"
                        value="{{ $user->user_patient_year }}" autocomplete="patient-year"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                {{-- Patient Department --}}
                <div id="department" class="col-span-6 sm:col-span-2 hidden">
                    <label for="user_patient_department" class="block text-sm font-medium text-gray-700">Department
                    </label>
                    <input type="text" name="user_patient_department" id="user_patient_department"
                        autocomplete="patient-department" value="{{ $user->user_patient_department }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="patient_phone_number" class="text-sm text-gray-800 mb-1 block">Contact Number</label>
                    <input type="text" name="patient_phone_number" id="patient_phone_number"
                        :value="old('patient_phone_number')" value="{{ $user->patient_phone_number }}"
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-300 shadow rounded-md px-4 py-2">
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="user_patient_birthday" class="text-sm text-gray-800 mb-1 block">Birth Date</label>
                    <input type="date" name="user_patient_birthday" id="user_patient_birthday"
                        :value="old('user_patient_birthday')" value="{{ $user->user_patient_birthday }}"
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-300 shadow rounded-md px-4 py-2">
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
    const select = document.getElementById('user_patient_role').value
    console.log(select);

    if (select === 'student') {
        document.getElementById('yearSection').style.display = "block"
    } else if (select === 'teaching_staff') {
        document.getElementById('department').style.display = "block"
    }

    function update(that) {
        if(that) {
            const select = document.getElementById('user_patient_role').value
            const student = document.getElementById('student').value;
            const teaching_staff = document.getElementById('teaching_staff').value;
            const yearSection = document.getElementById('yearSection');
            const department = document.getElementById('department');

            console.log(select);
            if(student === that.value) {
                yearSection.style.display = "block"
            } else {
             yearSection.style.display = "none"
            }

            if(teaching_staff === that.value) {
                department.style.display = "block"
            } else {
             department.style.display = "none"
            }
        }
}
</script>
