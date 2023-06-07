<x-app-layout>
    @section('title','Medicines')
    <div class="col-span-full xl:col-span-6 bg-white shadow-lg rounded-sm border border-slate-200">
        <header class="px-5 py-4 border-b border-slate-100 flex justify-between items-center">
            <h2 class="font-semibold text-slate-800">Medicines</h2>
            <div>
                @include('pages.admin.medicine.create-medicine')
                <a href="{{ route('medicine-record.index') }}"
                    class="px-4 py-2 font-medium text-sm inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-green-500 hover:bg-green-600 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-3 h-3">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    <span class="xs:block text-sm ml-2">Medicine Records</span>
                </a>
                <a href="{{ route('preview.medicine') }}"
                    class="px-4 py-2 font-medium text-sm inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-green-500 hover:bg-green-600 text-white">
                    <span class="xs:block text-sm ml-2">Preview</span>
                </a>
            </div>
        </header>
        <div class="p-3">
            @include('pages.admin.medicine.medicine-table')
        </div>
    </div>

    <div class="mt-4">
        {{ $medicines->links() }}
    </div>

</x-app-layout>