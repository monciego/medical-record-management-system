<x-app-layout>
    @section('title','Teachers Records')
    <div class="col-span-full xl:col-span-6 bg-white shadow-lg rounded-sm border border-slate-200">
        <header class="px-5 py-4 border-b border-slate-100 flex justify-between items-center">
            <h2 class="font-semibold text-slate-800">Teachers Records</h2>
            <div>
                @include('pages.admin.reports.teaching.filter')
                @include('pages.admin.reports.teaching.print')
            </div>
        </header>
        <div class="p-3">
            @include('pages.admin.reports.teaching.table')
        </div>
    </div>

    <div class="mt-4">
        {{-- {{ $patients->links() }} --}}
    </div>
</x-app-layout>
