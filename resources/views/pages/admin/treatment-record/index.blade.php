<x-app-layout>
    Treatment Record

    Filter:
    @foreach ($school_years as $school_year)
    <a href="{{ route('treatment-records.index') }}/?school_year={{ $school_year->id }}">{{ $school_year->school_year
        }}</a>
    @endforeach

    @foreach ($patients as $patient)
    <li>
        {{ $patient->user_data->user_patient_full_name }}
        {{ $patient->school_year->school_year }}
    </li>
    @endforeach
</x-app-layout>
