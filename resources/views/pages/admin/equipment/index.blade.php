<x-app-layout>
    <div class="col-span-full xl:col-span-6 bg-white shadow-lg rounded-sm border border-slate-200">
        <header class="px-5 py-4 border-b border-slate-100 flex justify-between items-center">
            <h2 class="font-semibold text-slate-800">Equipment</h2>
            @include('pages.admin.equipment.create-equipment')
        </header>
        <div class="p-3">
            @include('pages.admin.equipment.equipment-table')
        </div>
    </div>

    <div class="mt-4">
        {{ $equipments->links() }}
    </div>

</x-app-layout>
