{{-- Table --}}
<div class="overflow-x-auto">
    <table class="table-auto w-full">
        {{-- table header --}}
        <thead class="text-xs uppercase text-slate-400 bg-slate-50 rounded-sm">
            <tr>
                <th class="p-2">
                    <div class="font-semibold text-left">Equipment Name</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">Quantity</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">Total Cost</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">Date of Acquisition</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">Action</div>
                </th>
            </tr>
        </thead>
        {{-- table body --}}
        <tbody class="text-sm font-medium divide-y divide-slate-100">
            {{-- row --}}
            @unless ($equipments->isEmpty())
            @foreach ($equipments as $equipment)
            <tr>
                <td class="p-2">
                    <div class="text-slate-800 capitalize">{{ $equipment->equipment_name }}</div>
                </td>
                <td class="p-2 ">
                    <div>{{ $equipment->equipment_quantity }}</div>
                </td>
                <td class="p-2 ">
                    <div>{{ $equipment->equipment_cost }}</div>
                </td>
                <td class="p-2 ">
                    {{-- <div>{{ $equipment->equipment_date_of_acquisition }}</div> --}}
                    {{ \Carbon\Carbon::parse($equipment->date_of_acquisition)->isoFormat('MMM D YYYY')}}
                </td>
                <td class="p-2 ">
                    <div>

                        @include('pages.admin.equipment.edit-equipment')
                        @include('pages.admin.equipment.delete-equipment')
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <p class="text-center">No Medicines Found</p>
                </td>
            </tr>
            @endunless
        </tbody>
    </table>
</div>
