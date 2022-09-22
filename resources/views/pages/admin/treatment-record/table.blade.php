{{-- Table --}}
@unless ($patients->isEmpty())
<div class="overflow-x-auto">
    <table class="table-auto w-full">
        {{-- table header --}}
        <thead class="text-xs uppercase text-slate-400 bg-slate-50 rounded-sm">
            <tr>
                <th class="p-2">
                    <div class="font-semibold text-left">Patient ID</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">Patient Name</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">Patient Role</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">Department/Year</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">Action</div>
                </th>
            </tr>
        </thead>
        {{-- table body --}}
        <tbody class="text-sm font-medium divide-y divide-slate-100">
            {{-- row --}}
            @foreach ($patients as $patient)
            <tr>
                <td class="p-2">
                    <div>{{ $patient->user_data->user_patient_id }}</div>
                </td>
                <td class="p-2 ">
                    <div>{{ $patient->user_data->user_patient_full_name }}</div>
                </td>
                <td class="p-2 ">
                    @if($patient->user_data->user_patient_role == 'teaching_staff')
                    Teaching Staff
                    @elseif($patient->user_data->user_patient_role == 'non_teaching_staff')
                    Non-Teaching Staff
                    @elseif($patient->user_data->user_patient_role == 'student')
                    Student
                    @endif
                </td>
                <td class="p-2 ">
                    <div>{{ $patient->user_data->user_year_department_role }}</div>
                </td>
                <td class="p-2 ">
                    <a class="text-indigo-700 underline cursor-pointer"
                        href="{{ route('treatment-records.show', $patient->id) }}">More
                        Details</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="flex-col flex items-center justify-center">
    <div>
        <img src="{{ asset('images/empty-illustrations/empty-patient-table.svg') }}"
            alt="There are currently no listed records.">
    </div>
    <div>
        <h1 class="text-center font-bold text-xl mt-8 uppercase">
            There are currently no listed records.
        </h1>
    </div>
</div>
@endunless
