<x-app-layout>
    @section('title','Non-Teaching Staff')
    <div class="col-span-full xl:col-span-6 bg-white shadow-lg rounded-sm border border-slate-200">
        <header class="px-5 py-4 border-b border-slate-100 flex justify-between items-center">
            <h2 class="font-semibold text-slate-800">Non-Teaching Staff Records</h2>
            <div>
                @include('pages.admin.reports.non-teaching.filter')
                @include('pages.admin.reports.non-teaching.print')
                {{-- <p>
                    @foreach ($school_years as $school_year)
                <p>{{ $school_year->school_year }}</p>
                <li>First Semester</li>
                <li>Second Semester</li>
                <li>Third Semester</li>
                @endforeach
                --}}
            </div>

        </header>
        <div class="p-3">
            @include('pages.admin.reports.non-teaching.table')
        </div>
    </div>

    <div class="mt-4">
        {{-- {{ $patients->links() }} --}}
    </div>
</x-app-layout>
