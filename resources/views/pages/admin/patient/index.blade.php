<x-app-layout>
    <div class="col-span-full xl:col-span-6 bg-white shadow-lg rounded-sm border border-slate-200">
        <header class="px-5 py-4 border-b border-slate-100 flex justify-between items-center">
            <h2 class="font-semibold text-slate-800">Patients</h2>
            @include('pages.admin.patient.create-patient')
        </header>
        <div class="p-3">
            @include('pages.admin.patient.patient-table')
        </div>
    </div>
</x-app-layout>
