<x-app-layout>
    @section('title', isset($patient) ? $patient->user_data->user_patient_first_name : 'Treatment Record')

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
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Treatment Record of
                    {{$patient->user_data->user_patient_first_name }}
                    {{$patient->user_data->user_patient_last_name }}
                </p>
            </div>
            <div class="my-2 sm:my-0 text-sm">
                <h2>Consult Date:
                    <span>
                        {{
                        \Carbon\Carbon::parse($patient->patient_consult_date)->isoFormat('MMM D
                        YYYY')}}
                    </span>
                </h2>
                <h3>Consult Time:
                    <span>
                        {{ \Carbon\Carbon::parse($patient->patient_consult_time)->format('h:i
                        A')}}
                    </span>
                </h3>
            </div>
        </div>

        <hr>

        <div class="flex items-center my-4">
            <img class="h-16" src="{{ asset('gifs/document.gif') }}" alt="document image" />
            <div>
                <h2 class="font-semibold capitalize">Visit:
                    {{ $patient->clinic }}
                </h2>
                <h4 class="text-sm"><span class="font-medium">
                        @if ($patient->clinic === 'dental')
                        Dentist
                        @else
                        Phyisican
                        @endif:</span> {{ $patient->physician_name
                    }}

                </h4>
            </div>
        </div>
        <p class="mb-4">
            <span class="font-medium">School Year:</span>
            {!! $patient->school_year->school_year !!}
        </p>
        <p class="mb-4">
            <span class="font-medium">Complaint:</span>
            {!! $patient->complaints !!}
        </p>
        <p class="mb-4">
            <span class="font-medium">Diagnosis:</span>
            {!! $patient->diagnosis !!}
        </p>
        <p>
            <span class="font-medium">Medicines Given: <div class="ml-8 flex gap-2">
                    <div>
                        @foreach(explode('|', $patient->patient_prescribed_medicine_quantity)
                        as $medicine_quantity)
                        @if ($medicine_quantity)
                        <li>{{ number_format($medicine_quantity) }}</li>
                        @else
                        <li>No Medicines Given</li>
                        @endif
                        @endforeach
                    </div>
                    <div>
                        @foreach(explode('|', $patient->patient_prescribed_medicine) as $medicine)
                        <p class="block">{{$medicine}}</p>
                        @endforeach
                    </div>
                </div>
            </span>
        </p>
        @if ($patient->patient_medical_comments > 0)
        <p class="mt-4">
            <span class="font-medium">Comments:</span>
            {!! nl2br($patient->patient_medical_comments) !!}
        </p>
        @endif
        </ul>
    </div>
</x-app-layout>