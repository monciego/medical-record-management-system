<x-app-layout>
    @section('title','Medical Record')
    <div class="sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:mt-0 md:col-span-6">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                {{-- Patient Category --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="user_patient_role" class="block text-sm font-medium text-gray-700">
                                        Patient Category</label>
                                    <select onChange="update(this);" id="patient_role" name="user_patient_role"
                                        autocomplete="patient-role" class="{{($errors->first('user_patient_role') ? "
                                        border-red-600" : "border-gray-300" )}} mt-1 block w-full py-2 px-3 border
                                        border-gray-300 bg-white rounded-md shadow-sm focus:outline-none
                                        focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option selected disabled hidden>Patient Category</option>
                                        <option {{ old('user_patient_role')==='student' ? 'selected' : '' }}
                                            id="student" value="student">Student</option>
                                        <option {{ old('user_patient_role')==='teaching_staff' ? 'selected' : '' }}
                                            id="teaching_staff" value="teaching_staff">Teaching</option>
                                        <option {{ old('user_patient_role')==='non_teaching_staff' ? 'selected' : '' }}
                                            id="non_teaching_staff" value="non_teaching_staff">Non-Teaching Staff
                                        </option>
                                    </select>
                                    @error('user_patient_role')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                {{-- Patient ID --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="user_patient_id" class="block text-sm font-medium text-gray-700">
                                        ID</label>
                                    <input type="text" disabled name="user_patient_id" id="user_patient_id"
                                        autocomplete="patient-id" value="{{ old('user_patient_id') }}"
                                        class="{{($errors->first('user_patient_id') ? " border-red-600"
                                        : "border-gray-300" )}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block
                                        w-full shadow-sm sm:text-sm rounded-md inputs cursor-no-drop">
                                    @error('user_patient_id')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>


                                {{-- Patient first name --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="user_patient_first_name"
                                        class="block text-sm font-medium text-gray-700">First
                                        Name</label>
                                    <input type="text" disabled name="user_patient_first_name"
                                        id="user_patient_first_name" autocomplete="first-name"
                                        value="{{ old('user_patient_first_name') }}"
                                        class="{{($errors->first('user_patient_first_name') ? " border-red-600"
                                        : "border-gray-300" )}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block
                                        w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                    @error('user_patient_first_name')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                {{-- Patient middle name --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="user_patient_middle_name"
                                        class="block text-sm font-medium text-gray-700">Middle
                                        Name</label>
                                    <input type="text" disabled name="user_patient_middle_name"
                                        id="user_patient_middle_name" autocomplete="middle-name"
                                        value="{{ old('user_patient_middle_name') }}"
                                        class="{{($errors->first('user_patient_middle_name') ? " border-red-600"
                                        : "border-gray-300" )}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block
                                        w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                    @error('user_patient_middle_name')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                {{-- Patient last name --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="user_patient_last_name"
                                        class="block text-sm font-medium text-gray-700">Last
                                        Name</label>
                                    <input type="text" disabled name="user_patient_last_name"
                                        id="user_patient_last_name" autocomplete="last-name"
                                        value="{{ old('user_patient_last_name') }}"
                                        class="{{($errors->first('user_patient_last_name') ? " border-red-600"
                                        : "border-gray-300" )}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block
                                        w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                    @error('user_patient_last_name')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                {{-- Patient suffix --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="user_patient_suffix"
                                        class="block text-sm font-medium text-gray-700">Suffix</label>
                                    <select id="user_patient_suffix" disabled name="user_patient_suffix"
                                        autocomplete="suffix" class="{{($errors->first('user_patient_suffix') ? "
                                        border-red-600" : "border-gray-300" )}} mt-1 block w-full py-2 px-3 border
                                        border-gray-300 bg-white rounded-md shadow-sm focus:outline-none
                                        focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm inputs cursor-no-drop">
                                        <option selected disabled hidden>Select</option>
                                        <option {{ old('none')=='none' ? ' selected' : '' }} value="none">
                                            None
                                        </option>
                                        <option {{ old('1ST')=='1ST' ? 'selected' : '' }} value="1ST">
                                            1ST
                                        </option>
                                        <option {{ old('user_patient_suffix')=='2nd' ? 'selected' : '' }} value="2nd">
                                            2nd
                                        </option>
                                        <option {{ old('user_patient_suffix')=='3RD' ? 'selected' : '' }} value="3RD">
                                            3RD
                                        </option>
                                        <option {{ old('user_patient_suffix')=='4TH' ? 'selected' : '' }} value="4TH">
                                            4TH
                                        </option>
                                        <option {{ old('user_patient_suffix')=='5TH' ? 'selected' : '' }} value="5TH">
                                            5TH
                                        </option>
                                        <option {{ old('user_patient_suffix')=='6TH' ? 'selected' : '' }} value="6TH">
                                            6TH
                                        </option>
                                        <option {{ old('user_patient_suffix')=='7TH' ? 'selected' : '' }} value="7TH">
                                            7TH
                                        </option>
                                        <option {{ old('user_patient_suffix')=='8TH' ? 'selected' : '' }} value="8TH">
                                            8TH
                                        </option>
                                        <option {{ old('user_patient_suffix')=='9TH' ? 'selected' : '' }} value="9TH">
                                            9TH
                                        </option>
                                        <option {{ old('user_patient_suffix')=='I' ? 'selected' : '' }} value="I">
                                            I
                                        </option>
                                        <option {{ old('user_patient_suffix')=='II' ? 'selected' : '' }} value="II">
                                            II
                                        </option>
                                        <option {{ old('user_patient_suffix')=='III' ? 'selected' : '' }} value="III">
                                            III
                                        </option>
                                        <option {{ old('user_patient_suffix')=='IV' ? 'selected' : '' }} value="IV">
                                            IV
                                        </option>
                                        <option {{ old('user_patient_suffix')=='JR' ? 'selected' : '' }} value="JR">
                                            JR
                                        </option>
                                        <option {{ old('user_patient_suffix')=='SR' ? 'selected' : '' }} value="SR">
                                            SR
                                        </option>
                                        <option {{ old('user_patient_suffix')=='V' ? 'selected' : '' }} value="V">
                                            V
                                        </option>
                                    </select>
                                    @error('user_patient_suffix')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
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
                                    <label for="user_patient_suffix"
                                        class="block text-sm font-medium text-gray-700">Suffix</label>
                                    <input type="text" disabled name="user_patient_suffix" id="user_patient_suffix"
                                        autocomplete="suffix" value="{{ old('user_patient_suffix') }}"
                                        class="{{($errors->first('user_patient_suffix') ? " border-red-600"
                                        : "border-gray-300" )}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block
                                        w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                    @error('user_patient_suffix')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div> --}}

                                {{-- Patient Department/Year/Role --}}
                                <div id="department_year_role"
                                    class="col-span-6 sm:col-span-2  {{($errors->first('user_year_department_role') ? "
                                    border-red-400 block" : "border-gray-300" )}}">
                                    <label id="label" for="user_year_department_role"
                                        class="block text-sm font-medium text-gray-700">
                                    </label>
                                    <input value="{{ old('user_year_department_role') }}" type="text" disabled
                                        name="user_year_department_role" id="user_year_department_role"
                                        autocomplete="patient-department-year-role"
                                        class="{{($errors->first('user_year_department_role') ? " border-red-600"
                                        : "border-gray-300" )}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block
                                        w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                    @error('user_year_department_role')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                {{-- Patient Gender --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="user_patient_gender" class="block text-sm font-medium
                                        text-gray-700">Gender</label>
                                    <select id="user_patient_gender" disabled name="user_patient_gender"
                                        autocomplete="gender" class="{{($errors->first('user_patient_gender') ? "
                                        border-red-600" : "border-gray-300" )}} mt-1 block w-full py-2 px-3 border
                                        border-gray-300 bg-white rounded-md shadow-sm focus:outline-none
                                        focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm inputs cursor-no-drop">
                                        <option selected disabled hidden>Gender</option>
                                        <option {{ old('user_patient_gender')=='male' ? 'selected' : '' }} value="male">
                                            Male</option>
                                        <option {{ old('user_patient_gender')=='female' ? 'selected' : '' }}
                                            value="female">Female
                                        </option>
                                    </select>
                                    @error('user_patient_gender')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                {{-- Patient Birthday --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="user_patient_birthday"
                                        class="block text-sm font-medium text-gray-700 ">Birth Date
                                    </label>
                                    <input type="date" disabled name="user_patient_birthday" id="user_patient_birthday"
                                        autocomplete="patient-birthday" value="{{ old('user_patient_birthday') }}"
                                        class="{{($errors->first('user_patient_birthday') ? " border-red-600"
                                        : "border-gray-300" )}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block
                                        w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                    @error('user_patient_birthday')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                {{-- Patient Blood Type --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="user_patient_blood_type"
                                        class="block text-sm font-medium text-gray-700">Blood Type</label>
                                    <select id="user_patient_blood_type" disabled name="user_patient_blood_type"
                                        autocomplete="blood-type"
                                        class="{{($errors->first('user_patient_blood_type') ? " border-red-600"
                                        : "border-gray-300" )}} mt-1 block w-full py-2 px-3 border border-gray-300
                                        bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500
                                        focus:border-indigo-500 sm:text-sm inputs capitalize cursor-no-drop">
                                        <option selected disabled hidden>Blood Type</option>
                                        <option class="capitalize" old('user_patient_blood_type')=='o_negative'
                                            ? 'selected' : '' }} value="o_negative">
                                            O-
                                        </option>
                                        <option class="capitalize" old('user_patient_blood_type')=='o_positive'
                                            ? 'selected' : '' }} value="o_positive">
                                            O+
                                        </option>
                                        <option class="capitalize" old('user_patient_blood_type')=='a_negative'
                                            ? 'selected' : '' }} value="a_negative">
                                            A-
                                        </option>
                                        <option class="capitalize" old('user_patient_blood_type')=='a_positive'
                                            ? 'selected' : '' }} value="a_positive">
                                            A+
                                        </option>
                                        <option class="capitalize" old('user_patient_blood_type')=='b_negative'
                                            ? 'selected' : '' }} value="b_negative">
                                            B-
                                        </option>
                                        <option class="capitalize" old('user_patient_blood_type')=='b_positive'
                                            ? 'selected' : '' }} value="b_positive">
                                            B+
                                        </option>
                                        <option class="capitalize" old('user_patient_blood_type')=='ab_negative'
                                            ? 'selected' : '' }} value="ab_negative">
                                            AB-
                                        </option>
                                        <option class="capitalize" old('user_patient_blood_type')=='ab_positive'
                                            ? 'selected' : '' }} value="ab_positive">
                                            AB+
                                        </option>
                                    </select>
                                    @error('user_patient_blood_type')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
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
                                    <label for="user_patient_blood_type	"
                                        class="block text-sm font-medium text-gray-700">Blood Type
                                    </label>
                                    <input type="text" disabled name="user_patient_blood_type"
                                        value="{{ old('user_patient_blood_type') }}" id="user_patient_blood_type"
                                        autocomplete="patient-blood-type"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                </div> --}}

                                {{-- Civil status --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="civil_status" class="block text-sm font-medium text-gray-700">Civil
                                        Status</label>
                                    <select id="civil_status" disabled name="civil_status" autocomplete="civil-status"
                                        class="{{($errors->first('civil_status') ? " border-red-600" : "border-gray-300"
                                        )}} mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md
                                        shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                                        sm:text-sm inputs capitalize cursor-no-drop">
                                        <option selected disabled hidden>Civil Status</option>
                                        <option class="capitalize" old('civil_status')=='single' ? 'selected' : '' }}
                                            value="single">
                                            SINGLE</option>
                                        <option class="capitalize" old('civil_status')=='married' ? 'selected' : '' }}
                                            value="married">
                                            MARRIED
                                        </option>
                                        <option class="capitalize" old('civil_status')=='divorced' ? 'selected' : '' }}
                                            value="divorced">
                                            DIVORCED
                                        </option>
                                        <option class="capitalize" old('civil_status')=='widowed' ? 'selected' : '' }}
                                            value="widowed">
                                            WIDOWED
                                        </option>
                                    </select>
                                    @error('civil_status')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                {{-- Nationality --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="nationality"
                                        class="block text-sm font-medium text-gray-700">Nationality</label>
                                    <input type="text" disabled name="nationality" id="nationality"
                                        autocomplete="nationality" value="{{ old('nationality') }}"
                                        class="{{($errors->first('nationality') ? " border-red-600" : "border-gray-300"
                                        )}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm
                                        sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                    @error('nationality')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                {{-- Religion --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="religion"
                                        class="block text-sm font-medium text-gray-700">Religion</label>
                                    <input type="text" disabled name="religion" id="religion" autocomplete="religion"
                                        value="{{ old('religion') }}" class="{{($errors->first('religion') ? "
                                        border-red-600" : "border-gray-300" )}} mt-1 focus:ring-indigo-500
                                        focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300
                                        rounded-md inputs cursor-no-drop">
                                    @error('religion')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                {{-- Contact Person --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="contact_person" class="block text-sm font-medium text-gray-700">Contact
                                        Person</label>
                                    <input type="text" disabled name="contact_person" id="contact_person"
                                        autocomplete="contact-person" value="{{ old('contact_person') }}"
                                        class="{{($errors->first('contact_person') ? " border-red-600"
                                        : "border-gray-300" )}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block
                                        w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                    @error('contact_person')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                {{-- Patient Phone Number --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="patient_phone_number"
                                        class="block text-sm font-medium text-gray-700">Contact
                                        Number</label>
                                    <input type="number" disabled name="patient_phone_number" id="contact-number"
                                        autocomplete="contact-number" value="{{ old('patient_phone_number') }}"
                                        class="{{($errors->first('patient_phone_number') ? " border-red-600"
                                        : "border-gray-300" )}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block
                                        w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                    @error('patient_phone_number')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                {{-- Patient height --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="user_patient_height" class="block text-sm font-medium text-gray-700">
                                        Height (meters)
                                    </label>
                                    <input type="text" disabled name="user_patient_height" id="patient-height"
                                        autocomplete="patient-height" value="{{ old('user_patient_height') }}"
                                        class="{{($errors->first('user_patient_height') ? " border-red-600"
                                        : "border-gray-300" )}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block
                                        w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                    @error('user_patient_height')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                {{-- Patient weight --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="user_patient_weight" class="block text-sm font-medium text-gray-700">
                                        Weight (kilograms)
                                    </label>
                                    <input type="text" disabled name="user_patient_weight" id="patient-weight"
                                        autocomplete="patient-weight" value="{{ old('user_patient_weight') }}"
                                        class="{{($errors->first('user_patient_weight') ? " border-red-600"
                                        : "border-gray-300" )}} mt-1 focus:ring-indigo-500 focus:border-indigo-500 block
                                        w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                    @error('user_patient_weight')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                {{-- Medical History --}}
                                <div class="col-span-6">
                                    <h2 class="font-medium">Medical History</h2>
                                </div>

                                {{-- History of past illness --}}
                                <div class="col-span-6">
                                    <label for="history_of_past_illness"
                                        class="block text-sm font-medium text-gray-700">I. History of Past Illness <span
                                            class="text-xs">(if
                                            any)</span></label>
                                    <textarea disabled name="history_of_past_illness" id="history_of_past_illness"
                                        autocomplete="history_of_past_illness"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">{{ old('history_of_past_illness') }}</textarea>
                                </div>

                                {{-- past illness --}}
                                <div class="col-span-6">
                                    <label for="past_illness" class="block text-sm font-medium text-gray-700">II. Past
                                        Illness</label>
                                    <textarea disabled name="past_illness" id="past_illness" autocomplete="past_illness"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">{{ old('past_illness') }}</textarea>
                                </div>

                                {{-- operations and hospitalizations --}}
                                <div class="col-span-6">
                                    <label for="operations_and_hospitalizations"
                                        class="block text-sm font-medium text-gray-700">III. Operations and
                                        Hospitalizations</label>
                                    <textarea disabled name="operations_and_hospitalizations"
                                        id="operations_and_hospitalizations"
                                        autocomplete="operations_and_hospitalizations"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">{{ old('operations_and_hospitalizations') }}</textarea>
                                </div>

                                {{-- immunization history --}}
                                <div class="col-span-6">
                                    <label for="immunization_history"
                                        class="block text-sm font-medium text-gray-700">IV. Immunization History</label>
                                    <textarea disabled name="immunization_history" id="immunization_history"
                                        autocomplete="immunization_history"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">{{ old('immunization_history') }}</textarea>
                                </div>

                                {{-- social and environmental history --}}
                                <div class="col-span-6">
                                    <label for="social_and_environmental_history"
                                        class="block text-sm font-medium text-gray-700">V. Social and Environmental
                                        History</label>
                                    <textarea disabled name="social_and_environmental_history"
                                        id="social_and_environmental_history"
                                        autocomplete="social_and_environmental_history"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">{{ old('social_and_environmental_history') }}</textarea>
                                </div>

                                {{-- obstetrics gynecological history --}}
                                <div class="col-span-6">
                                    <label for="obstetrics_gynecological_history"
                                        class="block text-sm font-medium text-gray-700">VI. Obstetrics Gynecological
                                        History <span class="text-xs">(for female only)</span></label>
                                    <textarea disabled name="obstetrics_gynecological_history"
                                        id="obstetrics_gynecological_history"
                                        autocomplete="obstetrics_gynecological_history"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">{{ old('obstetrics_gynecological_history') }}</textarea>
                                </div>

                                {{-- Physical Examination --}}
                                <div class="col-span-6">
                                    <h2 class="font-medium">Physical Examination <span class="text-xs">(Check all that
                                            apply)</span></h2>
                                </div>

                                {{-- general survey --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="general_survey" name="general_survey" type="checkbox"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="general_survey" class="font-medium text-gray-700">General
                                                Survey</label>
                                        </div>
                                    </div>
                                </div>

                                {{-- skin --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="skin" name="skin" type="checkbox"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="skin" class="font-medium text-gray-700">Skin</label>
                                        </div>
                                    </div>
                                </div>

                                {{-- heent --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="heent" name="heent" type="checkbox"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="heent" class="font-medium text-gray-700">Heent</label>
                                        </div>
                                    </div>
                                </div>

                                {{-- chest and lungs --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="chest_and_lungs" name="chest_and_lungs" type="checkbox"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="chest_and_lungs" class="font-medium text-gray-700">Chest and
                                                Lungs</label>
                                        </div>
                                    </div>
                                </div>

                                {{-- heart --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="heart" name="heart" type="checkbox"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="heart" class="font-medium text-gray-700">Heart</label>
                                        </div>
                                    </div>
                                </div>

                                {{-- abdomen --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="abdomen" name="abdomen" type="checkbox"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="abdomen" class="font-medium text-gray-700">Abdomen</label>
                                        </div>
                                    </div>
                                </div>

                                {{-- genitourinary --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="genitourinary" name="genitourinary" type="checkbox"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="genitourinary"
                                                class="font-medium text-gray-700">Genitourinary</label>
                                        </div>
                                    </div>
                                </div>

                                {{-- musculoskeletal --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="musculoskeletal" name="musculoskeletal" type="checkbox"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="musculoskeletal"
                                                class="font-medium text-gray-700">Musculoskeletal</label>
                                        </div>
                                    </div>
                                </div>

                                {{-- neurological_examination --}}
                                <div class="col-span-6">
                                    <label for="neurological_examination"
                                        class="block text-sm font-medium text-gray-700">Neurological
                                        Examination</label>

                                </div>
                                {{-- mental status --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="mental_status" name="mental_status" type="checkbox"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="mental_status" class="font-medium text-gray-700">
                                                Mental Status
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                {{-- coordination and balance --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="coordination_and_balance" name="coordination_and_balance"
                                                type="checkbox"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="coordination_and_balance" class="font-medium text-gray-700">
                                                Coordination and Balance
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                {{-- reflexes--}}
                                <div class="col-span-6 sm:col-span-2">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="reflexes" name="reflexes" type="checkbox"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="reflexes" class="font-medium text-gray-700">
                                                Reflexes
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                {{-- sensation--}}
                                <div class="col-span-6 sm:col-span-2">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="sensation" name="sensation" type="checkbox"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="sensation" class="font-medium text-gray-700">
                                                Sensation
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                {{-- cranial_nerves--}}
                                <div class="col-span-6 sm:col-span-2">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="cranial_nerves" name="cranial_nerves" type="checkbox"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="cranial_nerves" class="font-medium text-gray-700">
                                                Cranial Nerves
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                {{-- autonomic_nervous_system_nerves--}}
                                <div class="col-span-6 sm:col-span-2">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="autonomic_nervous_system_nerves"
                                                name="autonomic_nervous_system_nerves" type="checkbox"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="autonomic_nervous_system_nerves"
                                                class="font-medium text-gray-700">
                                                Autonomic Nervous System Nerves
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-6">
                                    <label for="neurological_examination"
                                        class="block text-sm font-medium text-gray-700">Others (Neurological
                                        Examination)</label>
                                    <textarea disabled name="neurological_examination" id="neurological_examination"
                                        autocomplete="neurological_examination"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">{{ old('neurological_examination') }}</textarea>
                                </div>

                                {{-- laboratory_results --}}
                                <div class="col-span-6">
                                    <label for="laboratory_results"
                                        class="block text-sm font-medium text-gray-700">Laboratory
                                        Results</label>
                                </div>


                                {{-- urine --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <div class="col-span-6 sm:col-span-2">
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="urine" name="urine" type="checkbox"
                                                    class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="urine" class="font-medium text-gray-700">
                                                    Urine
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="urine_comment"
                                        class="block text-xs font-medium text-gray-700">Result</label>
                                    {{-- <input type="text" name="urine_comment" value="{{ old('urine_comment') }}"
                                        id="urine_comment" autocomplete="urine_comment"
                                        class="pb-10 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    --}}
                                    <textarea name="urine_comment" id="urine_comment" autocomplete="urine_comment"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">{{ old('urine_comment') }}</textarea>

                                </div>

                                {{-- complete_blood_count --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <div class="col-span-6 sm:col-span-2">
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="complete_blood_count" name="complete_blood_count"
                                                    type="checkbox"
                                                    class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="complete_blood_count" class="font-medium text-gray-700">
                                                    Complete Blood Count
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="complete_blood_count_comment"
                                        class="block text-xs font-medium text-gray-700">Result</label>
                                    {{-- <input type="text" name="complete_blood_count_comment"
                                        value="{{ old('complete_blood_count_comment') }}"
                                        id="complete_blood_count_comment" autocomplete="complete_blood_count_comment"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    --}}
                                    <textarea name="complete_blood_count_comment" id="complete_blood_count_comment"
                                        autocomplete="complete_blood_count_comment"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">{{ old('complete_blood_count_comment') }}</textarea>
                                </div>

                                {{-- x_ray --}}
                                <div class="col-span-6 sm:col-span-2">
                                    <div class="col-span-6 sm:col-span-2">
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="x_ray" name="x_ray" type="checkbox"
                                                    class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="x_ray" class="font-medium text-gray-700">
                                                    X-Ray
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="x_ray_comment"
                                        class="block text-xs font-medium text-gray-700">Result</label>
                                    {{-- <input type="text" name="x_ray_comment" value="{{ old('x_ray_comment') }}"
                                        id="x_ray_comment" autocomplete="x_ray_comment"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    --}}
                                    <textarea name="x_ray_comment" id="x_ray_comment" autocomplete="x_ray_comment"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">{{ old('x_ray_comment') }}</textarea>
                                </div>

                                <div class=" col-span-6">
                                    <label for="laboratory_results"
                                        class="block text-sm font-medium text-gray-700">Others
                                        (Laboratory
                                        Results)</label>
                                    <textarea disabled name="laboratory_results" id="laboratory_results"
                                        autocomplete="laboratory_results"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">{{ old('laboratory_results') }}</textarea>
                                </div>

                                {{-- assestment --}}
                                <div class="col-span-6">
                                    <label for="assestment"
                                        class="block text-sm font-medium text-gray-700">Assestment</label>
                                    <textarea disabled name="assestment" id="assestment" autocomplete="assestment"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">{{ old('assestment') }}</textarea>
                                </div>

                                {{-- University Physician --}}
                                <div class="col-span-6 sm:col-span-2"></div>
                                <div class="col-span-6 sm:col-span-2">
                                    <input type="text" disabled name="university_physician" id="university_physician"
                                        autocomplete="university-physician" value="{{ old('university_physician') }}"
                                        class="{{($errors->first('university_physician') ? " border-red-600"
                                        : "border-gray-300" )}} mb-1 focus:ring-indigo-500 focus:border-indigo-500 block
                                        w-full shadow-sm sm:text-sm border-gray-300 rounded-md inputs cursor-no-drop">
                                    <label for="university_physician"
                                        class="block text-sm font-medium text-gray-700 text-center">University
                                        Physician</label>
                                    @error('university_physician')
                                    <div class="flex items-center gap-1 mt-1 ml-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="#cc0000">
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
                            <div class="px-4 mt-4 py-3 bg-gray-50 w-full sm:px-6">
                                <button type="submit"
                                    class="inline-flex w-full justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add
                                    Record</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    // This script tells what to do if you select a patient role
    // will hide some inputs or enable inputs
    const patient_role = document.getElementById("patient_role").value;
    const student = document.getElementById("student").value;
    const teaching_staff = document.getElementById("teaching_staff").value;
    const non_teaching_staff = document.getElementById("non_teaching_staff").value;
    const department_year_role_value = document.getElementById("department_year_role").value;
    const label = document.getElementById("label");
    const department_year_role = document.getElementById("department_year_role");
    const inputs = document.querySelectorAll(".inputs");
    const form = document.getElementById('form')

    // get the labels in local storage if the conditions are met
    if (teaching_staff === teaching_staff) {
            label.textContent = localStorage.getItem("r0l3");
        } else if (student === student) {
            label.textContent = localStorage.getItem("r0l3");
            // label.textContent = "Year & Section";
        } else if (non_teaching_staff === non_teaching_staff) {
            label.textContent = localStorage.getItem("r0l3");
        }

        // if the user role selected enable the input
        inputs.forEach((input) => {
            if (patient_role !== "Patient Category") {
                input.disabled = false;
                input.style.cursor = "default";
            }
        });

        if (patient_role === "Patient Category") {
                department_year_role.style.display = "none"
        }

     // that is the selected value
    function update(that) {
        if (that) {
            if (teaching_staff === that.value) {
                localStorage.setItem('r0l3', 'Department')
                label.textContent = localStorage.getItem("r0l3");
                department_year_role.style.display = "block";
            } else if (student === that.value) {
                localStorage.setItem('r0l3', 'Year & Section')
                label.textContent = localStorage.getItem("r0l3");
                // label.textContent = "Year & Section";
                department_year_role.style.display = "block";
            } else if (non_teaching_staff === that.value) {
                localStorage.setItem('r0l3', 'Position')
                label.textContent = localStorage.getItem("r0l3");
                // label.textContent = "Role";
                department_year_role.style.display = "block";
            } else {
                localStorage.setItem('r0l3', 'Department / Year & Section / Role')
                label.textContent = localStorage.getItem("r0l3");
                department_year_role.style.display = "none";
            }
        }

        // if the user role is not selected disable the inputs
        inputs.forEach((input) => {
            if (that.value !== "Patient Category") {
                input.disabled = false;
                input.style.cursor = "default";
            }
        });
    }
</script>
