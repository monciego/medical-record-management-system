<x-app-layout>
    @section('title', isset($user) ? $user->user_patient_first_name . " " . $user->user_patient_last_name : 'Consult a
    patient')
    <div class="px-4 py-5 sm:px-6 bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="flex-col flex md:flex-row justify-between">
            <div class="sm:pb-0 md:pb-5 ">
                <div class="flex items-center gap-2">
                    <div>
                        <h3 class="text-lg leading-6 font-medium capitalize text-gray-900">
                            Medical Examination Report
                    </div>
                    <div
                        class="px-4 py-1 text-xs font-medium tracking-wide bg-slate-500 text-white capitalized rounded transform">
                        @include('utils.user-patient-role')
                    </div>
                </div>
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    {{$user->user_patient_first_name }} {{$user->user_patient_last_name }} ({{ $user->user_patient_id
                    }})
                </p>
            </div>
            <div>

            </div>

        </div>
        <hr>

        <form action="{{ route('medical-examination-report.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $user->id }}" name="user_patient_id">
            <div class="pb-5 pt-5 grid grid-cols-6 gap-6">
                {{-- pre-employement --}}
                <div class="col-span-6 sm:col-span-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="pre_employment" name="pre_employment" type="checkbox"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="pre_employment"
                                class="font-medium text-gray-700 uppercase">Pre-employement</label>
                        </div>
                    </div>
                </div>

                {{-- annual --}}
                <div class="col-span-6 sm:col-span-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="annual" name="annual" type="checkbox"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="annual" class="font-medium text-gray-700 uppercase">annual</label>
                        </div>
                    </div>
                </div>

                {{-- ojt --}}
                <div class="col-span-6 sm:col-span-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="ojt" name="ojt" type="checkbox"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="ojt" class="font-medium text-gray-700 uppercase">OJT</label>
                        </div>
                    </div>
                </div>

                <hr class="col-span-6">

                <div class="col-span-6 sm:col-span-2">
                    <h5 class="text-sm text-gray-800 mb-1">First Name</h5>
                    <p
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                        {{ $user->user_patient_first_name }}
                    </p>
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <h5 class="text-sm text-gray-800 mb-1">Middle Name</h5>
                    <p
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                        {{ $user->user_patient_middle_name }}
                        @if($user->user_patient_middle_name == null )
                        Not Specified
                        @endif
                    </p>
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <h5 class="text-sm text-gray-800 mb-1">Last Name</h5>
                    <p
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                        {{ $user->user_patient_last_name }}
                    </p>
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <h5 class="text-sm text-gray-800 mb-1">Suffix</h5>
                    <p
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                        @if($user->user_patient_suffix == null )
                        Not Specified
                        @elseif ($user->user_patient_suffix === 'none')
                        Not Specified
                        @else
                        {{$user->user_patient_suffix }}
                        @endif
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
                    <h5 class="text-sm text-gray-800 mb-1">Gender</h5>
                    <p
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                        {{ $user->user_patient_gender }}
                    </p>
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <h5 class="text-sm text-gray-800 mb-1">Civil Status</h5>
                    <p
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                        {{ $user->civil_status }}
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

                {{-- date of examination --}}
                <div class="col-span-6 sm:col-span-2">
                    <label for="date_of_examination" class="block text-sm font-medium text-gray-700">Date of
                        Examination</label>
                    <input value="{{ $todayDate  }}" type="date" name="date_of_examination" id=" date_of_examination"
                        autocomplete="date-of-examination"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                {{-- Address --}}
                <div class="col-span-6 sm:col-span-2">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" name="address" id="address" autocomplete="address" value="{{ old('address') }}"
                        class="{{($errors->first('address') ? " border-red-600" : "border-gray-300" )}} mt-1
                        focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300
                        rounded-md ">
                    @error('address')
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

            <hr class="col-span-6">

            {{-- medical history --}}
            <div class="col-span-6">
                <h2 class="font-medium">Medical History</h2>
            </div>

            <div class="col-span-6">
                <label for="present_symptoms" class="block text-sm font-medium text-gray-700">
                    A. Present Symptoms
                </label>
                <textarea name="present_symptoms" id="present_symptoms" autocomplete="present_symptoms"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('present_symptoms') }}</textarea>
            </div>

            <div class="col-span-6">
                <label for="past_medical_history" class="block text-sm font-medium text-gray-700">
                    B. Past Medical History
                </label>
                <textarea name="past_medical_history" id="past_medical_history" autocomplete="past_medical_history"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('past_medical_history') }}</textarea>
            </div>

            <div class="col-span-6">
                <label for="family_medical_history" class="block text-sm font-medium text-gray-700">
                    C. Family Medical History
                </label>
                <textarea name="family_medical_history" id="family_medical_history"
                    autocomplete="family_medical_history"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('past_medical_history') }}</textarea>
            </div>

            <div class="col-span-6">
                <label for="history_of_operations" class="block text-sm font-medium text-gray-700">
                    D. History of Operations
                </label>
                <textarea name="history_of_operations" id="history_of_operations" autocomplete="history_of_operations"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('history_of_operations') }}</textarea>
            </div>

            <div class="col-span-6">
                <label for="allergies" class="block text-sm font-medium text-gray-700">
                    E. Allergies
                </label>
                <textarea name="allergies" id="allergies" autocomplete="allergies"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('allergies') }}</textarea>
            </div>

            <div class="col-span-6">
                <label for="gynecological_obstetrics_history" class="block text-sm font-medium text-gray-700">
                    F. Gynecological/Obstetrics History
                </label>
                <textarea name="gynecological_obstetrics_history" id="gynecological_obstetrics_history"
                    autocomplete="gynecological_obstetrics_history"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('gynecological_obstetrics_history') }}</textarea>
            </div>

            <div class="col-span-6">
                <label for="personal_social_history" class="block text-sm font-medium text-gray-700">
                    G. Personal/Social History
                </label>
                <textarea name="personal_social_history" id="personal_social_history"
                    autocomplete="personal_social_history"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('personal_social_history') }}</textarea>
            </div>

            <hr class="col-span-6">

            {{-- physical examination --}}
            <div class="col-span-6">
                <h2 class="font-medium">Physical Examination</h2>
            </div>

            <div class="col-span-6">
                <label for="general_survey" class="block text-sm font-medium text-gray-700">
                    A. General Survey
                </label>
                <textarea name="general_survey" id="general_survey" autocomplete="general_survey"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('general_survey') }}</textarea>
            </div>

            <div class="col-span-6">
                <div class="block text-sm font-medium text-gray-700">
                    B. Vital Signs
                </div>
            </div>

            <div class="col-span-6 sm:col-span-2">
                <label for="height" class="block text-sm font-medium text-gray-700">
                    Height (ft)
                </label>
                <input type="text" name="height" value="{{ $user->user_patient_height }}" id="height"
                    autocomplete="height"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-6 sm:col-span-2">
                <label for="weight" class="block text-sm font-medium text-gray-700">
                    Weight (kg)
                </label>
                <input type="text" name="weight" value="{{ $user->user_patient_weight }}" id="weight"
                    autocomplete="weight"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-6 sm:col-span-2">
                <label for="blood_pressure" class="block text-sm font-medium text-gray-700">
                    Blood Pressure
                </label>
                <input type="text" name="blood_pressure" value="{{ old('blood_pressure') }}" id="blood_pressure"
                    autocomplete="blood_pressure"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-6 sm:col-span-2">
                <label for="heart_rate" class="block text-sm font-medium text-gray-700">
                    Heart Rate (BPM)
                </label>
                <input type="text" name="heart_rate" value="{{ old('heart_rate') }}" id="heart_rate"
                    autocomplete="heart_rate"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-6 sm:col-span-2">
                <label for="respiratory_rate" class="block text-sm font-medium text-gray-700">
                    Respiratory Rate
                </label>
                <input type="text" name="respiratory_rate" value="{{ old('respiratory_rate') }}" id="respiratory_rate"
                    autocomplete="respiratory_rate"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-6 sm:col-span-2">
                <label for="temperature" class="block text-sm font-medium text-gray-700">
                    Temperature (Celcius)
                </label>
                <input type="text" name="temperature" value="{{ old('temperature') }}" id="temperature"
                    autocomplete="temperature"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-6">
                <label for="skin" class="block text-sm font-medium text-gray-700">
                    C. Skin
                </label>
                <textarea name="skin" id="skin" autocomplete="skin"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('skin') }}</textarea>
            </div>

            <div class="col-span-6">
                <label for="heent" class="block text-sm font-medium text-gray-700">
                    D. Heent
                </label>
                <textarea name="heent" id="heent" autocomplete="heent"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('heent') }}</textarea>
            </div>

            <div class="col-span-6">
                <label for="chest_and_lungs" class="block text-sm font-medium text-gray-700">
                    E. Chest and Lungs
                </label>
                <textarea name="chest_and_lungs" id="chest_and_lungs" autocomplete="chest_and_lungs"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('chest_and_lungs') }}</textarea>
            </div>

            <div class="col-span-6">
                <label for="heart" class="block text-sm font-medium text-gray-700">
                    F. Heart
                </label>
                <textarea name="heart" id="heart" autocomplete="heart"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('heart') }}</textarea>
            </div>

            <div class="col-span-6">
                <label for="abdomen" class="block text-sm font-medium text-gray-700">
                    G. Abdomen
                </label>
                <textarea name="abdomen" id="abdomen" autocomplete="abdomen"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('abdomen') }}</textarea>
            </div>

            <div class="col-span-6">
                <label for="genitourinary" class="block text-sm font-medium text-gray-700">
                    H. Genitourinary
                </label>
                <textarea name="genitourinary" id="genitourinary" autocomplete="genitourinary"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('genitourinary') }}</textarea>
            </div>

            <div class="col-span-6">
                <label for="extremities" class="block text-sm font-medium text-gray-700">
                    I. Extremities
                </label>
                <textarea name="extremities" id="extremities" autocomplete="extremities"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('extremities') }}</textarea>
            </div>

            <div class="col-span-6">
                <label for="neurological" class="block text-sm font-medium text-gray-700">
                    J. Neurological
                </label>
                <textarea name="neurological" id="neurological" autocomplete="neurological"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('neurological') }}</textarea>
            </div>

            <hr class="col-span-6">

            {{-- laboratory results --}}
            <div class="col-span-6">
                <h2 class="font-medium">Laboratory Results</h2>
            </div>
    </div>

    {{-- new grid --}}
    {{-- OBO --}}
    <div class="grid grid-cols-8 gap-4 sm:gap-2 mb-4">
        <div class="col-span-2 sm:col-span-2">
            <p class="block text-sm font-medium text-gray-700">
                A. OBO
            </p>
        </div>
        <div class="col-span-2 sm:col-span-1 ">
            <div class="flex items-end">
                <div class="flex items-center h-5">
                    {{-- radio normal --}}
                    <input id="obo_normal" name="obo" type="radio" value="normal" {{ (old('obo')==='normal' )
                        ? 'checked' : '' }}
                        class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full">
                </div>
                <div class="ml-2 text-sm">
                    <label for="obo_normal" class="font-medium text-gray-700">Normal</label>
                </div>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-5">
            <div class="lab obo flex items-center h-5">
                {{-- radio not normal --}}
                <div>
                    <input id="obo_not_normal" name="obo" type="radio" value="not_normal" {{ (old('obo')==='not_normal'
                        ) ? 'checked' : '' }}
                        class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full" />
                </div>
                <div class="ml-2 text-sm">
                    <label for="obo_not_normal" class="font-medium text-gray-700">Findings:</label>
                </div>
                {{-- text input for findings --}}
                <input type="text" name="obo_findings" value="{{ old('obo_findings') }}" id="obo_findings"
                    placeholder="{{$errors->has('obo_findings') ? $errors->first('obo_findings') : '' }}"
                    autocomplete="obo_findings" class="{{($errors->first('obo_findings') ? " border-red-600"
                    : "border-slate-600" )}} findings ml-2 p-0 px-1 block w-full shadow-sm sm:text-sm focus:outline-none
                    !outline-none focus:ring-0 border-t-0 border-r-0 border-l-0 ">
            </div>
        </div>
    </div>
    {{-- urinalysis --}}
    <div class=" grid grid-cols-8 gap-4 sm:gap-2 mb-4">
                <div class="col-span-2 sm:col-span-2">
                    <p class="block text-sm font-medium text-gray-700">
                        B. Urinalysis
                    </p>
                </div>
                <div class="col-span-2 sm:col-span-1 ">
                    <div class="flex items-end">
                        <div class="flex items-center h-5">
                            <input id="urinalysis_normal" name="urinalysis" type="radio" value="normal" {{
                                (old('urinalysis')==='normal' ) ? 'checked' : '' }}
                                class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full">
                        </div>
                        <div class="ml-2 text-sm">
                            <label for="urinalysis_normal" class="font-medium text-gray-700">Normal</label>
                        </div>
                    </div>
                </div>
                <div class="col-span-6 sm:col-span-5">
                    <div class="lab uri flex items-center h-5">
                        <div>
                            <input id="urinalysis_not_normal" name="urinalysis" type="radio" value="not_normal" {{
                                (old('urinalysis')==='not_normal' ) ? 'checked' : '' }}
                                class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full" />
                        </div>
                        <div class="ml-2 text-sm">
                            <label for="urinalysis_not_normal" class="font-medium text-gray-700">Findings:</label>
                        </div>
                        <input type="text" name="urinalysis_findings" value="{{ old('urinalysis_findings') }}"
                            placeholder="{{$errors->has('urinalysis_findings') ? $errors->first('urinalysis_findings') : '' }}"
                            id="urinalysis_findings" autocomplete="urinalysis"
                            class="{{($errors->first('urinalysis_findings') ? " border-red-600" : "border-slate-600" )}}
                            findings ml-2 p-0 px-1 block w-full shadow-sm sm:text-sm focus:outline-none !outline-none
                            focus:ring-0 border-t-0 border-r-0 border-l-0 ">
                </div>
            </div>
    </div>

    {{-- fecalysis --}}
    <div class=" grid grid-cols-8 gap-4 sm:gap-2 mb-4">
                        <div class="col-span-2 sm:col-span-2">
                            <p class="block text-sm font-medium text-gray-700">
                                C. Fecalysis
                            </p>
                        </div>
                        <div class="col-span-2 sm:col-span-1 ">
                            <div class="flex items-end">
                                <div class="flex items-center h-5">
                                    <input id="fecalysis_normal" name="fecalysis" type="radio" value="normal" {{
                                        (old('fecalysis')==='normal' ) ? 'checked' : '' }}
                                        class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full">
                                </div>
                                <div class="ml-2 text-sm">
                                    <label for="fecalysis_normal" class="font-medium text-gray-700">Normal</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-5">
                            <div class="lab uri flex items-center h-5">
                                <div>
                                    <input id="fecalysis_not_normal" name="fecalysis" type="radio" value="not_normal" {{
                                        (old('fecalysis')==='not_normal' ) ? 'checked' : '' }}
                                        class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full" />
                                </div>
                                <div class="ml-2 text-sm">
                                    <label for="fecalysis_not_normal"
                                        class="font-medium text-gray-700">Findings:</label>
                                </div>
                                <input type="text" name="fecalysis_findings" value="{{ old('fecalysis_findings') }}"
                                    placeholder="{{$errors->has('fecalysis_findings') ? $errors->first('fecalysis_findings') : '' }}"
                                    id="fecalysis_findings" autocomplete="fecalysis"
                                    class="{{($errors->first('fecalysis_findings') ? " border-red-600"
                                    : "border-slate-600" )}} findings ml-2 p-0 px-1 block w-full shadow-sm sm:text-sm
                                    focus:outline-none !outline-none focus:ring-0 border-t-0 border-r-0 border-l-0 ">
            </div>
        </div>
    </div>

    {{-- hbs_ag --}}
    <div class=" grid grid-cols-8 gap-4 sm:gap-2 mb-4">
                                <div class="col-span-2 sm:col-span-2">
                                    <p class="block text-sm font-medium text-gray-700">
                                        D. HBS Ag
                                    </p>
                                </div>
                                <div class="col-span-2 sm:col-span-1 ">
                                    <div class="flex items-end">
                                        <div class="flex items-center h-5">
                                            <input id="hbs_ag_normal" name="hbs_ag" type="radio" value="normal" {{
                                                (old('hbs_ag')==='normal' ) ? 'checked' : '' }}
                                                class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full">
                                        </div>
                                        <div class="ml-2 text-sm">
                                            <label for="hbs_ag_normal" class="font-medium text-gray-700">Normal</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-6 sm:col-span-5">
                                    <div class="lab uri flex items-center h-5">
                                        <div>
                                            <input id="hbs_ag_not_normal" name="hbs_ag" type="radio" value="not_normal"
                                                {{ (old('hbs_ag')==='not_normal' ) ? 'checked' : '' }}
                                                class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full" />
                                        </div>
                                        <div class="ml-2 text-sm">
                                            <label for="hbs_ag_not_normal"
                                                class="font-medium text-gray-700">Findings:</label>
                                        </div>
                                        <input type="text" name="hbs_ag_findings" value="{{ old('hbs_ag_findings') }}"
                                            placeholder="{{$errors->has('hbs_ag_findings') ? $errors->first('hbs_ag_findings') : '' }}"
                                            id="hbs_ag_findings" autocomplete="hbs_ag"
                                            class="{{($errors->first('hbs_ag_findings') ? " border-red-600"
                                            : "border-slate-600" )}} findings ml-2 p-0 px-1 block w-full shadow-sm
                                            sm:text-sm focus:outline-none !outline-none focus:ring-0 border-t-0
                                            border-r-0 border-l-0 ">
            </div>
        </div>
    </div>
    {{-- pregnancy_test --}}
    <div class=" grid grid-cols-8 gap-4 sm:gap-2 mb-4">
                                        <div class="col-span-2 sm:col-span-2">
                                            <p class="block text-sm font-medium text-gray-700">
                                                E. Pregnancy Test
                                            </p>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1 ">
                                            <div class="flex items-end">
                                                <div class="flex items-center h-5">
                                                    <input id="pregnancy_test_normal" name="pregnancy_test" type="radio"
                                                        value="normal" {{ (old('pregnancy_test')==='normal' )
                                                        ? 'checked' : '' }}
                                                        class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full">
                                                </div>
                                                <div class="ml-2 text-sm">
                                                    <label for="pregnancy_test_normal"
                                                        class="font-medium text-gray-700">Normal</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-6 sm:col-span-5">
                                            <div class="lab uri flex items-center h-5">
                                                <div>
                                                    <input id="pregnancy_test_not_normal" name="pregnancy_test"
                                                        type="radio" value="not_normal" {{
                                                        (old('pregnancy_test')==='not_normal' ) ? 'checked' : '' }}
                                                        class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full" />
                                                </div>
                                                <div class="ml-2 text-sm">
                                                    <label for="pregnancy_test_not_normal"
                                                        class="font-medium text-gray-700">Findings:</label>
                                                </div>
                                                <input type="text" name="pregnancy_test_findings"
                                                    value="{{ old('pregnancy_test_findings') }}"
                                                    placeholder="{{$errors->has('pregnancy_test_findings') ? $errors->first('pregnancy_test_findings') : '' }}"
                                                    id="pregnancy_test_findings" autocomplete="pregnancy_test"
                                                    class="{{($errors->first('pregnancy_test_findings') ? "
                                                    border-red-600" : "border-slate-600" )}} findings ml-2 p-0 px-1
                                                    block w-full shadow-sm sm:text-sm focus:outline-none !outline-none
                                                    focus:ring-0 border-t-0 border-r-0 border-l-0 ">
            </div>
        </div>
    </div>
    {{-- drug_test --}}
    <div class=" grid grid-cols-8 gap-4 sm:gap-2 mb-4">
                                                <div class="col-span-2 sm:col-span-2">
                                                    <p class="block text-sm font-medium text-gray-700">
                                                        F. Drug Test
                                                    </p>
                                                </div>
                                                <div class="col-span-2 sm:col-span-1 ">
                                                    <div class="flex items-end">
                                                        <div class="flex items-center h-5">
                                                            <input id="drug_test_normal" name="drug_test" type="radio"
                                                                value="normal" {{ (old('drug_test')==='normal' )
                                                                ? 'checked' : '' }}
                                                                class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full">
                                                        </div>
                                                        <div class="ml-2 text-sm">
                                                            <label for="drug_test_normal"
                                                                class="font-medium text-gray-700">Normal</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-span-6 sm:col-span-5">
                                                    <div class="lab uri flex items-center h-5">
                                                        <div>
                                                            <input id="drug_test_not_normal" name="drug_test"
                                                                type="radio" value="not_normal" {{
                                                                (old('drug_test')==='not_normal' ) ? 'checked' : '' }}
                                                                class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full" />
                                                        </div>
                                                        <div class="ml-2 text-sm">
                                                            <label for="drug_test_not_normal"
                                                                class="font-medium text-gray-700">Findings:</label>
                                                        </div>
                                                        <input type="text" name="drug_test_findings"
                                                            value="{{ old('drug_test_findings') }}"
                                                            placeholder="{{$errors->has('drug_test_findings') ? $errors->first('drug_test_findings') : '' }}"
                                                            id="drug_test_findings" autocomplete="drug_test"
                                                            class="{{($errors->first('drug_test_findings') ? "
                                                            border-red-600" : "border-slate-600" )}} findings ml-2 p-0
                                                            px-1 block w-full shadow-sm sm:text-sm focus:outline-none
                                                            !outline-none focus:ring-0 border-t-0 border-r-0 border-l-0 ">
            </div>
        </div>
    </div>
    {{-- chest_xray --}}
    <div class=" grid grid-cols-8 gap-4 sm:gap-2 mb-4">
                                                        <div class="col-span-2 sm:col-span-2">
                                                            <p class="block text-sm font-medium text-gray-700">
                                                                G. Chest X-Ray
                                                            </p>
                                                        </div>
                                                        <div class="col-span-2 sm:col-span-1 ">
                                                            <div class="flex items-end">
                                                                <div class="flex items-center h-5">
                                                                    <input id="chest_xray_normal" name="chest_xray"
                                                                        type="radio" value="normal" {{
                                                                        (old('chest_xray')==='normal' ) ? 'checked' : ''
                                                                        }}
                                                                        class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full">
                                                                </div>
                                                                <div class="ml-2 text-sm">
                                                                    <label for="chest_xray_normal"
                                                                        class="font-medium text-gray-700">Normal</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-span-6 sm:col-span-5">
                                                            <div class="lab uri flex items-center h-5">
                                                                <div>
                                                                    <input id="chest_xray_not_normal" name="chest_xray"
                                                                        type="radio" value="not_normal" {{
                                                                        (old('chest_xray')==='not_normal' ) ? 'checked'
                                                                        : '' }}
                                                                        class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full" />
                                                                </div>
                                                                <div class="ml-2 text-sm">
                                                                    <label for="chest_xray_not_normal"
                                                                        class="font-medium text-gray-700">Findings:</label>
                                                                </div>
                                                                <input type="text" name="chest_xray_findings"
                                                                    value="{{ old('chest_xray_findings') }}"
                                                                    placeholder="{{$errors->has('chest_xray_findings') ? $errors->first('chest_xray_findings') : '' }}"
                                                                    id="chest_xray_findings" autocomplete="chest_xray"
                                                                    class="{{($errors->first('chest_xray_findings') ? "
                                                                    border-red-600" : "border-slate-600" )}} findings
                                                                    ml-2 p-0 px-1 block w-full shadow-sm sm:text-sm
                                                                    focus:outline-none !outline-none focus:ring-0
                                                                    border-t-0 border-r-0 border-l-0 ">
            </div>
        </div>
    </div>
    {{-- ecg --}}
    <div class=" grid grid-cols-8 gap-4 sm:gap-2 mb-4">
                                                                <div class="col-span-2 sm:col-span-2">
                                                                    <p class="block text-sm font-medium text-gray-700">
                                                                        H. ECG
                                                                    </p>
                                                                </div>
                                                                <div class="col-span-2 sm:col-span-1 ">
                                                                    <div class="flex items-end">
                                                                        <div class="flex items-center h-5">
                                                                            <input id="ecg_normal" name="ecg"
                                                                                type="radio" value="normal" {{
                                                                                (old('ecg')==='normal' ) ? 'checked'
                                                                                : '' }}
                                                                                class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full">
                                                                        </div>
                                                                        <div class="ml-2 text-sm">
                                                                            <label for="ecg_normal"
                                                                                class="font-medium text-gray-700">Normal</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-span-6 sm:col-span-5">
                                                                    <div class="lab uri flex items-center h-5">
                                                                        <div>
                                                                            <input id="ecg_not_normal" name="ecg"
                                                                                type="radio" value="not_normal" {{
                                                                                (old('ecg')==='not_normal' ) ? 'checked'
                                                                                : '' }}
                                                                                class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full" />
                                                                        </div>
                                                                        <div class="ml-2 text-sm">
                                                                            <label for="ecg_not_normal"
                                                                                class="font-medium text-gray-700">Findings:</label>
                                                                        </div>
                                                                        <input type="text" name="ecg_findings"
                                                                            value="{{ old('ecg_findings') }}"
                                                                            placeholder="{{$errors->has('ecg_findings') ? $errors->first('ecg_findings') : '' }}"
                                                                            id="ecg_findings" autocomplete="ecg"
                                                                            class="{{($errors->first('ecg_findings') ? "
                                                                            border-red-600" : "border-slate-600" )}}
                                                                            findings ml-2 p-0 px-1 block w-full
                                                                            shadow-sm sm:text-sm focus:outline-none
                                                                            !outline-none focus:ring-0 border-t-0
                                                                            border-r-0 border-l-0 ">
            </div>
        </div>
    </div>

    <div class=" col-span-6">
                                                                        <label for="others"
                                                                            class="block text-sm font-medium text-gray-700">
                                                                            I. Others
                                                                        </label>
                                                                        <textarea name="others" id="others"
                                                                            autocomplete="others"
                                                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('others') }}</textarea>
                                                                    </div>


                                                                    <hr class="col-span-6 my-4">

                                                                    {{-- classification --}}
                                                                    <div class="col-span-6">
                                                                        <h2 class="font-medium">Classification</h2>
                                                                    </div>

                                                                    <div class="col-span-6 mt-4">
                                                                        <input id="class_a" name="class_a"
                                                                            type="checkbox"
                                                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                                        <label for="class_a"
                                                                            class="uppercase ml-2 text-sm font-medium text-gray-700">
                                                                            Class a
                                                                        </label>
                                                                        <span class="text-sm"> - Physically fit for all
                                                                            types of work.
                                                                            No pertinent findings noted.</span>
                                                                    </div>

                                                                    <div class="col-span-6 mt-4">
                                                                        <input id="class_b" name="class_b"
                                                                            type="checkbox"
                                                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                                        <label for="class_b"
                                                                            class="uppercase ml-2 text-sm font-medium text-gray-700">
                                                                            Class b
                                                                        </label>
                                                                        <span class="text-sm"> - Physically fit for all
                                                                            types of work.
                                                                            Has minor ailment that is easily curable and
                                                                            offers not handicap to work or to job
                                                                            applied for.</span>
                                                                    </div>

                                                                    <div class="col-span-6 mt-4">
                                                                        <input id="class_c" name="class_c"
                                                                            type="checkbox"
                                                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                                        <label for="class_c"
                                                                            class="uppercase ml-2 text-sm font-medium text-gray-700">
                                                                            Class c
                                                                        </label>
                                                                        <span class="text-sm"> - Employment at the risk
                                                                            and discretion of the management.</span>
                                                                    </div>

                                                                    <div class="col-span-6 mt-4">
                                                                        <input id="pending" name="pending"
                                                                            type="checkbox"
                                                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                                        <label for="pending"
                                                                            class="uppercase ml-2 text-sm font-medium text-gray-700">
                                                                            Pending
                                                                        </label>
                                                                        <span class="text-sm"> - <input type="text"
                                                                                name="pending_text" id="pending_text"
                                                                                autocomplete="pending_text" class="border-slate-700
                                                                            ml-2 p-0 px-1 w-3/4 shadow-sm sm:text-sm focus:outline-none !outline-none focus:ring-0 border-t-0 border-r-0
                                                                            border-l-0 ">
                                                                        </span>
                                                                    </div>

                                                                    <div class="col-span-6 mt-4">
                                                                        <input id="unfit" name="unfit" type="checkbox"
                                                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                                        <label for="unfit"
                                                                            class="uppercase ml-2 text-sm font-medium text-gray-700">
                                                                            unfit
                                                                        </label>
                                                                        <span class="text-sm"> - <input type="text"
                                                                                name="unfit_text" id="unfit_text"
                                                                                autocomplete="unfit_text" class="border-slate-700
                                                                            ml-2 p-0 px-1 w-3/4 shadow-sm sm:text-sm focus:outline-none !outline-none focus:ring-0 border-t-0 border-r-0
                                                                            border-l-0 ">
                                                                        </span>
                                                                    </div>

                                                                    <hr class="col-span-6 my-4">

                                                                    {{-- remarks --}}
                                                                    <div class="col-span-6">
                                                                        <label for="remarks" class="font-medium">Remarks
                                                                        </label>
                                                                    </div>

                                                                    <div class="col-span-6">
                                                                        <textarea name="remarks" id="remarks"
                                                                            autocomplete="remarks"
                                                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('remarks') }}</textarea>
                                                                    </div>

                                                                    {{-- school year --}}
                                                                    <div class="mt-4 col-span-6 sm:col-span-2">
                                                                        <label for="school_year_id"
                                                                            class="block text-sm font-medium text-gray-700">
                                                                            School Year</label>
                                                                        <select name="school_year_id"
                                                                            autocomplete="school_year_id"
                                                                            class="{{($errors->first('school_year_id') ? "
                                                                            border-red-600" : "border-gray-300" )}} mt-1
                                                                            block w-full py-2 px-3 border
                                                                            border-gray-300 bg-white rounded-md
                                                                            shadow-sm focus:outline-none
                                                                            focus:ring-indigo-500
                                                                            focus:border-indigo-500 sm:text-sm">
                                                                            <option selected disabled hidden>Select Year
                                                                            </option>
                                                                            @foreach ($school_years as $school_year)
                                                                            <option {{ old('school_year_id',
                                                                                $school_year->id) }} id="school_year_id"
                                                                                value="{{
                                                                                $school_year->id
                                                                                }}">{{ $school_year->school_year }}
                                                                            </option>
                                                                            @endforeach

                                                                        </select>
                                                                        @error('school_year_id')
                                                                        <div class="flex items-center gap-1 mt-1 ml-1">
                                                                            <div>
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    class="h-4 w-4" viewBox="0 0 20 20"
                                                                                    fill="#cc0000">
                                                                                    <path fill-rule="evenodd"
                                                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                                                        clip-rule="evenodd" />
                                                                                </svg>
                                                                            </div>
                                                                            <p class="text-red-700 font-medium text-xs">
                                                                                {{ $message }}</p>
                                                                        </div>
                                                                        @enderror
                                                                    </div>

                                                                    <hr class="col-span-6 my-4">

                                                                    <div class="col-span-6 sm:col-span-2"></div>
                                                                    <div class="mt-4 col-span-6 sm:col-span-2">
                                                                        <input type="text"
                                                                            name="university_physician_examine"
                                                                            id="university_physician_examine"
                                                                            autocomplete="university-physician"
                                                                            value="{{ old('university_physician_examine') }}"
                                                                            class="border-gray-300 mb-1
                                                                            focus:ring-indigo-500
                                                                            focus:border-indigo-500 block w-full
                                                                            shadow-sm sm:text-sm
                                                                            rounded-md ">
                                                                        <label for="university_physician_examine"
                                                                            class="block text-sm font-medium text-gray-700 text-center">University
                                                                            Physician</label>

                                                                    </div>


                                                                </div>

                                                                <div class=" px-4 py-3 bg-gray-50 text-right sm:px-6">
                                                                    <button type="submit"
                                                                        class="inline-flex justify-center py-2 px-4 border border-transparent border-gray-300 shadow text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                        Save Examination Report
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            </form>
</x-app-layout>


