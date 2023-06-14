<x-app-layout>
    @section('title', isset($patient) ? $patient->user_patient_first_name . " " . $patient->user_patient_last_name :
    'Patient')
    <div class="px-4 py-5 sm:px-6 bg-white shadow overflow-hidden sm:rounded-lg mb-4">
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
                    {{$patient->user_patient_first_name }}
                    {{$patient->user_patient_last_name }}
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
                <h5 class="text-sm text-gray-800 mb-1">First name</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $patient->user_patient_first_name }}
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Middle name</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{$patient->user_patient_middle_name }}
                    @if($patient->user_patient_middle_name == null )
                    Not Specified
                    @endif
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Last name</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $patient->user_patient_last_name }}
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Suffix</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    @if($patient->user_patient_suffix == null )
                    Not Specified
                    @elseif ($patient->user_patient_suffix === 'none')
                    Not Specified
                    @else
                    {{$patient->user_patient_suffix }}
                    @endif
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Gender</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $patient->user_patient_gender }}
                </p>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">
                    @if ($patient->user_patient_role === 'student')
                    Course / Year and Section
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
                    @if($patient->user_patient_blood_type == 'o_negative')
                    O-
                    @elseif($patient->user_patient_blood_type == 'o_positive')
                    O+
                    @elseif($patient->user_patient_blood_type == 'a_negative')
                    A-
                    @elseif($patient->user_patient_blood_type == 'a_positive')
                    A+
                    @elseif($patient->user_patient_blood_type == 'b_negative')
                    B-
                    @elseif($patient->user_patient_blood_type == 'b_positive')
                    B+
                    @elseif($patient->user_patient_blood_type == 'ab_negative')
                    AB-
                    @elseif($patient->user_patient_blood_type == 'ab_positive')
                    AB+
                    @endif
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
                <h5 class="text-sm text-gray-800 mb-1">Contact Person</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $patient->contact_person }}
                </p>
            </div>
        </div>
    </div>

    @foreach ($PATIENT_CONSULTATION_INFORMATION as $patientInformation)
    <div class="px-4 py-5 sm:px-6 bg-white shadow overflow-hidden sm:rounded-lg mb-4">
        <div class="flex-col flex md:flex-row justify-between">
            <div class="sm:pb-0 md:pb-5 ">
                <div class="flex items-center gap-2">
                    <div>
                        <h3 class="text-lg leading-6 font-medium capitalize text-gray-900">
                            Treatment Record
                    </div>
                </div>
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Treatment Records of
                    {{$patient->user_patient_first_name }}
                    {{$patient->user_patient_last_name }}
                </p>
            </div>
            <div class="my-2 sm:my-0 text-sm">
                <h2>Consult Date:
                    <span>
                        {{
                        \Carbon\Carbon::parse($patientInformation->patient_consult_date)->isoFormat('MMM D
                        YYYY')}}
                    </span>
                </h2>
                <h3>Consult Time:
                    <span>
                        {{ \Carbon\Carbon::parse($patientInformation->patient_consult_time)->format('h:i
                        A')}}
                    </span>
                </h3>
            </div>
        </div>

        <hr>

        <div class="flex items-center my-4">
            <img class="h-16" src="{{ asset('gifs/document.gif') }}" alt="document image" />
            <div>
                <h2 class="font-semibold capitalize">Visit: {{ $patientInformation->clinic }}</h2>
                <h4 class="text-sm"><span class="font-medium">
                        @if ($patientInformation->clinic === 'dental')
                        Dentist
                        @else
                        Phyisican
                        @endif:</span> {{ $patientInformation->physician_name
                    }}</h4>
            </div>
        </div>
        <p class="mb-4">
            <span class="font-medium">Complaint:</span>
            {!! $patientInformation->complaints !!}
        </p>
        <p class="mb-4">
            <span class="font-medium">Diagnosis:</span>
            {!! $patientInformation->diagnosis !!}
        </p>
        <p>
            <span class="font-medium">Medicines Given: <div class="ml-8 flex gap-2">
                    <div>
                        @foreach(explode('|', $patientInformation->patient_prescribed_medicine_quantity)
                        as $medicine_quantity)
                        @if ($medicine_quantity)
                        <li>{{ number_format($medicine_quantity) }}</li>
                        @else
                        <li>No Medicines Given</li>
                        @endif
                        @endforeach
                    </div>
                    <div>
                        @foreach(explode('|', $patientInformation->patient_prescribed_medicine) as $medicine)
                        <p class="block">{{$medicine}}</p>
                        @endforeach
                    </div>
                </div>
            </span>
        </p>
        @if ($patientInformation->patient_medical_comments > 0)
        <p class="mt-4">
            <span class="font-medium">Comments:</span>
            {!! nl2br($patientInformation->patient_medical_comments) !!}
        </p>
        @endif

        </ul>
    </div>
    @endforeach
</x-app-layout>