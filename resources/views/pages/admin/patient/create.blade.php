<x-app-layout>
    <div class="sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:mt-0 md:col-span-6">
                <form action="/patient-create" method="POST">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                {{-- Patient Role --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="patient_role" class="block text-sm font-medium text-gray-700">Patient
                                        Role</label>
                                    <select onChange="update(this);" id="patient_role" name="patient_role"
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
                                    <label for="patient_id" class="block text-sm font-medium text-gray-700">
                                        Patient ID</label>
                                    <input type="text" name="patient_id" id="patient_id" autocomplete="patient-id"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                {{-- Patient Fullname --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="patient_full_name" class="block text-sm font-medium text-gray-700">Full
                                        Name</label>
                                    <input type="text" name="patient_full_name" id="patient_full_name"
                                        autocomplete="full-name"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                {{-- Patient Year & Section --}}
                                <div id="yearSection" class="col-span-6 sm:col-span-2 hidden">
                                    <label for="patient_year" class="block text-sm font-medium text-gray-700">Year &
                                        Section
                                    </label>
                                    <input type="text" name="patient_year" id="patient_year" autocomplete="patient-year"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                {{-- Patient Department --}}
                                <div id="department" class="col-span-6 sm:col-span-2 hidden">
                                    <label for="patient_department"
                                        class="block text-sm font-medium text-gray-700">Department
                                    </label>
                                    <input type="text" name="patient_department" id="patient_department"
                                        autocomplete="patient-department]"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                {{-- Patient Gender --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="patient_gender"
                                        class="block text-sm font-medium text-gray-700">Sex/Gender</label>
                                    <select id="patient_gender" name="patient_gender" autocomplete="gender"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option selected disabled hidden>Sex/Gender</option>
                                        <option {{ old('gender')=='male' ? 'selected' : '' }} value="male">Male</option>
                                        <option {{ old('gender')=='female' ? 'selected' : '' }} value="female">Female
                                        </option>
                                    </select>
                                </div>

                                {{-- Patient Phone Number --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="patient_phone_number"
                                        class="block text-sm font-medium text-gray-700">Contact
                                        Number</label>
                                    <input type="number" name="patient_phone_number" id="contact-number"
                                        autocomplete="patient_phone_number"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>


                                {{-- Patient Consult Date --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="patient_consult_date"
                                        class="block text-sm font-medium text-gray-700">Consult
                                        Date</label>
                                    <input value="{{ $todayDate  }}" type="date" name="patient_consult_date"
                                        id=" patient_consult_date" autocomplete="consult-date"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                {{-- Patient Consult Time --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="patient_consult_time"
                                        class="block text-sm font-medium text-gray-700">Consult
                                        Time</label>
                                    <input type="time" name="patient_consult_time" id="patient_consult_time"
                                        autocomplete="consult-time"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                {{-- Medical Comments --}}
                                <div class="col-span-6">
                                    <label for="patient_medical_comments"
                                        class="block text-sm font-medium text-gray-700">Comments</label>
                                    <textarea name="patient_medical_comments" id="patient_medical_comments"
                                        autocomplete="medical-comments"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add
                                Patient</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    function update(that) {
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
}
</script>
