<x-app-layout>
    @section('title', isset($user) ? $user->user_patient_first_name . ' - Edit' : 'Edit User')
    <div class="px-4 py-5 sm:px-6 bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="flex-col flex md:flex-row justify-between">
            <div class="sm:pb-0 md:pb-5 ">
                <div class="flex items-center gap-2">
                    <div>
                        <h3 class="text-lg leading-6 font-medium capitalize text-gray-900">
                            Edit
                            @if ($user->user_patient_role === 'student')
                            Student
                            @elseif($user->user_patient_role === 'teaching_staff')
                            Teacher
                            @elseif($user->user_patient_role === 'non_teaching_staff')
                            Employee
                            @endif
                            Information
                    </div>
                    <div
                        class="px-4 py-1 text-xs font-medium tracking-wide bg-slate-500 text-white capitalized rounded transform">
                        @include('utils.user-patient-role')
                    </div>
                </div>
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details of
                    {{$user->user_patient_first_name }}
                    {{$user->user_patient_last_name }}
                </p>
            </div>

        </div>
        <hr>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class=" pb-5 pt-5 grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-2">
                    <label for="user_patient_role" class="block text-sm font-medium text-gray-700">Patient
                        Category</label>
                    <select onChange="update(this);" id="patient_role" name="user_patient_role"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option {{ $user->user_patient_role == 'student' ? 'selected' : '' }} id="student"
                            value="student">Student</option>
                        <option {{ $user->user_patient_role == 'teaching_staff' ? 'selected' : '' }} id="teaching_staff"
                            value="teaching_staff">Teaching Staff</option>
                        <option id="non_teaching_staff" {{ $user->user_patient_role == 'non_teaching_staff' ? 'selected'
                            : '' }}
                            value="non_teaching_staff">Non-Teaching Staff
                        </option>
                    </select>
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="user_patient_id" class="text-sm text-gray-800 mb-1 block">User ID</label>
                    <input type="text" name="user_patient_id" id="user_patient_id" :value="old('user_patient_id')"
                        value="{{$user->user_patient_id}}" class="{{($errors->first('user_patient_id') ? "
                        border-red-600" : "border-gray-300" )}} text-sm dark-text font-medium capitalize w-full border
                        border-gray-300 shadow rounded-md px-4 py-2">
                    @error('user_patient_id')
                    <div class="flex items-center gap-1 mt-1 ml-1">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="#cc0000">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                    </div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="user_patient_first_name" class="text-sm text-gray-800 mb-1 block">First name</label>
                    <input type="text" name="user_patient_first_name" id="user_patient_first_name"
                        :value="old('user_patient_first_name')" value="{{$user->user_patient_first_name}}"
                        class="{{($errors->first('user_patient_first_name') ? " border-red-600" : "border-gray-300" )}}
                        text-sm dark-text font-medium capitalize w-full border border-gray-300 shadow rounded-md px-4
                        py-2">
                    @error('user_patient_first_name')
                    <div class="flex items-center gap-1 mt-1 ml-1">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="#cc0000">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                    </div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="user_patient_middle_name" class="text-sm text-gray-800 mb-1 block">Middle name</label>
                    <input type="text" name="user_patient_middle_name" id="user_patient_middle_name"
                        :value="old('user_patient_middle_name')" value="{{$user->user_patient_middle_name}}"
                        class="{{($errors->first('user_patient_middle_name') ? " border-red-600" : "border-gray-300" )}}
                        text-sm dark-text font-medium capitalize w-full border border-gray-300 shadow rounded-md px-4
                        py-2">
                    @error('user_patient_middle_name')
                    <div class="flex items-center gap-1 mt-1 ml-1">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="#cc0000">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                    </div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="user_patient_last_name" class="text-sm text-gray-800 mb-1 block">Last name</label>
                    <input type="text" name="user_patient_last_name" id="user_patient_last_name"
                        :value="old('user_patient_last_name')" value="{{$user->user_patient_last_name}}"
                        class="{{($errors->first('user_patient_last_name') ? " border-red-600" : "border-gray-300" )}}
                        text-sm dark-text font-medium capitalize w-full border border-gray-300 shadow rounded-md px-4
                        py-2">
                    @error('user_patient_last_name')
                    <div class="flex items-center gap-1 mt-1 ml-1">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="#cc0000">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                    </div>
                    @enderror
                </div>
                {{-- <div class="col-span-6 sm:col-span-2">
                    <label for="user_patient_suffix" class="text-sm text-gray-800 mb-1 block">Suffix</label>
                    <input type="text" name="user_patient_suffix" id="user_patient_suffix"
                        :value="old('user_patient_suffix')" value="{{$user->user_patient_suffix}}"
                        class="{{($errors->first('user_patient_suffix') ? " border-red-600" : "border-gray-300" )}}
                        text-sm dark-text font-medium capitalize w-full border border-gray-300 shadow rounded-md px-4
                        py-2">
                    @error('user_patient_suffix')
                    <div class="flex items-center gap-1 mt-1 ml-1">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="#cc0000">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                    </div>
                    @enderror
                </div> --}}
                <div class="col-span-6 sm:col-span-2">
                    <label for="user_patient_suffix" class="text-sm text-gray-800 mb-1 block">Suffix</label>
                    <select id="user_patient_suffix" name="user_patient_suffix"
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                        <option {{ $user->user_patient_suffix == 'none' ? 'selected' : '' }} value="none">
                            None
                        </option>
                        <option {{ $user->user_patient_suffix == '1ST' ? 'selected' : '' }} value="1ST">
                            1ST
                        </option>
                        <option {{ $user->user_patient_suffix == '2nd' ? 'selected' : '' }} value="2nd">
                            2nd
                        </option>
                        <option {{ $user->user_patient_suffix == '3RD' ? 'selected' : '' }} value="3RD">
                            3RD
                        </option>
                        <option {{ $user->user_patient_suffix == '4TH' ? 'selected' : '' }} value="4TH">
                            4TH
                        </option>
                        <option {{ $user->user_patient_suffix == '5TH' ? 'selected' : '' }} value="5TH">
                            5TH
                        </option>
                        <option {{ $user->user_patient_suffix == '6TH' ? 'selected' : '' }} value="6TH">
                            6TH
                        </option>
                        <option {{ $user->user_patient_suffix == '7TH' ? 'selected' : '' }} value="7TH">
                            7TH
                        </option>
                        <option {{ $user->user_patient_suffix == '8TH' ? 'selected' : '' }} value="8TH">
                            8TH
                        </option>
                        <option {{ $user->user_patient_suffix == '9TH' ? 'selected' : '' }} value="9TH">
                            9TH
                        </option>
                        <option {{ $user->user_patient_suffix == 'I' ? 'selected' : '' }} value="I">
                            I
                        </option>
                        <option {{ $user->user_patient_suffix == 'II' ? 'selected' : '' }} value="1ST">
                            II
                        </option>
                        <option {{ $user->user_patient_suffix == 'II' ? 'selected' : '' }} value="II">
                            II
                        </option>
                        <option {{ $user->user_patient_suffix == 'III' ? 'selected' : '' }} value="III">
                            III
                        </option>
                        <option {{ $user->user_patient_suffix == 'IV' ? 'selected' : '' }} value="IV">
                            IV
                        </option>
                        <option {{ $user->user_patient_suffix == 'JR' ? 'selected' : '' }} value="JR">
                            JR
                        </option>
                        <option {{ $user->user_patient_suffix == 'SR' ? 'selected' : '' }} value="SR">
                            SR
                        </option>
                        <option {{ $user->user_patient_suffix == 'V' ? 'selected' : '' }} value="V">
                            V
                        </option>
                    </select>
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="user_patient_gender" class="text-sm text-gray-800 mb-1 block">Gender</label>
                    <select id="user_patient_gender" name="user_patient_gender"
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                        <option {{ $user->user_patient_gender == 'male' ? 'selected' : '' }} value="male">Male
                        </option>
                        <option {{ $user->user_patient_gender == 'female' ? 'selected' : '' }} value="female">
                            Female</option>
                    </select>
                </div>
                <div id="department_year_role" class="col-span-6 sm:col-span-2">
                    <label for="user_year_department_role" class="text-sm text-gray-800 mb-1 block" id="label">
                        @if ($user->user_patient_role === 'student')
                        Year & Section
                        @elseif($user->user_patient_role === 'teaching_staff')
                        Department
                        @elseif($user->user_patient_role === 'non_teaching_staff')
                        Role
                        @endif
                    </label>
                    <input type="text" name="user_year_department_role" id="user_year_department_role"
                        autocomplete="patient-department" value="{{ $user->user_year_department_role }}"
                        class="{{($errors->first('user_year_department_role') ? " border-red-600" : "border-gray-300"
                        )}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm
                        border-gray-300 rounded-md">
                    @error('user_year_department_role')
                    <div class="flex items-center gap-1 mt-1 ml-1">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="#cc0000">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                    </div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="user_patient_birthday" class="text-sm text-gray-800 mb-1 block">Birth Date</label>
                    <input type="date" name="user_patient_birthday" id="user_patient_birthday"
                        :value="old('user_patient_birthday')" value="{{ $user->user_patient_birthday }}"
                        class="{{($errors->first('user_patient_birthday') ? " border-red-600" : "border-gray-300" )}}
                        text-sm dark-text font-medium capitalize w-full border border-gray-300 shadow rounded-md px-4
                        py-2">
                    @error('user_patient_birthday')
                    <div class="flex items-center gap-1 mt-1 ml-1">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="#cc0000">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                    </div>
                    @enderror
                </div>
                {{-- <div class="col-span-6 sm:col-span-2">
                    <label for="user_patient_blood_type" class="text-sm text-gray-800 mb-1 block">Blood Type</label>
                    <input type="text" name="user_patient_blood_type" id="user_patient_blood_type"
                        :value="old('user_patient_blood_type')"
                        value="{{ $user->user_patient_blood_type === null ? 'Not Specified' : $user->user_patient_blood_type }}"
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-300 shadow rounded-md px-4 py-2">
                </div> --}}
                <div class="col-span-6 sm:col-span-2">
                    <label for="user_patient_blood_type" class="text-sm text-gray-800 mb-1 block">Blood Type</label>
                    <select id="user_patient_blood_type" name="user_patient_blood_type"
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                        <option {{ $user->user_patient_blood_type == 'o_negative' ? 'selected' : '' }}
                            value="o_negative">O negative
                        </option>
                        <option {{ $user->user_patient_blood_type == 'o_positive' ? 'selected' : '' }}
                            value="o_positive">
                            O positive</option>
                        <option {{ $user->user_patient_blood_type == 'a_negative' ? 'selected' : '' }}
                            value="a_negative">
                            A negative</option>
                        <option {{ $user->user_patient_blood_type == 'a_positive' ? 'selected' : '' }}
                            value="a_positive">
                            A positive</option>
                        <option {{ $user->user_patient_blood_type == 'b_negative' ? 'selected' : '' }}
                            value="b_negative">
                            B negative</option>
                        <option {{ $user->user_patient_blood_type == 'b_positive' ? 'selected' : '' }}
                            value="b_positive">
                            B positive</option>
                        <option {{ $user->user_patient_blood_type == 'ab_negative' ? 'selected' : '' }}
                            value="ab_negative">
                            AB negative</option>
                        <option {{ $user->user_patient_blood_type == 'ab_positive' ? 'selected' : '' }}
                            value="ab_positive">
                            AB positive</option>
                    </select>
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="civil_status" class="text-sm text-gray-800 mb-1 block">Civil Status</label>
                    <select id="civil_status" name="civil_status"
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                        <option {{ $user->civil_status == 'single' ? 'selected' : '' }} value="single">single
                        </option>
                        <option {{ $user->civil_status == 'married' ? 'selected' : '' }} value="married">
                            married</option>
                        <option {{ $user->civil_status == 'divorced' ? 'selected' : '' }} value="divorced">
                            divorced</option>
                        <option {{ $user->civil_status == 'widowed' ? 'selected' : '' }} value="widowed">
                            widowed</option>
                    </select>
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="nationality" class="text-sm text-gray-800 mb-1 block">Nationality</label>
                    <input type="text" name="nationality" id="nationality" :value="old('nationality')"
                        value="{{ $user->nationality === null ? 'Not Specified' : $user->nationality }}"
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-300 shadow rounded-md px-4 py-2">
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="religion" class="text-sm text-gray-800 mb-1 block">Religion</label>
                    <input type="text" name="religion" id="religion" :value="old('religion')"
                        value="{{ $user->religion === null ? 'Not Specified' : $user->religion }}"
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-300 shadow rounded-md px-4 py-2">
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="contact_person" class="text-sm text-gray-800 mb-1 block">Contact Person</label>
                    <input type="text" name="contact_person" id="contact_person" :value="old('contact_person')"
                        value="{{ $user->contact_person === null ? 'Not Specified' : $user->contact_person }}"
                        class="text-sm dark-text font-medium capitalize w-full border border-gray-300 shadow rounded-md px-4 py-2">
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <label for="patient_phone_number" class="text-sm text-gray-800 mb-1 block">Contact Number</label>
                    <input type="text" name="patient_phone_number" id="patient_phone_number"
                        :value="old('patient_phone_number')" value="{{ $user->patient_phone_number }}"
                        class="{{($errors->first('patient_phone_number') ? " border-red-600" : "border-gray-300" )}}
                        text-sm dark-text font-medium capitalize w-full border border-gray-300 shadow rounded-md px-4
                        py-2">
                    @error('patient_phone_number')
                    <div class="flex items-center gap-1 mt-1 ml-1">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="#cc0000">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                    </div>
                    @enderror
                </div>

                {{-- medical history --}}
                <div class="col-span-6">
                    <h2 class="font-medium">Medical History</h2>
                </div>

                <div class="col-span-6">
                    <label for="history_of_past_illness" class="text-sm text-gray-800 mb-1 block">History of Past
                        Illness</label>
                    <textarea name="history_of_past_illness" id="history_of_past_illness"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $user->history_of_past_illness }}</textarea>
                </div>

                <div class="col-span-6">
                    <label for="past_illness" class="text-sm text-gray-800 mb-1 block">Past Illness</label>
                    <textarea name="past_illness" id="past_illness"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $user->past_illness }}</textarea>
                </div>

                <div class="col-span-6">
                    <label for="operations_and_hospitalizations" class="text-sm text-gray-800 mb-1 block">Operations And
                        Hospitalizations</label>
                    <textarea name="operations_and_hospitalizations" id="operations_and_hospitalizations"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $user->operations_and_hospitalizations }}</textarea>
                </div>

                <div class="col-span-6">
                    <label for="immunization_history" class="text-sm text-gray-800 mb-1 block">Immunization
                        History</label>
                    <textarea name="immunization_history" id="immunization_history"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $user->immunization_history }}</textarea>
                </div>

                <div class="col-span-6">
                    <label for="social_and_environmental_history" class="text-sm text-gray-800 mb-1 block">Social and
                        Environmental History</label>
                    <textarea name="social_and_environmental_history" id="social_and_environmental_history"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $user->social_and_environmental_history }}</textarea>
                </div>

                <div class="col-span-6">
                    <label for="obstetrics_gynecological_history" class="text-sm text-gray-800 mb-1 block">Obstetrics
                        Gynecological History</label>
                    <textarea name="obstetrics_gynecological_history" id="obstetrics_gynecological_history"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $user->obstetrics_gynecological_history }}</textarea>
                </div>

                {{-- Physical Examination --}}
                <div class="col-span-6">
                    <h2 class="font-medium">Physical Examination</h2>
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="general_survey" name="general_survey" {{ $user->general_survey == true ?
                            'checked' : '' }} type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="general_survey" class="font-medium text-gray-700">General
                                Survey</label>
                        </div>
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="skin" name="skin" {{ $user->skin == true ?
                            'checked' : '' }} type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="skin" class="font-medium text-gray-700">Skin</label>
                        </div>
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="heent" name="heent" {{ $user->heent == true ?
                            'checked' : '' }} type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="heent" class="font-medium text-gray-700">Heent</label>
                        </div>
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="chest_and_lungs" name="chest_and_lungs" {{ $user->chest_and_lungs == true ?
                            'checked' : '' }} type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="chest_and_lungs" class="font-medium text-gray-700">Chest and Lungs</label>
                        </div>
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="heart" name="heart" {{ $user->heart == true ?
                            'checked' : '' }} type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="heart" class="font-medium text-gray-700">Heart</label>
                        </div>
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="abdomen" name="abdomen" {{ $user->abdomen == true ?
                            'checked' : '' }} type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="abdomen" class="font-medium text-gray-700">Abdomen</label>
                        </div>
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="genitourinary" name="genitourinary" {{ $user->genitourinary == true ?
                            'checked' : '' }}
                            type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="genitourinary" class="font-medium text-gray-700">Genitourinary</label>
                        </div>
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="musculoskeletal" name="musculoskeletal" {{ $user->musculoskeletal == true ?
                            'checked' : '' }} type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="musculoskeletal" class="font-medium text-gray-700">Musculoskeletal</label>
                        </div>
                    </div>
                </div>

                <div class="col-span-6 mt-0 sm:mt-4">
                    <label for="neurological_examination" class="text-sm text-gray-800 mb-1 block">Neurological
                        Examination</label>
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="mental_status" name="mental_status" {{ $user->mental_status == true ?
                            'checked' : '' }} type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="mental_status" class="font-medium text-gray-700">Mental Status</label>
                        </div>
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="coordination_and_balance" name="coordination_and_balance" {{
                                $user->coordination_and_balance == true ?
                            'checked' : '' }} type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="coordination_and_balance" class="font-medium text-gray-700">Coordination and
                                Balance</label>
                        </div>
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="reflexes" name="reflexes" {{ $user->reflexes == true ?
                            'checked' : '' }} type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="reflexes" class="font-medium text-gray-700">Reflexes</label>
                        </div>
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="sensation" name="sensation" {{ $user->sensation == true ?
                            'checked' : '' }} type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="sensation" class="font-medium text-gray-700">Sensation</label>
                        </div>
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="cranial_nerves" name="cranial_nerves" {{ $user->cranial_nerves == true ?
                            'checked' : '' }} type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="cranial_nerves" class="font-medium text-gray-700">Cranial Nerves</label>
                        </div>
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="autonomic_nervous_system_nerves" name="autonomic_nervous_system_nerves" {{
                                $user->autonomic_nervous_system_nerves == true ?
                            'checked' : '' }} type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="autonomic_nervous_system_nerves" class="font-medium text-gray-700">Autonomic
                                Nervous System Nerves</label>
                        </div>
                    </div>
                </div>

                <div class="col-span-6 mt-0 sm:mt-4">
                    <label for="neurological_examination" class="text-sm text-gray-800 mb-1 block">Others (Neurological
                        Examination)</label>
                    <textarea name="neurological_examination" id="neurological_examination"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $user->neurological_examination }}</textarea>
                </div>

                <div class="col-span-6">
                    <label for="laboratory_results" class="text-sm text-gray-800 block">
                        Laboratory Results
                    </label>
                </div>

                {{-- urine --}}
                <div class="col-span-6 sm:col-span-2">
                    <div class="col-span-6 sm:col-span-2">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="urine" name="urine" {{ $user->urine == true ?
                                'checked' : '' }} type="checkbox"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="urine" class="font-medium text-gray-700">Urine</label>
                            </div>
                        </div>
                    </div>
                    <label for="urine_comment" class="block text-xs font-medium text-gray-700">Comment</label>
                    <input type="text" name="urine_comment" :value="{{ old('urine_comment') }}"
                        value="{{ $user->urine_comment }}" id="urine_comment" autocomplete="urine_comment"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                {{-- stool --}}
                <div class="col-span-6 sm:col-span-2">
                    <div class="col-span-6 sm:col-span-2">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="stool" name="stool" {{ $user->stool == true ?
                                'checked' : '' }} type="checkbox"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="stool" class="font-medium text-gray-700">Stool</label>
                            </div>
                        </div>
                    </div>
                    <label for="stool_comment" class="block text-xs font-medium text-gray-700">Comment</label>
                    <input type="text" name="stool_comment" :value="{{ old('stool_comment') }}"
                        value="{{ $user->stool_comment }}" id="stool_comment" autocomplete="stool_comment"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                {{-- saliva --}}
                <div class="col-span-6 sm:col-span-2">
                    <div class="col-span-6 sm:col-span-2">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="saliva" name="saliva" {{ $user->saliva == true ?
                                'checked' : '' }} type="checkbox"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="saliva" class="font-medium text-gray-700">Saliva</label>
                            </div>
                        </div>
                    </div>
                    <label for="saliva_comment" class="block text-xs font-medium text-gray-700">Comment</label>
                    <input type="text" name="saliva_comment" :value="{{ old('saliva_comment') }}"
                        value="{{ $user->saliva_comment }}" id="saliva_comment" autocomplete="saliva_comment"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                {{-- sputum --}}
                <div class="col-span-6 sm:col-span-2">
                    <div class="col-span-6 sm:col-span-2">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="sputum" name="sputum" {{ $user->sputum == true ?
                                'checked' : '' }} type="checkbox"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="sputum" class="font-medium text-gray-700">Sputum</label>
                            </div>
                        </div>
                    </div>
                    <label for="sputum_comment" class="block text-xs font-medium text-gray-700">Comment</label>
                    <input type="text" name="sputum_comment" :value="{{ old('sputum_comment') }}"
                        value="{{ $user->sputum_comment }}" id="sputum_comment" autocomplete="sputum_comment"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                {{-- complete_blood_count --}}
                <div class="col-span-6 sm:col-span-2">
                    <div class="col-span-6 sm:col-span-2">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="complete_blood_count" name="complete_blood_count" {{
                                    $user->complete_blood_count == true ?
                                'checked' : '' }} type="checkbox"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="complete_blood_count" class="font-medium text-gray-700">Complete Blood
                                    Count</label>
                            </div>
                        </div>
                    </div>
                    <label for="complete_blood_count_comment"
                        class="block text-xs font-medium text-gray-700">Comment</label>
                    <input type="text" name="complete_blood_count_comment"
                        :value="{{ old('complete_blood_count_comment') }}"
                        value="{{ $user->complete_blood_count_comment }}" id="complete_blood_count_comment"
                        autocomplete="complete_blood_count_comment"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                {{-- x_ray --}}
                <div class="col-span-6 sm:col-span-2">
                    <div class="col-span-6 sm:col-span-2">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="x_ray" name="x_ray" {{ $user->x_ray == true ?
                                'checked' : '' }} type="checkbox"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="x_ray" class="font-medium text-gray-700">X-ray</label>
                            </div>
                        </div>
                    </div>
                    <label for="x_ray_comment" class="block text-xs font-medium text-gray-700">Comment</label>
                    <input type="text" name="x_ray_comment" :value="{{ old('x_ray_comment') }}"
                        value="{{ $user->x_ray_comment }}" id="x_ray_comment" autocomplete="x_ray_comment"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                {{-- others --}}
                <div class="col-span-6">
                    <label for="laboratory_results" class="text-sm text-gray-800 mb-1 block">
                        Others (Laboratory Results)</label>
                    <textarea name="laboratory_results" id="laboratory_results"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $user->laboratory_results }}</textarea>
                </div>

                <div class="col-span-6">
                    <label for="assestment" class="text-sm text-gray-800 mb-1 block">Assestment</label>
                    <textarea name="assestment" id="assestment"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $user->assestment }}</textarea>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <input type="text" name="university_physician" id="university_physician"
                        :value="old('university_physician')" value="{{$user->university_physician}}"
                        class="{{($errors->first('university_physician') ? " border-red-600" : "border-gray-300" )}}
                        text-sm dark-text font-medium capitalize w-full border border-gray-300 shadow rounded-md px-4
                        py-2">
                    <label for="university_physician" class="text-sm text-gray-800 mt-1 mx-4 block">University
                        Physician</label>
                    @error('university_physician')
                    <div class="flex items-center gap-1 mt-1 ml-1">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="#cc0000">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent border-gray-300 shadow text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save
                    Changes</button>
            </div>
    </div>
    </form>
</x-app-layout>

<script>
    // This script tells what to do if you select a patient role
    // will hide some inputs or enable inputs
    const student = document.getElementById("student").value;
    const teaching_staff = document.getElementById("teaching_staff").value;
    const non_teaching_staff = document.getElementById("non_teaching_staff").value;
    const label = document.getElementById("label");

    function update(that) {
        if (that) {
            if (teaching_staff === that.value) {
                label.textContent = "Department";
            } else if (student === that.value) {
                label.textContent = "Year & Section";
            } else if (non_teaching_staff === that.value) {
                label.textContent = "Role";
            }
        }
    }
</script>
