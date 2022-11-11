<x-app-layout>
    @section('title', isset($user) ? $user->user_patient_first_name . " " . $user->user_patient_last_name : 'User')
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
                    {{$user->user_patient_first_name }}
                    {{$user->user_patient_last_name }}
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
                <h5 class="text-sm text-gray-800 mb-1">First name</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $user->user_patient_first_name }}
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Middle name</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $user->user_patient_middle_name }}
                    @if($user->user_patient_middle_name == null )
                    Not Specified
                    @endif
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Last name</h5>
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
                <h5 class="text-sm text-gray-800 mb-1">Gender</h5>
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
                    @if($user->user_patient_blood_type == 'o_negative')
                    O negative
                    @elseif($user->user_patient_blood_type == 'o_positive')
                    O positive
                    @elseif($user->user_patient_blood_type == 'a_negative')
                    A negative
                    @elseif($user->user_patient_blood_type == 'a_positive')
                    A positive
                    @elseif($user->user_patient_blood_type == 'b_negative')
                    B negative
                    @elseif($user->user_patient_blood_type == 'b_positive')
                    B positive
                    @elseif($user->user_patient_blood_type == 'ab_negative')
                    AB negative
                    @elseif($user->user_patient_blood_type == 'ab_positive')
                    AB positive
                    @endif
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Civil Status</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $user->civil_status }}
                    @if($user->civil_status == null )
                    Not Specified
                    @endif
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Nationality</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $user->nationality }}
                    @if($user->nationality == null )
                    Not Specified
                    @endif
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Religion</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $user->religion }}
                    @if($user->religion == null )
                    Not Specified
                    @endif
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Contact Person</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $user->contact_person }}
                    @if($user->contact_person == null )
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

            {{-- medical history --}}
            <div class="col-span-6">
                <h2 class="font-medium">Medical History</h2>
            </div>

            <div class="col-span-6 ">
                <h5 class="text-sm text-gray-800 mb-1">History of Past Illness</h5>
                <p
                    class="{{ $user->history_of_past_illness == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $user->history_of_past_illness }}
                    @if ($user->history_of_past_illness == null)
                    N/A
                    @endif
                </p>
            </div>

            <div class="col-span-6 ">
                <h5 class="text-sm text-gray-800 mb-1">Past Illness</h5>
                <p
                    class="{{ $user->past_illness == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $user->past_illness }}
                    @if ($user->past_illness == null)
                    N/A
                    @endif
                </p>
            </div>

            <div class="col-span-6 ">
                <h5 class="text-sm text-gray-800 mb-1">Operations and Hospitalizations</h5>
                <p
                    class="{{ $user->operations_and_hospitalizations == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $user->operations_and_hospitalizations }}
                    @if ($user->operations_and_hospitalizations == null)
                    N/A
                    @endif
                </p>
            </div>

            <div class="col-span-6 ">
                <h5 class="text-sm text-gray-800 mb-1">Immunization History</h5>
                <p
                    class="{{ $user->immunization_history == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $user->immunization_history }}
                    @if ($user->immunization_history == null)
                    N/A
                    @endif
                </p>
            </div>

            <div class="col-span-6 ">
                <h5 class="text-sm text-gray-800 mb-1">Social and Environmental History</h5>
                <p
                    class="{{ $user->social_and_environmental_history == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $user->social_and_environmental_history }}
                    @if ($user->social_and_environmental_history == null)
                    N/A
                    @endif
                </p>
            </div>

            <div class="col-span-6 ">
                <h5 class="text-sm text-gray-800 mb-1">Obstetrics Gynecological History</h5>
                <p
                    class="{{ $user->obstetrics_gynecological_history == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $user->obstetrics_gynecological_history }}
                    @if ($user->obstetrics_gynecological_history == null)
                    N/A
                    @endif
                </p>
            </div>

            {{-- Physical Examination --}}
            <div class="col-span-6">
                <h2 class="font-medium">Physical Examination</h2>
            </div>

            {{-- general survey --}}
            <div class="col-span-6 sm:col-span-2">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="general_survey" name="general_survey" {{ $user->general_survey == true ? 'checked' :
                        '' }} disabled="disabled" type="checkbox"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="general_survey" class="font-medium text-gray-700">General
                            Survey</label>
                    </div>
                </div>
            </div>

            {{--skin --}}
            <div class="col-span-6 sm:col-span-2">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="skin" name="skin" {{ $user->skin == true ? 'checked' :
                        '' }} disabled="disabled" type="checkbox"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="skin" class="font-medium text-gray-700">Skin</label>
                    </div>
                </div>
            </div>

            {{--heent --}}
            <div class="col-span-6 sm:col-span-2">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="heent" name="heent" {{ $user->heent == true ? 'checked' :
                        '' }} disabled="disabled" type="checkbox"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="heent" class="font-medium text-gray-700">Heent</label>
                    </div>
                </div>
            </div>

            {{-- Chest and Lungs --}}
            <div class="col-span-6 sm:col-span-2">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="chest_and_lungs" name="chest_and_lungs" {{ $user->chest_and_lungs == true ? 'checked'
                        :
                        '' }} disabled="disabled" type="checkbox"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="chest_and_lungs" class="font-medium text-gray-700">Chest and Lungs</label>
                    </div>
                </div>
            </div>

            {{-- Heart --}}
            <div class="col-span-6 sm:col-span-2">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="heart" name="heart" {{ $user->heart == true ? 'checked'
                        :
                        '' }} disabled="disabled" type="checkbox"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="heart" class="font-medium text-gray-700">Heart</label>
                    </div>
                </div>
            </div>

            {{-- Abdomen --}}
            <div class="col-span-6 sm:col-span-2">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="abdomen" name="abdomen" {{ $user->abdomen == true ? 'checked'
                        :
                        '' }} disabled="disabled" type="checkbox"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="abdomen" class="font-medium text-gray-700">Abdomen</label>
                    </div>
                </div>
            </div>

            {{-- genitourinary --}}
            <div class="col-span-6 sm:col-span-2">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="genitourinary" name="genitourinary" {{ $user->genitourinary == true ? 'checked'
                        :
                        '' }} disabled="disabled" type="checkbox"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="genitourinary" class="font-medium text-gray-700">Genitourinary</label>
                    </div>
                </div>
            </div>

            {{-- musculoskeletal --}}
            <div class="col-span-6 sm:col-span-2">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="musculoskeletal" name="musculoskeletal" {{ $user->musculoskeletal == true ? 'checked'
                        :
                        '' }} disabled="disabled" type="checkbox"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="musculoskeletal" class="font-medium text-gray-700">Musculoskeletal</label>
                    </div>
                </div>
            </div>

            <div class="col-span-6 mt-0 sm:mt-4">
                <h5 class="text-sm text-gray-800 mb-1">Neurological Examination</h5>
            </div>

            {{-- mental_status --}}
            <div class="col-span-6 sm:col-span-2">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="mental_status" name="mental_status" {{ $user->mental_status == true ? 'checked'
                        :
                        '' }} disabled="disabled" type="checkbox"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="mental_status" class="font-medium text-gray-700">Mental Status</label>
                    </div>
                </div>
            </div>

            {{-- coordination_and_balance --}}
            <div class="col-span-6 sm:col-span-2">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="coordination_and_balance" name="coordination_and_balance" {{
                            $user->coordination_and_balance == true ? 'checked'
                        :
                        '' }} disabled="disabled" type="checkbox"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="coordination_and_balance" class="font-medium text-gray-700">Coordination and
                            Balance</label>
                    </div>
                </div>
            </div>

            {{-- reflexes --}}
            <div class="col-span-6 sm:col-span-2">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="reflexes" name="reflexes" {{ $user->reflexes == true ? 'checked'
                        :
                        '' }} disabled="disabled" type="checkbox"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="reflexes" class="font-medium text-gray-700">Reflexes</label>
                    </div>
                </div>
            </div>

            {{-- sensation --}}
            <div class="col-span-6 sm:col-span-2">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="sensation" name="sensation" {{ $user->sensation == true ? 'checked'
                        :
                        '' }} disabled="disabled" type="checkbox"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="sensation" class="font-medium text-gray-700">Sensation</label>
                    </div>
                </div>
            </div>

            {{-- cranial_nerves --}}
            <div class="col-span-6 sm:col-span-2">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="cranial_nerves" name="cranial_nerves" {{ $user->cranial_nerves == true ? 'checked'
                        :
                        '' }} disabled="disabled" type="checkbox"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="cranial_nerves" class="font-medium text-gray-700">Cranial Nerves</label>
                    </div>
                </div>
            </div>

            {{-- autonomic_nervous_system_nerves --}}
            <div class="col-span-6 sm:col-span-2">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="autonomic_nervous_system_nerves" name="autonomic_nervous_system_nerves" {{
                            $user->autonomic_nervous_system_nerves == true ? 'checked'
                        :
                        '' }} disabled="disabled" type="checkbox"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="autonomic_nervous_system_nerves" class="font-medium text-gray-700">Autonomic Nervous
                            System Nerves</label>
                    </div>
                </div>
            </div>

            <div class="col-span-6 mt-0 sm:mt-4">
                <h5 class="text-sm text-gray-800 mb-1">Others (Neurological Examination)</h5>
                <p
                    class="{{ $user->neurological_examination == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $user->neurological_examination }}
                    @if ($user->neurological_examination == null)
                    N/A
                    @endif
                </p>
            </div>

            <div class="col-span-6">
                <h5 class="text-sm text-gray-800">Laboratory Results</h5>
            </div>

            {{-- urine --}}
            <div class="col-span-6 sm:col-span-2">
                <div class="col-span-6 sm:col-span-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="urine" name="urine" {{ $user->urine == true ? 'checked'
                            :
                            '' }} disabled="disabled" type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="urine" class="font-medium text-gray-700">
                                Urine
                            </label>
                        </div>
                    </div>
                </div>
                <h5 class="text-sm text-gray-800 mb-1">Result</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $user->urine_comment }}
                    @if ($user->urine_comment == null)
                    N/A
                    @endif
                </p>
            </div>

            {{-- stool --}}
            <div class="col-span-6 sm:col-span-2">
                <div class="col-span-6 sm:col-span-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="stool" name="stool" {{ $user->stool == true ? 'checked'
                            :
                            '' }} disabled="disabled" type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="stool" class="font-medium text-gray-700">
                                Stool
                            </label>
                        </div>
                    </div>
                </div>
                <h5 class="text-sm text-gray-800 mb-1">Result</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $user->stool_comment }}
                    @if ($user->stool_comment == null)
                    N/A
                    @endif
                </p>
            </div>

            {{-- saliva --}}
            <div class="col-span-6 sm:col-span-2">
                <div class="col-span-6 sm:col-span-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="saliva" name="saliva" {{ $user->saliva == true ? 'checked'
                            :
                            '' }} disabled="disabled" type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="saliva" class="font-medium text-gray-700">
                                Saliva
                            </label>
                        </div>
                    </div>
                </div>
                <h5 class="text-sm text-gray-800 mb-1">Result</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $user->saliva_comment }}
                    @if ($user->saliva_comment == null)
                    N/A
                    @endif
                </p>
            </div>

            {{-- sputum --}}
            <div class="col-span-6 sm:col-span-2">
                <div class="col-span-6 sm:col-span-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="sputum" name="sputum" {{ $user->sputum == true ? 'checked'
                            :
                            '' }} disabled="disabled" type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="sputum" class="font-medium text-gray-700">
                                Sputum
                            </label>
                        </div>
                    </div>
                </div>
                <h5 class="text-sm text-gray-800 mb-1">Result</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $user->sputum_comment }}
                    @if ($user->sputum_comment == null)
                    N/A
                    @endif
                </p>
            </div>

            {{-- complete_blood_count --}}
            <div class="col-span-6 sm:col-span-2">
                <div class="col-span-6 sm:col-span-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="complete_blood_count" name="complete_blood_count" {{ $user->complete_blood_count
                            == true ? 'checked'
                            :
                            '' }} disabled="disabled" type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="complete_blood_count" class="font-medium text-gray-700">
                                Complete Blood Count
                            </label>
                        </div>
                    </div>
                </div>
                <h5 class="text-sm text-gray-800 mb-1">Result</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $user->complete_blood_count_comment }}
                    @if ($user->complete_blood_count_comment == null)
                    N/A
                    @endif
                </p>
            </div>

            {{-- x_ray --}}
            <div class="col-span-6 sm:col-span-2">
                <div class="col-span-6 sm:col-span-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="x_ray" name="x_ray" {{ $user->x_ray
                            == true ? 'checked'
                            :
                            '' }} disabled="disabled" type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="x_ray" class="font-medium text-gray-700">
                                X-ray
                            </label>
                        </div>
                    </div>
                </div>
                <h5 class="text-sm text-gray-800 mb-1">Result</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $user->x_ray_comment }}
                    @if ($user->x_ray_comment == null)
                    N/A
                    @endif
                </p>
            </div>

            <div class="col-span-6">
                <h5 class="text-sm text-gray-800 mb-1">Others (Laboratory Results)</h5>
                <p
                    class="{{ $user->laboratory_results == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $user->laboratory_results }}
                    @if ($user->laboratory_results == null)
                    N/A
                    @endif
                </p>
            </div>

            <div class="col-span-6">
                <h5 class="text-sm text-gray-800 mb-1">Assestment</h5>
                <p
                    class="{{ $user->assestment == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $user->assestment }}
                    @if ($user->assestment == null)
                    N/A
                    @endif
                </p>
            </div>

            <div class="col-span-6 sm:col-span-3">
                <p
                    class="text-sm dark-text font-medium  capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $user->university_physician }}
                    @if($user->university_physician == null )
                    Not Specified
                    @endif
                </p>
                <h5 class="text-sm text-gray-800 mt-1 mx-4">University Physician</h5>
            </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <a href="{{ route('examine', $user->id ) }}"
                class="mr-1 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-slate-600 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500">
                Examine
            </a>
            <a href="{{ route('consult', $user->id ) }}"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Consult
            </a>
        </div>
    </div>
</x-app-layout>
