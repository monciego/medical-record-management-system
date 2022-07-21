<x-app-layout>
    @section('title', isset($user) ? $user->user_patient_full_name : 'Consult a patient')
    <div class="px-4 py-5 sm:px-6 bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="flex-col flex md:flex-row justify-between">
            <div class="sm:pb-0 md:pb-5 ">
                <div class="flex items-center gap-2">
                    <div>
                        <h3 class="text-lg leading-6 font-medium capitalize text-gray-900">
                            Patient Information
                    </div>
                    <div
                        class="px-4 py-1 text-xs font-medium tracking-wide bg-slate-500 text-white capitalized rounded transform">
                        @include('utils.user-patient-role')
                    </div>
                </div>
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details of
                    {{$user->user_patient_full_name }} ({{ $user->user_patient_id }})
                </p>
            </div>
            <div>

            </div>

        </div>
        <hr>

        <form action="{{ route('patient.store') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $user->id }}" name="user_patient_id">
            <div class=" pb-5 pt-5 grid grid-cols-6 gap-6">
                {{-- roles --}}
                {{-- <div class="col-span-6 sm:col-span-2">
                    <label for="patient_role" class="block text-sm font-medium text-gray-700">Patient
                        Role</label>
                    <select onChange="update(this);" id="patient_role" name="patient_role"
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
                </div> --}}
                {{-- id --}}
                {{-- <div class="col-span-6 sm:col-span-2">
                    <label for="patient_id" class="text-sm text-gray-800 mb-1 block">User ID</label>
                    <input type="text" name="patient_id" id="patient_id" :value="old('patient_id')"
                        value="{{$user->user_patient_id}}" class="{{($errors->first('user_patient_id') ? "
                        border-red-600" : "border-gray-300" )}} text-sm dark-text font-medium capitalize w-full border
                        border-gray-300 shadow rounded-md px-4 py-2">
                    @error('patient_id')
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
                </div> --}}

                <div class="col-span-6 sm:col-span-2">
                    <h5 class="text-sm text-gray-800 mb-1">Full name</h5>
                    <p
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                        {{ $user->user_patient_full_name }}
                    </p>
                </div>

                {{-- gender --}}
                {{--
                <div class="col-span-6 sm:col-span-2">
                    <label for="patient_gender" class="text-sm text-gray-800 mb-1 block">Sex/Gender</label>
                    <select id="patient_gender" name="patient_gender"
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                        <option {{ $user->user_patient_gender == 'male' ? 'selected' : '' }} value="male">Male
                        </option>
                        <option {{ $user->user_patient_gender == 'female' ? 'selected' : '' }} value="female">
                            Female</option>
                    </select>
                </div> --}}


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

                <div class="col-span-6 sm:col-span-2">
                    <h5 class="text-sm text-gray-800 mb-1">Contact Number</h5>
                    <p
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                        {{ $user->patient_phone_number }}
                    </p>
                </div>

                {{-- <div class="col-span-6 sm:col-span-2">
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
                </div> --}}

                {{-- --}}

                <div class="col-span-6 sm:col-span-2">
                    <label for="patient_consult_date" class="block text-sm font-medium text-gray-700">Consult
                        Date</label>
                    <input value="{{ $todayDate  }}" type="date" name="patient_consult_date" id=" patient_consult_date"
                        autocomplete="consult-date"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                {{-- Patient Consult Time --}}
                <div class="col-span-6 sm:col-span-2">
                    <label for="patient_consult_time" class="block text-sm font-medium text-gray-700">Consult
                        Time</label>
                    <input type="time" name="patient_consult_time" id="patient_consult_time" autocomplete="consult-time"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <label for="patient_prescribed_medicine" class="text-sm text-gray-800 mb-1 block">Prescribed
                        Medicine</label>
                    <select id="patient_prescribed_medicine" name="patient_prescribed_medicine"
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                        @foreach ($medicines as $medicine )
                        <option value="{{ $medicine->medicine_name }}">{{ $medicine->medicine_name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <label for="patient_prescribed_medicine_quantity" class="text-sm text-gray-800 mb-1 block">Medicine
                        Quantity</label>
                    <input type="number" name="patient_prescribed_medicine_quantity"
                        id="patient_prescribed_medicine_quantity" :value="old('patient_prescribed_medicine_quantity')"
                        class="{{($errors->first('patient_prescribed_medicine_quantity') ? " border-red-600"
                        : "border-gray-300" )}} text-sm dark-text font-medium capitalize w-full border border-gray-300
                        shadow rounded-md px-4 py-2">
                    @error('patient_prescribed_medicine_quantity')
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

                    {{-- <input type="text" name="user_patient_id" value={{ $user->id }}> --}}
                </div>

                {{-- --}}

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

                <div class="col-span-6">
                    <label for="patient_medical_comments"
                        class="block text-sm font-medium text-gray-700">Comments</label>
                    <textarea name="patient_medical_comments" id="patient_medical_comments"
                        autocomplete="medical-comments"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                </div>


            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent border-gray-300 shadow text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Add Patient
                </button>
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
