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
                {{-- <th class="p-2">
                    <div class="font-semibold text-left">Consult Date</div>
                </th> --}}
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
                    {{-- <div class="text-slate-800 capitalize">{{ $medicine->medicine_name }}</div> --}}
                    <div>{{ $patient->user_patient_id }}</div>
                </td>
                <td class="p-2 ">
                    {{-- <div>{{ $medicine->medicine_quantity }}</div> --}}
                    <div>{{ $patient->user_patient_full_name }}</div>
                </td>
                <td class="p-2 ">
                    {{-- <div>{{ $medicine->medicine_cost }}</div> --}}
                    <div>@include('utils.patient-role')</div>
                </td>
                <td class="p-2 ">
                    {{-- <div>{{ $medicine->date_of_acquisition }}</div> --}}
                    <div>{{ $patient->user_year_department_role }}</div>
                </td>
                {{-- <td class="p-2 ">
                    <div>{{ \Carbon\Carbon::parse($patient->patient_consult_date)->isoFormat('MMM D YYYY')}}</div>
                </td> --}}
                <td class="p-2 ">
                    <a class="text-indigo-700 underline cursor-pointer"
                        href="{{ route('patient.show', $patient->id) }}">More
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
            alt="There are currently no listed patients.">
    </div>
    <div>
        <h1 class="text-center font-bold text-xl mt-8 uppercase">
            There are currently no listed patients.
        </h1>
    </div>
</div>
@endunless
