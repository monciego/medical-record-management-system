<x-app-layout>
    @section('title','Treatment Records')
    <div class="col-span-full xl:col-span-6 bg-white shadow-lg rounded-sm border border-slate-200">
        <header class="px-5 py-4 border-b border-slate-100 flex justify-between items-center">
            <h2 class="font-semibold text-slate-800">Treatment Records</h2>
            <div>
                @include('pages.admin.treatment-record.filter')
                @include('pages.admin.treatment-record.filter-clinic')
            </div>
        </header>
        <div class="p-3">
            @include('pages.admin.treatment-record.table')
        </div>
    </div>

    <div class="mt-4">
        {{ $patients->links() }}
    </div>
</x-app-layout>
