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
                    <div class="font-semibold text-left">No. of Medicines Given</div>
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

            <!-- This code stores the data from the database table 'patients' into a dictionary -->
            @php
            $medicineQuantities = [
            'students' => 0,
            'faculty' => 0,
            'staff' => 0,
            ];
            $medicines = [];
            $totalStudents = 0;
            $totalFaculty = 0;
            $totalStaff = 0;
            $totalMedicineQuantity = 0;

            foreach ($datas as $data) {
            $prescribedMedicines = explode('|', $data->patient_prescribed_medicine);
            $prescribedQuantities = explode('|', $data->patient_prescribed_medicine_quantity);
            $role = $data->user_data->user_patient_role;

            foreach ($prescribedMedicines as $index => $medicine) {
            $quantity = (int)$prescribedQuantities[$index];

            if ($quantity == 0) {
            continue; // skip adding quantity if it's 0
            }

            if (!array_key_exists($medicine, $medicines)) {
            $medicines[$medicine] = [
            'quantity' => 0,
            'students' => 0,
            'faculty' => 0,
            'staff' => 0,
            ];
            }

            $medicines[$medicine]['quantity'] += $quantity;


            if ($role === 'student') {
            $medicines[$medicine]['students'] += 1;
            $totalStudents += 1;
            } elseif ($role === 'teaching_staff') {
            $medicines[$medicine]['faculty'] += 1;
            $totalFaculty += 1;
            } elseif ($role === 'non_teaching_staff') {
            $medicines[$medicine]['staff'] += 1;
            $totalStaff += 1;
            }
            }
            }

            foreach ($medicines as $medicine) {
            $totalMedicineQuantity += $medicine['quantity'];
            }
            @endphp


            <!-- table body -->
            @foreach ($medicines as $medicine => $values)
            <tr>
                <td>{{ $medicine }}</td>
                <td>{{ $values['quantity'] }}</td>
                <td>{{ $values['students'] }}</td>
                <td>{{ $values['faculty'] }}</td>
                <td>{{ $values['staff'] }}</td>
            </tr>
            @endforeach

            <tr class="bg-slate-500 text-white">
                <td class="p-2 font-medium">
                    TOTAL
                </td>
                <td class="p-2 font-medium">
                    {{ $totalMedicineQuantity }}
                </td>
                <td>
                    {{$totalStudents }}
                </td>
                <td class="p-2 font-medium">
                    {{ $totalFaculty}}
                </td>
                <td class="p-2 font-medium">
                    {{$totalStaff}}
                </td>
                <td></td>
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