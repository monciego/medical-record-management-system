<x-app-layout>
    @section('title','Reports')
    <header class="px-5 py-4 border-b border-slate-100 flex justify-between items-center">
        <h2 class="font-semibold text-slate-800">Daily Treatment Record Report</h2>
    </header>
    <div class="p-3 flex flex-wrap md:flex-nowrap gap-2">
        <div class="w-full block p-6 rounded-lg shadow-lg bg-white">
            <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">Student</h5>
            <p class="text-gray-700 text-base mb-4">
                Daily Treatment Record of students.
            </p>
            <a href="{{ route('report.students') }}"
                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                View Records
            </a>
        </div>
        <div class="w-full block p-6 rounded-lg shadow-lg bg-white">
            <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">Teaching</h5>
            <p class="text-gray-700 text-base mb-4">
                Daily Treatment Record of teaching staffs.
            </p>
            <a href="{{ route('report.teaching') }}"
                class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                View Records
            </a>
        </div>
        <div class="w-full block p-6 rounded-lg shadow-lg bg-white">
            <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">Non-Teaching</h5>
            <p class="text-gray-700 text-base mb-4">
                Daily Treatment Record of non-teaching staffs.
            </p>
            <a href="{{ route('report.non_teaching') }}"
                class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                View Records
            </a>
        </div>
    </div>
</x-app-layout>
