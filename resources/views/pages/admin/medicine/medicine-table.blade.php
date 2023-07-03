{{-- Table --}}
@unless ($medicines->isEmpty())
<div class="overflow-x-auto">
    <table class="table-auto w-full">
        {{-- table header --}}
        <thead class="text-xs uppercase text-slate-400 bg-slate-50 rounded-sm">
            <tr>
                <th class="p-2">
                    <div class="font-semibold text-left">Medicine Name</div>
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
                    <div class="font-semibold text-left">Date of Expiration</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">Stock</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">Action</div>
                </th>
            </tr>
        </thead>
        {{-- table body --}}
        <tbody class="text-sm font-medium divide-y divide-slate-100">
            {{-- row --}}
            @foreach ($medicines as $medicine)
            <tr>
                <td class="p-2">
                    <div class="text-slate-800 capitalize">{{ $medicine->medicine_name }}</div>
                </td>
                <td class="p-2 ">
                    <div>{{ number_format($medicine->medicine_quantity) }}</div>

                </td>
                <td class="p-2 ">
                    <div>@money($medicine->medicine_cost)</div>
                </td>
                <td class="p-2 ">
                    {{ \Carbon\Carbon::parse($medicine->date_of_acquisition)->isoFormat('MMM D YYYY')}}
                </td>
                <td class="p-2 ">
                    @if ($medicine->date_of_expiration < $currentTime) <span class="text-red-600">Expired</span>
                        @else {{
                        \Carbon\Carbon::parse($medicine->date_of_expiration)->isoFormat('MMM D YYYY')}}
                        @endif
                </td>
                <td class="p-2 ">
                    <div class="text-red-700">
                        @if ($medicine->medicine_quantity <= 100) Citical Stock @endif </div>
                </td>
                <td class="p-2 ">
                    <div>
                        @include('pages.admin.medicine.edit-medicine')
                        @include('pages.admin.medicine.delete-medicine')
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
        <img src="{{ asset('images/empty-illustrations/empty-medicine-table.svg') }}"
            alt="There are currently no listed medicines.">
    </div>
    <div>
        <h1 class="text-center font-bold text-xl mt-8 uppercase">
            There are currently no listed medicines.
        </h1>
    </div>
</div>
@endunless