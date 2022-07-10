{{-- Table --}}
@unless ($users->isEmpty())
<div class="overflow-x-auto">
    <table class="table-auto w-full">
        {{-- table header --}}
        <thead class="text-xs uppercase text-slate-400 bg-slate-50 rounded-sm">
            <tr>
                <th class="p-2">
                    <div class="font-semibold text-left">User ID</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">User Name</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">User Role</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">Department/Year</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">Blood Type</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-left">Action</div>
                </th>
            </tr>
        </thead>
        {{-- table body --}}
        <tbody class="text-sm font-medium divide-y divide-slate-100">
            {{-- row --}}

            @foreach ($users as $user)
            <tr>
                <td class="p-2">
                    <div>{{ $user->user_patient_id }}</div>
                </td>
                <td class="p-2 ">
                    <div>{{ $user->user_patient_full_name }}</div>
                </td>
                <td class="p-2 ">
                    <div>@include('utils.user-patient-role')</div>
                </td>
                <td class="p-2 ">
                    <div>@include('utils.user-department-year')</div>
                </td>
                <td class="p-2 ">
                    {{ $user->user_patient_blood_type }}
                    @if($user->user_patient_blood_type == null )
                    Not Specified
                    @endif
                </td>
                <td class="p-2 ">
                    <a class="text-indigo-700 hover:underline cursor-pointer" href="users/{{ $user->id }}">More
                        Details</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="flex-col flex items-center justify-center">
    <div>
        <img src="{{ asset('images/empty-illustrations/empty-user-table.svg') }}"
            alt="There are currently no registered.">
    </div>
    <div>
        <h1 class="text-center font-bold text-xl mt-8 uppercase">
            There are currently no regitered users.
        </h1>
    </div>
</div>
@endunless
