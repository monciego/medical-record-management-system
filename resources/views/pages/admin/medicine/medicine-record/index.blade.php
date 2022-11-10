<x-app-layout>
    @section('title','Students')
    <div class="col-span-full xl:col-span-6 bg-white shadow-lg rounded-sm border border-slate-200">
        <header class="px-5 py-4 border-b border-slate-100 flex justify-between items-center">
            <h2 class="font-semibold text-slate-800">Medicine Records</h2>
            <div>
                <div>
                    <a href="{{ route('export.medical-report') }}"
                        class="px-4 py-2  font-medium text-xs inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-indigo-500 hover:bg-indigo-600 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                            <path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v5m-5 6h7m-3 -3l3 3l-3 3" />
                        </svg>
                        <span class="xs:block text-xs ml-2">Export to word</span>
                    </a>
                </div>
                {{-- @include('pages.admin.reports.students.filter')
                @include('pages.admin.reports.students.print') --}}
            </div>

        </header>
        <div class="p-3">
            @include('pages.admin.medicine.medicine-record.table')
        </div>
    </div>

    <div class="mt-4">
        {{-- {{ $patients->links() }} --}}
    </div>
</x-app-layout>
