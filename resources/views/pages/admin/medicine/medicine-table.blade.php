{{-- Table --}}
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
                    <div class="font-semibold text-left">Action</div>
                </th>
            </tr>
        </thead>
        {{-- table body --}}
        <tbody class="text-sm font-medium divide-y divide-slate-100">
            {{-- row --}}
            @unless ($medicines->isEmpty())
            @foreach ($medicines as $medicine)
            <tr>
                <td class="p-2">
                    <div class="text-slate-800">{{ $medicine->medicine_name }}</div>
                </td>
                <td class="p-2 ">
                    <div>{{ $medicine->medicine_quantity }}</div>
                </td>
                <td class="p-2 ">
                    <div>{{ $medicine->medicine_cost }}</div>
                </td>
                <td class="p-2 ">
                    <div>{{ $medicine->date_of_acquisition }}</div>
                </td>
                <td class="p-2 ">
                    <div>
                        <a href=""
                            class="inline-flex items-center gap-1 bg-indigo-500 hover:bg-indigo-600 text-white p-1 px-5 rounded">
                            <svg class="h-4 w-4" viewBox="0 0 16 16" fill="#f6f6f6">
                                <path
                                    d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z">
                                </path>
                            </svg>
                            Edit
                        </a>
                        <a href=""
                            class="inline-flex items-center gap-1 bg-red-500 hover:bg-red-600 text-white p-1 px-5 rounded">
                            <svg class="h-4 w-4 " viewBox="0 0 16 16" fill="#f5f5f5">
                                <path
                                    d="M5 7h2v6H5V7zm4 0h2v6H9V7zm3-6v2h4v2h-1v10c0 .6-.4 1-1 1H2c-.6 0-1-.4-1-1V5H0V3h4V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1zM6 2v1h4V2H6zm7 3H3v9h10V5z">
                                </path>
                            </svg>
                            Delete
                        </a>
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
