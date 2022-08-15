<x-app-layout>
    @section('title','Medical Examination Report')
    <div class="col-span-full xl:col-span-6 bg-white shadow-lg rounded-sm border border-slate-200">
        <header class="px-5 py-4 border-b border-slate-100 flex justify-between items-center">
            <h2 class="font-semibold text-slate-800">Medical Examination Report</h2>
        </header>
        <div class="p-3">
            @include('pages.admin.medical-examination-report.table')
        </div>
    </div>
    <div class="mt-4">
        {{-- {{ $users->links() }} --}}
    </div>
</x-app-layout>
