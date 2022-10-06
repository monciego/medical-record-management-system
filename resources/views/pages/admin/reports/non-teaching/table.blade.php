{{-- Table --}}
@unless ($non_teaching_records->isEmpty())
<div class="overflow-x-auto">
    <table class="table-auto w-full">
        {{-- table header --}}
        <thead class="text-xs uppercase text-slate-400 bg-slate-50 rounded-sm">
            <tr>
                <th class="p-2">
                    <div class="font-semibold text-left">Name of Patient</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">Course/Yr. & Sec</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">Complaints</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">Diagnosis</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">Medicines Given</div>
                </th>
            </tr>
        </thead>
        {{-- table body --}}
        <tbody class="text-sm font-medium divide-y divide-slate-100">
            {{-- row --}}

            @foreach ($non_teaching_records as $non_teaching_record)
            <tr>
                <td class="p-2">
                    {{ $non_teaching_record->user_data->user_patient_full_name }}
                </td>
                <td class="p-2 ">
                    {{ $non_teaching_record->user_data->user_year_department_role }}
                </td>
                <td class="p-2 ">
                    {{ $non_teaching_record->complaints }}
                </td>
                <td class="p-2 ">
                    {{ $non_teaching_record->diagnosis }}
                </td>
                <td class="p-2 ">
                    @foreach(explode('|', $non_teaching_record->patient_prescribed_medicine) as $medicine)
                    <p class="block">{{$medicine}}</p>
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="flex-col flex items-center justify-center">
    <div>
        <img src="{{ asset('images/empty-illustrations/empty-patient-table.svg') }}"
            alt="There are currently no listed student records.">
    </div>
    <div>
        <h1 class="text-center font-bold text-xl mt-8 uppercase">
            There are currently no listed student records
        </h1>
    </div>
</div>
@endunless
