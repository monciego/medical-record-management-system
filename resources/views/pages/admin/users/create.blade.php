<x-app-layout>
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
                                    <label for="user_patient_role"
                                        class="block text-sm font-medium text-gray-700">Patient
                                        Role</label>
                                    <select onChange="update(this);" id="patient_role" name="user_patient_role"
                                        autocomplete="patient-role"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option selected disabled hidden>Patient Role</option>
                                        <option id="student" value="student">Student</option>
                                        <option id="teaching_staff" value="teaching_staff">Teaching Staff</option>
                                        <option value="non_teaching_staff">Non-Teaching Staff
                                        </option>
                                    </select>
                                </div>

                                {{-- Patient ID --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="user_patient_id" class="block text-sm font-medium text-gray-700">
                                        Patient ID</label>
                                    <input type="text" disabled name="user_patient_id" id="user_patient_id"
                                        autocomplete="patient-id"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                </div>

                                {{-- Patient Fullname --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="user_patient_full_name"
                                        class="block text-sm font-medium text-gray-700">Full
                                        Name</label>
                                    <input type="text" disabled name="user_patient_full_name"
                                        id="user_patient_full_name" autocomplete="full-name"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                </div>

                                {{-- Patient Year & Section --}}
                                <div id="yearSection" class="col-span-6 sm:col-span-2 hidden">
                                    <label for="user_patient_year" class="block text-sm font-medium text-gray-700 ">Year
                                        &
                                        Section
                                    </label>
                                    <input type="text" disabled name="user_patient_year" id="user_patient_year"
                                        autocomplete="patient-year"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                </div>

                                {{-- Patient Department --}}
                                <div id="department" class="col-span-6 sm:col-span-2 hidden">
                                    <label for="user_patient_department"
                                        class="block text-sm font-medium text-gray-700">Department
                                    </label>
                                    <input type="text" disabled name="user_patient_department"
                                        id="user_patient_department" autocomplete="patient-department]"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                </div>

                                {{-- Patient Gender --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="user_patient_gender"
                                        class="block text-sm font-medium text-gray-700">Sex/Gender</label>
                                    <select id="user_patient_gender" disabled name="user_patient_gender"
                                        autocomplete="gender"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm inputs cursor-no-drop">
                                        <option selected disabled hidden>Sex/Gender</option>
                                        <option {{ old('gender')=='male' ? 'selected' : '' }} value="male">Male</option>
                                        <option {{ old('gender')=='female' ? 'selected' : '' }} value="female">Female
                                        </option>
                                    </select>
                                </div>

                                {{-- Patient Birthday --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="user_patient_birthday"
                                        class="block text-sm font-medium text-gray-700 ">Birth Date
                                    </label>
                                    <input type="date" disabled name="user_patient_birthday" id="user_patient_birthday"
                                        autocomplete="patient-birthday"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                </div>

                                {{-- Patient Blood Type --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="user_patient_blood_type	"
                                        class="block text-sm font-medium text-gray-700 ">Blood Type
                                    </label>
                                    <input type="text" disabled name="user_patient_blood_type"
                                        id="user_patient_blood_type" autocomplete="patient-blood-type"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                </div>

                                {{-- Patient Phone Number --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="patient_phone_number"
                                        class="block text-sm font-medium text-gray-700">Contact
                                        Number</label>
                                    <input type="number" disabled name="patient_phone_number" id="contact-number"
                                        autocomplete="contact-number"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                </div>

                                {{-- Medical History --}}
                                <div class="col-span-6">
                                    <label for="user_patient_medical_history"
                                        class="block text-sm font-medium text-gray-700">Medical History</label>
                                    <textarea disabled name="user_patient_medical_history"
                                        id="user_patient_medical_history" autocomplete="medical-history"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop"></textarea>
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
    const patient_role = document.getElementById('patient_role').value;

    function update(that) {
        const inputs = document.querySelectorAll('.inputs');
        if(that) {
            const student = document.getElementById('student').value;
            const teaching_staff = document.getElementById('teaching_staff').value;
            const yearSection = document.getElementById('yearSection');
            const department = document.getElementById('department');

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

        inputs.forEach(input => {
            if(that.value !== 'Patient Role') {
                input.disabled = false
                input.style.cursor = 'default'
            }
        });
}







</script>