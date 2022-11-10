{{-- Table --}}
{{-- @unless ($datas->isEmpty()) --}}
<div class="overflow-x-auto">
    <table class="table-auto w-full">
        {{-- table header --}}
        <thead class="text-xs uppercase text-slate-400 bg-slate-50 rounded-sm">
            <tr>
                <th class="p-2">
                    <div class="font-semibold text-left">Medicines Given or Distributed</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">No. of Students</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">No. of Faculty</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">No. of Staff</div>
                </th>
            </tr>
        </thead>
        {{-- table body --}}
        <tbody class="text-sm font-medium divide-y divide-slate-100 ">
            {{-- row --}}
            {{-- {{ $value }} --}}
            @foreach ($datas as $data)
            <tr>
                <td class="p-2">
                    <div class="ml-2 flex gap-2">
                        <div>
                            @foreach(explode('|', $data->patient_prescribed_medicine_quantity) as $medicine_quantity)
                            <li>{{ number_format($medicine_quantity) }}</li>
                            @endforeach
                        </div>
                        <div>
                            @foreach(explode('|', $data->patient_prescribed_medicine) as $medicine)
                            <p class="block">{{$medicine}}</p>
                            @endforeach
                        </div>
                    </div>
                </td>
                <td class="p-2">
                    @if ($data->user_data->user_patient_role === 'student')
                    1
                    @else
                    0
                    @endif
                </td>
                <td class="p-2 ">
                    @if ($data->user_data->user_patient_role === 'teaching_staff')
                    1
                    @else
                    0
                    @endif
                    {{-- {{ $student_record->complaints }} --}}
                </td>
                <td class="p-2 ">
                    @if ($data->user_data->user_patient_role === 'non_teaching_staff')
                    1
                    @else
                    0
                    @endif
                </td>
            </tr>
            @endforeach
            <tr class="bg-slate-500 text-white">
                <td class="p-2 font-medium">
                    No. Medicines Given
                </td>
                <td class="p-2 font-medium">
                    {{ $student }}
                </td>
                <td class="p-2 font-medium">
                    {{ $total_teaching_staff }}
                </td>
                <td class="p-2 font-medium">
                    {{ $staff }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
{{-- @else
<div class="flex-col flex items-center justify-center">
    <div>
        <img src="{{ asset('images/empty-illustrations/empty-patient-table.svg') }}"
            alt="There are currently no listed medicine records.">
    </div>
    <div>
        <h1 class="text-center font-bold text-xl mt-8 uppercase">
            There are currently no listed medicine records
        </h1>
    </div>
</div>
@endunless --}}
