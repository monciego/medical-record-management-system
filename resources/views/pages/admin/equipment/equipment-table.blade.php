{{-- Table --}}
@unless ($equipments->isEmpty())
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
            @foreach ($equipments as $equipment)
            <tr>
                <td class="p-2">
                    <div class="text-slate-800 capitalize">{{ $equipment->equipment_name }}</div>
                </td>
                <td class="p-2 ">
                    <div>{{ number_format($equipment->equipment_quantity) }}</div>
                </td>
                <td class="p-2 ">
                    <div>@money($equipment->equipment_cost)</div>
                </td>
                <td class="p-2 ">
                    {{ \Carbon\Carbon::parse($equipment->equipment_date_of_acquisition)->isoFormat('MMM D YYYY')}}
                </td>
                <td class="p-2 ">
                    <div>

                        @include('pages.admin.equipment.edit-equipment')
                        @include('pages.admin.equipment.delete-equipment')
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="flex-col flex items-center justify-center">
    <div>
        <img src="{{ asset('images/empty-illustrations/empty-equipment-table.svg') }}"
            alt="There are currently no equipments patients.">
    </div>
    <div>
        <h1 class="text-center font-bold text-xl mt-8 uppercase">
            There are currently no listed equipments.
        </h1>
    </div>
</div>
@endunless
