{{-- Table --}}
{{-- @unless ($users->isEmpty()) --}}
<div class="overflow-x-auto">
    <table class="table-auto w-full">
        {{-- table header --}}
        <thead class="text-xs uppercase text-slate-400 bg-slate-50 rounded-sm">
            <tr>
                <th class="p-2">
                    <div class="font-semibold text-left">User ID</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">Name</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">Role</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">Department/Year</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">Purpose</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">Action</div>
                </th>
            </tr>
        </thead>
        {{-- table body --}}
        <tbody class="text-sm font-medium divide-y divide-slate-100">
            {{-- row --}}

            @foreach ($examine_records as $examine_record)
            <tr>
                <td class="p-2">
                    <div>{{ $examine_record->user_patient_id }}</div>
                </td>
                <td class="p-2 ">
                    <div>{{ $examine_record->user_patient_full_name }}</div>
                </td>
                <td class="p-2 ">
                    <div>
                        @if($examine_record->user_patient_role == 'teaching_staff')
                        Teaching Staff
                        @elseif($examine_record->user_patient_role == 'non_teaching_staff')
                        Non-Teaching Staff
                        @elseif($examine_record->user_patient_role == 'student')
                        Student
                        @endif

                    </div>
                </td>
                <td class="p-2 ">
                    <div>{{ $examine_record->user_year_department_role }}</div>
                </td>
                <td class="p-2 ">
                    <div>
                        @if($examine_record->examination_reports->pre_employment === 1)
                        Pre-Employment
                        @elseif($examine_record->examination_reports->annual === 1)
                        Annual
                        @elseif($examine_record->examination_reports->ojt === 1)
                        OJT
                        @endif

                </td>
                <td class="p-2 ">
                    <a class="text-indigo-700 hover:underline cursor-pointer" href="">
                        View
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{-- @else --}}
{{-- <div class="flex-col flex items-center justify-center">
    <div>
        <img src="{{ asset('images/empty-illustrations/empty-examination-report.svg') }}"
            alt="There are currently no registered.">
    </div>
    <div>
        <h1 class="text-center font-bold text-xl mt-8 uppercase">
            There are currently medical examination reports.
        </h1>
    </div>
</div> --}}
{{-- @endunless --}}
