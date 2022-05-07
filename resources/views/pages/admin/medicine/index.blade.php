<x-app-layout>
    <div class="col-span-full xl:col-span-6 bg-white shadow-lg rounded-sm border border-slate-200">
        <header class="px-5 py-4 border-b border-slate-100 flex justify-between items-center">
            <h2 class="font-semibold text-slate-800">Medicines</h2>
            <button
                class="px-4 py-2 font-medium text-sm inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-indigo-500 hover:bg-indigo-600 text-white">
                <svg class="w-3 h-3 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                    <path
                        d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                </svg>
                <span class="xs:block text-sm ml-2">Add medicine</span>
            </button>
        </header>
        <div class="p-3">
            {{-- Table --}}
            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    {{-- table header --}}
                    <thead class="text-xs uppercase text-slate-400 bg-slate-50 rounded-sm">
                        <tr>
                            <th class="p-2">
                                <div class="font-semibold text-left">Name</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-left">Number of availability</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-left">Type of Drugs</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-left">Sales</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-left">Conversion</div>
                            </th>
                        </tr>
                    </thead>
                    {{-- table body --}}
                    <tbody class="text-sm font-medium divide-y divide-slate-100">
                        {{-- row --}}
                        <tr>
                            <td class="p-2">
                                <div class="text-slate-800">Paracetamol</div>
                            </td>
                            <td class="p-2">
                                <div>300</div>
                            </td>
                            <td class="p-2">
                                <div>Acetaminophen</div>
                            </td>
                            <td class="p-2">
                                <div>267</div>
                            </td>
                            <td class="p-2">
                                <div>4.7%</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
