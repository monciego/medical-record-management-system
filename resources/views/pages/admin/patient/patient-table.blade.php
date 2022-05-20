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
            {{-- @unless ($medicines->isEmpty())
            @foreach ($medicines as $medicine) --}}
            <tr>
                <td class="p-2">
                    {{-- <div class="text-slate-800 capitalize">{{ $medicine->medicine_name }}</div> --}}
                    <div>18-AC-0327</div>
                </td>
                <td class="p-2 ">
                    {{-- <div>{{ $medicine->medicine_quantity }}</div> --}}
                    <div>Jericho P. Bantiquete</div>
                </td>
                <td class="p-2 ">
                    {{-- <div>{{ $medicine->medicine_cost }}</div> --}}
                    <div>Student</div>
                </td>
                <td class="p-2 ">
                    {{-- <div>{{ $medicine->date_of_acquisition }}</div> --}}
                    <div>Student</div>
                </td>
                <td class="p-2 ">
                    {{-- <div>{{ $medicine->date_of_acquisition }}</div> --}}
                    <div>June 24, 2022</div>
                </td>
                <td class="p-2 ">
                    <a class="text-indigo-700 underline cursor-pointer" href="">More Details</a>
                </td>
            </tr>
            {{-- @endforeach
            @else
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <p class="text-center">No Medicines Found</p>
                </td>
            </tr>
            @endunless --}}
        </tbody>
    </table>
</div>
