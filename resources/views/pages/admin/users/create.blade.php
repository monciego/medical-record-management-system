<x-app-layout>
    @section('title','Create User')
    <div class="sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:mt-0 md:col-span-6">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                {{-- Patient Role --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="user_patient_role" class="block text-sm font-medium text-gray-700">User
                                        Role</label>
                                    <select onChange="update(this);" id="patient_role" name="user_patient_role"
                                        autocomplete="patient-role" class="{{($errors->first('user_patient_role') ? "
                                        border-red-600" : "border-gray-300" )}} mt-1 block w-full py-2 px-3 border
                                        border-gray-300 bg-white rounded-md shadow-sm focus:outline-none
                                        focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option selected disabled hidden>Patient Role</option>
                                        <option {{ old('user_patient_role')==='student' ? 'selected' : '' }}
                                            id="student" value="student">Student</option>
                                        <option {{ old('user_patient_role')==='teaching_staff' ? 'selected' : '' }}
                                            id="teaching_staff" value="teaching_staff">Teaching Staff</option>
                                        <option {{ old('user_patient_role')==='non_teaching_staff' ? 'selected' : '' }}
                                            id="non_teaching_staff" value="non_teaching_staff">Non-Teaching Staff
                                        </option>
                                    </select>
                                    @error('user_patient_role')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                {{-- Patient ID --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="user_patient_id" class="block text-sm font-medium text-gray-700">
                                        User ID</label>
                                    <input type="text" disabled name="user_patient_id" id="user_patient_id"
                                        autocomplete="patient-id" value="{{ old('user_patient_id') }}"
                                        class="{{($errors->first('user_patient_id') ? " border-red-600"
                                        : "border-gray-300" )}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block
                                        w-full shadow-sm sm:text-sm rounded-md inputs cursor-no-drop">
                                    @error('user_patient_id')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                {{-- Patient Fullname --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="user_patient_full_name"
                                        class="block text-sm font-medium text-gray-700">Full
                                        Name</label>
                                    <input type="text" disabled name="user_patient_full_name"
                                        id="user_patient_full_name" autocomplete="full-name"
                                        value="{{ old('user_patient_full_name') }}"
                                        class="{{($errors->first('user_patient_full_name') ? " border-red-600"
                                        : "border-gray-300" )}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block
                                        w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                    @error('user_patient_full_name')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                {{-- Patient Department/Year/Role --}}
                                <div id="department_year_role"
                                    class="col-span-6 sm:col-span-2  {{($errors->first('user_year_department_role') ? "
                                    border-red-400 block" : "border-gray-300" )}}">
                                    <label id="label" for="user_year_department_role"
                                        class="block text-sm font-medium text-gray-700">
                                    </label>
                                    <input value="{{ old('user_year_department_role') }}" type="text" disabled
                                        name="user_year_department_role" id="user_year_department_role"
                                        autocomplete="patient-department-year-role"
                                        class="{{($errors->first('user_year_department_role') ? " border-red-600"
                                        : "border-gray-300" )}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block
                                        w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                    @error('user_year_department_role')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                {{-- Patient Gender --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="user_patient_gender" class="block text-sm font-medium
                                        text-gray-700">Sex/Gender</label>
                                    <select id="user_patient_gender" disabled name="user_patient_gender"
                                        autocomplete="gender" class="{{($errors->first('user_patient_gender') ? "
                                        border-red-600" : "border-gray-300" )}} mt-1 block w-full py-2 px-3 border
                                        border-gray-300 bg-white rounded-md shadow-sm focus:outline-none
                                        focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm inputs cursor-no-drop">
                                        <option selected disabled hidden>Sex/Gender</option>
                                        <option {{ old('user_patient_gender')=='male' ? 'selected' : '' }} value="male">
                                            Male</option>
                                        <option {{ old('user_patient_gender')=='female' ? 'selected' : '' }}
                                            value="female">Female
                                        </option>
                                    </select>
                                    @error('user_patient_gender')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                {{-- Patient Birthday --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="user_patient_birthday"
                                        class="block text-sm font-medium text-gray-700 ">Birth Date
                                    </label>
                                    <input type="date" disabled name="user_patient_birthday" id="user_patient_birthday"
                                        autocomplete="patient-birthday" value="{{ old('user_patient_birthday') }}"
                                        class="{{($errors->first('user_patient_birthday') ? " border-red-600"
                                        : "border-gray-300" )}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block
                                        w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                    @error('user_patient_birthday')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                {{-- Patient Blood Type --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="user_patient_blood_type	"
                                        class="block text-sm font-medium text-gray-700">Blood Type
                                    </label>
                                    <input type="text" disabled name="user_patient_blood_type"
                                        value="{{ old('user_patient_blood_type') }}" id="user_patient_blood_type"
                                        autocomplete="patient-blood-type"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                </div>

                                {{-- Patient Phone Number --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="patient_phone_number"
                                        class="block text-sm font-medium text-gray-700">Contact
                                        Number</label>
                                    <input type="number" disabled name="patient_phone_number" id="contact-number"
                                        autocomplete="contact-number" value="{{ old('patient_phone_number') }}"
                                        class="{{($errors->first('patient_phone_number') ? " border-red-600"
                                        : "border-gray-300" )}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block
                                        w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                    @error('patient_phone_number')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                {{-- Medical History --}}
                                <div class="col-span-6">
                                    <label for="user_patient_medical_history"
                                        class="block text-sm font-medium text-gray-700">Medical History</label>
                                    <textarea disabled name="user_patient_medical_history"
                                        id="user_patient_medical_history" autocomplete="medical-history"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">{{ old('user_patient_medical_history') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add
                                User</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    // This script tells what to do if you select a patient role
    // will hide some inputs or enable inputs
    const patient_role = document.getElementById("patient_role").value;
    const student = document.getElementById("student").value;
    const teaching_staff = document.getElementById("teaching_staff").value;
    const non_teaching_staff = document.getElementById("non_teaching_staff").value;
    const department_year_role_value = document.getElementById("department_year_role").value;
    const label = document.getElementById("label");
    const department_year_role = document.getElementById("department_year_role");
    const inputs = document.querySelectorAll(".inputs");
    const form = document.getElementById('form')

    // get the labels in local storage if the conditions are met
    if (teaching_staff === teaching_staff) {
            label.textContent = localStorage.getItem("r0l3");
        } else if (student === student) {
            label.textContent = localStorage.getItem("r0l3");
            // label.textContent = "Year & Section";
        } else if (non_teaching_staff === non_teaching_staff) {
            label.textContent = localStorage.getItem("r0l3");
        }

        // if the user role selected enable the input
        inputs.forEach((input) => {
            if (patient_role !== "Patient Role") {
                input.disabled = false;
                input.style.cursor = "default";
            }
        });

        if (patient_role === "Patient Role") {
                department_year_role.style.display = "none"
        }

     // that is the selected value
    function update(that) {
        if (that) {
            if (teaching_staff === that.value) {
                localStorage.setItem('r0l3', 'Department')
                label.textContent = localStorage.getItem("r0l3");
                department_year_role.style.display = "block";
            } else if (student === that.value) {
                localStorage.setItem('r0l3', 'Year & Section')
                label.textContent = localStorage.getItem("r0l3");
                // label.textContent = "Year & Section";
                department_year_role.style.display = "block";
            } else if (non_teaching_staff === that.value) {
                localStorage.setItem('r0l3', 'Role')
                label.textContent = localStorage.getItem("r0l3");
                // label.textContent = "Role";
                department_year_role.style.display = "block";
            } else {
                localStorage.setItem('r0l3', 'Department / Year & Section / Role')
                label.textContent = localStorage.getItem("r0l3");
                department_year_role.style.display = "none";
            }
        }

        // if the user role is not selected disable the inputs
        inputs.forEach((input) => {
            if (that.value !== "Patient Role") {
                input.disabled = false;
                input.style.cursor = "default";
            }
        });
    }
</script>