<script>
    // yea i know this code is ugly
    const radios = document.querySelectorAll('.radio')
    const findings = document.querySelectorAll('.findings')

    // disable first
    findings.forEach((finding) => {
        finding.disabled = true
    })

    radios.forEach((radio) => {
        radio.addEventListener('change', () => {
                const toggleEnableInput = (radio_name) => {
            for (let i = 0; i < findings.length; i++) {
                    // obo
                    if (radio_name === 'obo_normal') {
                        findings[0].disabled = true
                        findings[0].value = ''
                        findings[0].placeholder = ''
                        findings[0].classList.add('border-slate-600')
                     } else if (radio_name === 'obo_not_normal') {
                        findings[0].disabled = false
                    }
                    // urinalysis
                    if (radio_name === 'urinalysis_normal') {
                        findings[1].disabled = true
                        findings[1].value = ''
                        findings[1].placeholder = ''
                        findings[1].classList.add('border-slate-600')
                     } else if (radio_name === 'urinalysis_not_normal') {
                        findings[1].disabled = false
                    }
                    // fecalysis
                    if (radio_name === 'fecalysis_normal') {
                        findings[2].disabled = true
                        findings[2].value = ''
                        findings[2].placeholder = ''
                        findings[2].classList.add('border-slate-600')
                     } else if (radio_name === 'fecalysis_not_normal') {
                        findings[2].disabled = false
                    }
                    // hbs_ag
                    if (radio_name === 'hbs_ag_normal') {
                        findings[3].disabled = true
                        findings[3].value = ''
                        findings[3].placeholder = ''
                        findings[3].classList.add('border-slate-600')
                     } else if (radio_name === 'hbs_ag_not_normal') {
                        findings[3].disabled = false
                    }
                    // pregnancy_test
                    if (radio_name === 'pregnancy_test_normal') {
                        findings[4].disabled = true
                        findings[4].value = ''
                        findings[4].placeholder = ''
                        findings[4].classList.add('border-slate-600')
                     } else if (radio_name === 'pregnancy_test_not_normal') {
                        findings[4].disabled = false
                    }
                    // drug_test
                    if (radio_name === 'drug_test_normal') {
                        findings[5].disabled = true
                        findings[5].value = ''
                        findings[5].placeholder = ''
                        findings[5].classList.add('border-slate-600')
                     } else if (radio_name === 'drug_test_not_normal') {
                        findings[5].disabled = false
                    }
                    // chest_xray
                    if (radio_name === 'chest_xray_normal') {
                        findings[6].disabled = true
                        findings[6].value = ''
                        findings[6].placeholder = ''
                        findings[6].classList.add('border-slate-600')
                     } else if (radio_name === 'chest_xray_not_normal') {
                        findings[6].disabled = false
                    }
                    // ecg
                    if (radio_name === 'ecg_normal') {
                        findings[7].disabled = true
                        findings[7].value = ''
                        findings[7].placeholder = ''
                        findings[7].classList.add('border-slate-600')
                     } else if (radio_name === 'ecg_not_normal') {
                        findings[7].disabled = false
                    }
                }
            }
            toggleEnableInput(radio.id)
        })
    })

</script>
