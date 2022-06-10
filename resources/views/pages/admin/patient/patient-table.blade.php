{{-- Table --}}
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
                    <div class="font-semibold text-left">Consult Date</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">Action</div>
                </th>
            </tr>
        </thead>
        {{-- table body --}}
        <tbody class="text-sm font-medium divide-y divide-slate-100">
            {{-- row --}}
            @unless ($patients->isEmpty())
            @foreach ($patients as $patient)
            <tr>
                <td class="p-2">
                    {{-- <div class="text-slate-800 capitalize">{{ $medicine->medicine_name }}</div> --}}
                    <div>{{ $patient->patient_id }}</div>
                </td>
                <td class="p-2 ">
                    {{-- <div>{{ $medicine->medicine_quantity }}</div> --}}
                    <div>{{ $patient->patient_full_name }}</div>
                </td>
                <td class="p-2 ">
                    {{-- <div>{{ $medicine->medicine_cost }}</div> --}}
                    <div>{{ $patient->patient_role }}</div>
                </td>
                <td class="p-2 ">
                    {{-- <div>{{ $medicine->date_of_acquisition }}</div> --}}
                    <div>{{ $patient->patient_department }} {{ $patient->patient_year }}</div>
                </td>
                <td class="p-2 ">
                    {{-- <div>{{ $medicine->date_of_acquisition }}</div> --}}

                    <div>{{ \Carbon\Carbon::parse($patient->patient_consult_date)->isoFormat('MMM D YYYY')}}</div>
                </td>
                <td class="p-2 ">
                    <a class="text-indigo-700 underline cursor-pointer" href="/patient/{{ $patient->id }}">More
                        Details</a>
                </td>
            </tr>
            @endforeach
            @else
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <p class="text-center">No Patients Found</p>
                </td>
            </tr>
            @endunless
        </tbody>
    </table>
</div>
