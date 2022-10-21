<x-app-layout>
    @section('title', isset($user) ? $user->user_patient_first_name . " " . $user->user_patient_last_name : 'Consult a
    patient')
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
                    {{$user->user_patient_first_name }} {{$user->user_patient_last_name }} ({{ $user->user_patient_id
                    }})
                </p>
            </div>
            <div>

            </div>

        </div>
        <hr>

        <form action="{{ route('patient.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $user->id }}" name="user_patient_id">
            <div class="pb-5 pt-5 grid grid-cols-6 gap-6">

                <div class="col-span-6 sm:col-span-2">
                    <label for="clinic" class="block text-sm font-medium text-gray-700">
                        Clinic</label>
                    <select name="clinic" autocomplete="clinic" class="{{($errors->first('clinic') ? " border-red-600"
                        : "border-gray-300" )}} mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md
                        shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option selected disabled hidden>Select Clinic</option>
                        <option {{ old('clinic')==='medical' ? 'selected' : '' }} id="medical" value="medical">Medical
                        </option>
                        <option {{ old('clinic')==='dental' ? 'selected' : '' }} id="dental" value="dental">Dental
                        </option>
                    </select>
                    @error('clinic')
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
                    <h5 class="text-sm text-gray-800 mb-1">First Name of Patient</h5>
                    <p
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                        {{ $user->user_patient_first_name }}
                    </p>
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <h5 class="text-sm text-gray-800 mb-1">Middle Name of Patient</h5>
                    <p
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                        {{ $user->user_patient_middle_name }}
                        @if($user->user_patient_middle_name == null )
                        Not Specified
                        @endif
                    </p>
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <h5 class="text-sm text-gray-800 mb-1">Last Name of Patient</h5>
                    <p
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                        {{ $user->user_patient_last_name }}
                    </p>
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <h5 class="text-sm text-gray-800 mb-1">Suffix of Patient</h5>
                    <p
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                        {{ $user->user_patient_suffix }}
                        @if($user->user_patient_suffix == null )
                        Not Specified
                        @endif
                    </p>
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <h5 class="text-sm text-gray-800 mb-1">
                        @if ($user->user_patient_role === 'student')
                        Course / Year & Section
                        @elseif($user->user_patient_role === 'teaching_staff' || $user->user_patient_role ===
                        'non_teaching_staff')
                        Department
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

                {{-- consult date --}}
                <div class="col-span-6 sm:col-span-2">
                    <label for="patient_consult_date" class="block text-sm font-medium text-gray-700">Consult
                        Date</label>
                    <input value="{{ $todayDate  }}" type="date" name="patient_consult_date" id=" patient_consult_date"
                        autocomplete="consult-date"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                {{-- school year --}}
                <div class="col-span-6 sm:col-span-2">
                    <label for="school_year_id" class="block text-sm font-medium text-gray-700">
                        School Year</label>
                    <select name="school_year_id" autocomplete="school_year_id"
                        class="{{($errors->first('school_year_id') ? " border-red-600" : "border-gray-300" )}} mt-1
                        block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none
                        focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option selected disabled hidden>Select Year</option>
                        @foreach ($school_years as $school_year)
                        <option {{ old('school_year_id', $school_year->id) }} id="school_year_id" value="{{
                            $school_year->id
                            }}">{{ $school_year->school_year }}
                        </option>
                        @endforeach
                    </select>
                    @error('school_year_id')
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

                {{-- semester --}}
                <div class="col-span-6 sm:col-span-2">
                    <label for="semester" class="block text-sm font-medium text-gray-700">
                        Semester</label>
                    <select name="semester" autocomplete="semester" class="{{($errors->first('semester') ? "
                        border-red-600" : "border-gray-300" )}} mt-1 block w-full py-2 px-3 border border-gray-300
                        bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                        sm:text-sm">
                        <option disabled>Select Semester</option>
                        <option {{ old('semester')===0 ? 'selected' : '' }} id="first_semester" value="0">First Semester
                        </option>
                        <option {{ old('semester')===1 ? 'selected' : '' }} id="second_semester" value="1">Second
                            Semester</option>
                        <option {{ old('semester')===2 ? 'selected' : '' }} id="summer" value="2">Summer</option>
                    </select>
                    @error('semester')
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
                    <label for="patient_consult_time" class="block text-sm font-medium text-gray-700">Consult
                        Time</label>
                    <input type="time" name="patient_consult_time" id="patient_consult_time" autocomplete="consult-time"
                        value="{{ old('patient_consult_time') }}" class="{{($errors->first('patient_consult_time') ? "
                        border-red-600" : "border-gray-300" )}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block
                        w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('patient_consult_time')
                    <div class=" flex items-center gap-1 mt-1 ml-1">
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
                    <label for="complaints" class="block text-sm font-medium text-gray-700">Complaints</label>
                    <input type="text" name="complaints" id="complaints" autocomplete="complaints"
                        value="{{ old('complaints') }}" class="{{($errors->first('complaints') ? " border-red-600"
                        : "border-gray-300" )}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full
                        shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('complaints')
                    <div class=" flex items-center gap-1 mt-1 ml-1">
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
                    <label for="diagnosis" class="block text-sm font-medium text-gray-700">Diagnosis</label>
                    <input type="text" name="diagnosis" id="diagnosis" autocomplete="diagnosis"
                        value="{{ old('diagnosis') }}" class="{{($errors->first('diagnosis') ? " border-red-600"
                        : "border-gray-300" )}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full
                        shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('diagnosis')
                    <div class=" flex items-center gap-1 mt-1 ml-1">
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

                {{-- !! WORK ON DESIGN OF THESE OR THE PATIENT INFORMATION THEN FIX SOME BUGS AND THE EXAMINE
                FUNCTIONALITY --}}

                <div class="w-full relative col-span-6 sm:col-span-2 cursor-pointer" id="someElementID">
                    <label for="patient_prescribed_medicine" class="text-sm text-gray-800 mb-1 block">Prescribed
                        Medicine</label>
                    <div class="select-field flex items-center text-sm dark-text  font-medium capitalize w-full border border-gray-300
                        shadow rounded-md px-4 py-2">
                        <input type="text" name="patient_prescribed_medicine" placeholder="Medicines Given" disabled
                            class="cursor-pointer text-sm input-selector border-none py-0 px-0 outline-none">
                        <span id="arrow-down" class="absolute right-4 transform duration-300 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </div>
                    {{-- options --}}
                    <div id="list"
                        class="w-full bg-white max-h-44 overflow-y-scroll p-2  absolute shadow-lg border rounded-bl-md rounded-br-md border-1">
                        @foreach ($medicines as $medicine)
                        <label for="{{ $medicine->medicine_name }}" class="w-full hover:bg-indigo-50 bg-wite p-1 block">
                            <input class="rounded text-indigo-600" type="checkbox" name="patient_prescribed_medicine[]"
                                onclick="myFunction(this.id)" id="{{ $medicine->medicine_name }}"
                                value="{{ $medicine->medicine_name }}">
                            <span class="text-sm ml-2">{{ $medicine->medicine_name }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                @foreach ($medicines as $medicine)
                <div class="col-span-6 sm:col-span-2" style="display: none" id="{{ $medicine->medicine_name }}_text">
                    <label for="patient_prescribed_medicine_quantity" class="text-sm text-gray-800 mb-1 block">{{
                        $medicine->medicine_name }}
                        Quantity</label>
                    <input type="number" name="patient_prescribed_medicine_quantity[]"
                        id="{{ $medicine->medicine_name }}" :value="old('patient_prescribed_medicine_quantity')"
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
                </div>
                @endforeach

                <div class="col-span-6 sm:col-span-2">
                    <label for="physician_name" class="block text-sm font-medium text-gray-700">Physician</label>
                    <input type="text" name="physician_name" id="physician_name" autocomplete="physician_name"
                        value="{{ old('physician_name') }}" class="{{($errors->first('physician_name') ? "
                        border-red-600" : "border-gray-300" )}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block
                        w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('physician_name')
                    <div class=" flex items-center gap-1 mt-1 ml-1">
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


<style>
    #list {
        display: none;
    }
</style>


<script>
    document.querySelector(".select-field").addEventListener("click", () => {
    document.getElementById("list").classList.toggle("block");
    document.getElementById("arrow-down").classList.toggle("-rotate-180");
});

function myFunction(id) {
    let checkBox = document.getElementById(id);
    let text = document.getElementById(id + "_text");
    if (checkBox.checked == true) {
        text.style.display = "block";
    } else {
        text.style.display = "none";
    }
}

let ignoreClickOnMeElement = document.getElementById("someElementID");

document.addEventListener("click", function (event) {
    let isClickInsideElement = ignoreClickOnMeElement.contains(event.target);
    if (!isClickInsideElement) {
        //Do something click is outside specified element
        document.getElementById("list").classList.remove("block");
    }
});
</script>
