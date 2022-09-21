<x-app-layout>
    Treatment Record
    @foreach ($patients as $patient)
    <li>
        {{ $patient->user_data->user_patient_full_name }}
        {{ $patient->school_year->school_year }}
    </li>
    @endforeach
</x-app-layout>
