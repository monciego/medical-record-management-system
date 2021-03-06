<x-app-layout>
    @section('title','Medicines')
    <div class="col-span-full xl:col-span-6 bg-white shadow-lg rounded-sm border border-slate-200">
        <header class="px-5 py-4 border-b border-slate-100 flex justify-between items-center">
            <h2 class="font-semibold text-slate-800">Medicines</h2>
            @include('pages.admin.medicine.create-medicine')
        </header>
        <div class="p-3">
            @include('pages.admin.medicine.medicine-table')
        </div>
    </div>

    <div class="mt-4">
        {{ $medicines->links() }}
    </div>

</x-app-layout>
