<x-app-layout>
    @section('title', isset($patient) ? $patient->user_patient_full_name : 'Patient')
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
                        @include('utils.patient-role')
                    </div>
                </div>
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details of
                    {{$patient->user_patient_full_name }}
                </p>
            </div>
        </div>

        <hr>
        <div class=" pb-5 pt-5 grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">User ID</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $patient->user_patient_id }}
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Full name</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $patient->user_patient_full_name }}
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Sex/Gender</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $patient->user_patient_gender }}
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">
                    @if ($patient->user_patient_role === 'student')
                    Year and Section
                    @elseif($patient->user_patient_role === 'teaching_staff')
                    Department
                    @elseif($patient->user_patient_role === 'non_teaching_staff')
                    Role
                    @endif
                </h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $patient->user_year_department_role }}
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Contact Number</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $patient->patient_phone_number }}
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Birth Date</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ \Carbon\Carbon::parse($patient->user_patient_birthday)->isoFormat('MMM D YYYY')}}
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Age</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ \Carbon\Carbon::parse($patient->user_patient_birthday)->age }}
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Blood Type</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $patient->user_patient_blood_type }}
                    @if($patient->user_patient_blood_type == null )
                    Not Specified
                    @endif
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Consult Date</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{
                    \Carbon\Carbon::parse($patient->patient_information->patient_consult_date)->isoFormat('MMM D
                    YYYY')}}
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Consult Time</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ \Carbon\Carbon::parse($patient->patient_information->patient_consult_time)->format('h:i A')}}
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Prescribed Medicine</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $patient->patient_information->patient_prescribed_medicine }}
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">No. of {{
                    $patient->patient_information->patient_prescribed_medicine }}
                    Prescribed</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $patient->patient_information->patient_prescribed_medicine_quantity}}
                </p>
            </div>
            <div class="col-span-6">
                <h5 class="text-sm text-gray-800 mb-1">Medical History</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $patient->user_patient_medical_history }}
                    @if ($patient->user_patient_medical_history == null)
                    N/A
                    @endif
                </p>
            </div>
            <div class="col-span-6">
                <h5 class="text-sm text-gray-800 mb-1">Medical Comment</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $patient->patient_medical_comments }}
                    @if ($patient->patient_medical_comments == null)
                    N/A
                    @endif
                </p>
            </div>
        </div>
    </div>
    {{-- <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium capitalize text-gray-900">Patient Information
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details of {{ $patient->user_patient_full_name }}.
            </p>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Full name</dt>
                    <dd class="mt-1 text-sm  font-medium text-gray-900 sm:mt-0 sm:col-span-2">{{
                        $patient->user_patient_full_name }}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Sex/Gender</dt>
                    <dd class="mt-1 text-sm font-medium text-gray-900 sm:mt-0 sm:col-span-2">{{
                        $patient->user_patient_gender
                        }}</dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Contact Number</dt>
                    <dd class="mt-1 text-sm font-medium text-gray-900 sm:mt-0 sm:col-span-2">{{
                        $patient->patient_phone_number }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Prescribed Medicine</dt>
                    <dd class="mt-1 text-sm font-medium text-gray-900 sm:mt-0 sm:col-span-2">{{
                        $patient->patient_information->patient_prescribed_medicine }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Consult Date</dt>
                    <dd class="mt-1 text-sm font-medium text-gray-900 sm:mt-0 sm:col-span-2">
                        <div>{{
                            \Carbon\Carbon::parse($patient->patient_information->patient_consult_date)->isoFormat('MMM D
                            YYYY')}}</div>
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Consult Time</dt>
                    <dd class="mt-1 text-sm font-medium text-gray-900 sm:mt-0 sm:col-span-2">{{
                        $patient->patient_information->patient_consult_time }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Comments</dt>
                    <dd class="mt-1 font-medium text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{
                        $patient->patient_medical_comments
                        }}</dd>
                </div>

            </dl>
        </div>
    </div> --}}
</x-app-layout>
