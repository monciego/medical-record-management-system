<x-app-layout>
    @section('title', isset($data) ? $data->user_patient_full_name : 'Examination Report')

    @foreach ($examination_report_datas as $examination_report_data)


    <div class="px-4 py-5 sm:px-6 bg-white shadow overflow-hidden sm:rounded-lg my-4">
        <div class="flex-col flex md:flex-row items-center justify-between">
            <div></div>
            <div>
                <div class="flex items-center gap-2">
                    <div>
                        <h3 class="text-lg leading-6 font-medium capitalize text-gray-900">
                            Medical Examination Report
                    </div>
                </div>
                <p class="text-center uppercase text-xs">pangasinan state university</p>
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                </p>
            </div>
            <div>
                <a href="{{ route('export-document', $examination_report_data) }}"
                    class="px-4 py-2  font-medium text-xs inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-indigo-500 hover:bg-indigo-600 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                        <path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v5m-5 6h7m-3 -3l3 3l-3 3" />
                    </svg>
                    <span class="xs:block text-xs ml-2">Export to word</span>
                </a>
            </div>
        </div>
        <hr class="my-4" />

        <div class="pb-5 pt-5 grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-2">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="pre_employment" name="pre_employment" type="checkbox" {{
                            $examination_report_data->pre_employment == true ? 'checked'
                        :
                        '' }} readonly disabled="disabled"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="pre_employment" class="font-medium text-gray-700 uppercase">Pre-employement</label>
                    </div>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-2">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="annual" name="annual" type="checkbox" {{ $examination_report_data->annual==true
                        ? 'checked' : '' }} readonly disabled="disabled"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="annual" class="font-medium text-gray-700 uppercase">Annual</label>
                    </div>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-2">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="ojt" name="ojt" type="checkbox" {{ $examination_report_data->ojt
                        == true ? 'checked'
                        :
                        '' }} readonly disabled="disabled"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="ojt" class="font-medium text-gray-700 uppercase">ojt</label>
                    </div>
                </div>
            </div>

            <hr class="col-span-6" />

            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Name</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $examination_report_data->user_data->user_patient_full_name }}
                </p>
            </div>

            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Age</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ \Carbon\Carbon::parse($examination_report_data->user_data->user_patient_birthday)->age }}
                </p>
            </div>

            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Sex</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $examination_report_data->user_data->user_patient_gender }}
                </p>
            </div>

            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Civil Status</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $examination_report_data->user_data->civil_status }}
                </p>
            </div>

            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Address</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $examination_report_data->address }}
                </p>
            </div>

            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Date of Examination</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ \Carbon\Carbon::parse($examination_report_data->date_of_examination)->isoFormat('MMM D
                    YYYY')}}
                </p>
            </div>

            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">
                    Course/Department
                </h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $examination_report_data->user_data->user_year_department_role }}
                </p>
            </div>

            <hr class="col-span-6">

            {{-- medical history --}}
            <div class="col-span-6">
                <h2 class="font-medium">Medical History</h2>
            </div>

            <div class="col-span-6">
                <h5 class="text-sm text-gray-800 mb-1">A. Present Symptoms</h5>
                <p
                    class="{{  $examination_report_data->present_symptoms == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $examination_report_data->present_symptoms }}
                    @if ( $examination_report_data->present_symptoms == null)
                    N/A
                    @endif
                </p>
            </div>

            <div class="col-span-6">
                <h5 class="text-sm text-gray-800 mb-1">B. Past Medical History</h5>
                <p
                    class="{{  $examination_report_data->past_medical_history == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $examination_report_data->past_medical_history }}
                    @if ( $examination_report_data->past_medical_history == null)
                    N/A
                    @endif
                </p>
            </div>

            <div class="col-span-6">
                <h5 class="text-sm text-gray-800 mb-1">C. Family Medical History</h5>
                <p
                    class="{{  $examination_report_data->family_medical_history == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $examination_report_data->family_medical_history }}
                    @if ( $examination_report_data->family_medical_history == null)
                    N/A
                    @endif
                </p>
            </div>

            <div class="col-span-6">
                <h5 class="text-sm text-gray-800 mb-1">D. History of Operations</h5>
                <p
                    class="{{  $examination_report_data->history_of_operations == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $examination_report_data->history_of_operations }}
                    @if ( $examination_report_data->history_of_operations == null)
                    N/A
                    @endif
                </p>
            </div>

            <div class="col-span-6">
                <h5 class="text-sm text-gray-800 mb-1">E. Allergies</h5>
                <p
                    class="{{  $examination_report_data->allergies == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $examination_report_data->allergies }}
                    @if ( $examination_report_data->allergies == null)
                    N/A
                    @endif
                </p>
            </div>

            <div class="col-span-6">
                <h5 class="text-sm text-gray-800 mb-1">F. Gynecological/Obstetrics History</h5>
                <p
                    class="{{  $examination_report_data->gynecological_obstetrics_history == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $examination_report_data->gynecological_obstetrics_history }}
                    @if ( $examination_report_data->gynecological_obstetrics_history == null)
                    N/A
                    @endif
                </p>
            </div>

            <div class="col-span-6">
                <h5 class="text-sm text-gray-800 mb-1">G. Personal/Social History</h5>
                <p
                    class="{{  $examination_report_data->gynecological_obstetrics_history == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $examination_report_data->gynecological_obstetrics_history }}
                    @if ( $examination_report_data->gynecological_obstetrics_history == null)
                    N/A
                    @endif
                </p>
            </div>

            <hr class="col-span-6">

            {{-- physical examination --}}
            <div class="col-span-6">
                <h2 class="font-medium">Physical Examination</h2>
            </div>

            <div class="col-span-6">
                <h5 class="text-sm text-gray-800 mb-1">A. General Survey</h5>
                <p
                    class="{{  $examination_report_data->general_survey == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $examination_report_data->general_survey }}
                    @if ( $examination_report_data->general_survey == null)
                    N/A
                    @endif
                </p>
            </div>

            <div class="col-span-6">
                <div class="block text-sm font-medium text-gray-700">
                    B. Vital Signs
                </div>
            </div>

            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Height</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $examination_report_data->height }}
                </p>
            </div>

            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Weight</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $examination_report_data->weight }}
                </p>
            </div>

            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Blood Pressure</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $examination_report_data->blood_pressure }}
                </p>
            </div>

            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Heart Rate</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $examination_report_data->heart_rate }}
                </p>
            </div>

            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Respiratory Rate</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $examination_report_data->respiratory_rate }}
                </p>
            </div>

            <div class="col-span-6 sm:col-span-2">
                <h5 class="text-sm text-gray-800 mb-1">Temperature</h5>
                <p
                    class="text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2">
                    {{ $examination_report_data->temperature }}
                </p>
            </div>

            <div class="col-span-6">
                <h5 class="text-sm text-gray-800 mb-1">C. Skin</h5>
                <p
                    class="{{  $examination_report_data->skin == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $examination_report_data->skin }}
                    @if ( $examination_report_data->skin == null)
                    N/A
                    @endif
                </p>
            </div>

            <div class="col-span-6">
                <h5 class="text-sm text-gray-800 mb-1">D. Heent</h5>
                <p
                    class="{{  $examination_report_data->heent == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $examination_report_data->heent }}
                    @if ( $examination_report_data->heent == null)
                    N/A
                    @endif
                </p>
            </div>

            <div class="col-span-6">
                <h5 class="text-sm text-gray-800 mb-1">E. Chest and Lungs</h5>
                <p
                    class="{{  $examination_report_data->chest_and_lungs == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $examination_report_data->chest_and_lungs }}
                    @if ( $examination_report_data->chest_and_lungs == null)
                    N/A
                    @endif
                </p>
            </div>

            <div class="col-span-6">
                <h5 class="text-sm text-gray-800 mb-1">F. Heart</h5>
                <p
                    class="{{  $examination_report_data->heart == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $examination_report_data->heart }}
                    @if ( $examination_report_data->heart == null)
                    N/A
                    @endif
                </p>
            </div>

            <div class="col-span-6">
                <h5 class="text-sm text-gray-800 mb-1">G. Abdomen</h5>
                <p
                    class="{{  $examination_report_data->abdomen == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $examination_report_data->abdomen }}
                    @if ( $examination_report_data->abdomen == null)
                    N/A
                    @endif
                </p>
            </div>

            <div class="col-span-6">
                <h5 class="text-sm text-gray-800 mb-1">H. Genitourinary</h5>
                <p
                    class="{{  $examination_report_data->genitourinary == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $examination_report_data->genitourinary }}
                    @if ( $examination_report_data->genitourinary == null)
                    N/A
                    @endif
                </p>
            </div>

            <div class="col-span-6">
                <h5 class="text-sm text-gray-800 mb-1">I. Extremities</h5>
                <p
                    class="{{  $examination_report_data->extremities == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $examination_report_data->extremities }}
                    @if ( $examination_report_data->extremities == null)
                    N/A
                    @endif
                </p>
            </div>

            <div class="col-span-6">
                <h5 class="text-sm text-gray-800 mb-1">J. Neurological</h5>
                <p
                    class="{{  $examination_report_data->neurological == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                    {{ $examination_report_data->neurological }}
                    @if ( $examination_report_data->neurological == null)
                    N/A
                    @endif
                </p>
            </div>

            <hr class="col-span-6">

            {{-- laboratory results --}}
            <div class="col-span-6">
                <h2 class="font-medium">Laboratory Results</h2>
            </div>

            {{-- --}}
        </div>

        <form class=" grid grid-cols-8 gap-4 sm:gap-2 mb-4">
            <div class="col-span-2 sm:col-span-2">
                <p class="block text-sm font-medium text-gray-700">
                    A. OBO
                </p>
            </div>
            <div class="col-span-2 sm:col-span-1 ">
                <div class="flex items-end">
                    <div class="flex items-center h-5">
                        <input id="obo_normal" name="obo" type="radio" value="normal" {{ $examination_report_data->obo
                        == 'normal' ? 'checked' : '' }}
                        disabled="disabled" readonly
                        class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full">
                    </div>
                    <div class="ml-2 text-sm">
                        <label for="obo_normal" class="font-medium text-gray-700">Normal</label>
                    </div>
                </div>
            </div>
            <div class="col-span-6 sm:col-span-5">
                <div class="flex items-center h-5">
                    <div>
                        <input id="obo_not_normal" name="obo" type="radio" {{ $examination_report_data->obo
                        !== 'normal' ? 'checked' : ''
                        }}
                        disabled="disabled" readonly
                        value="not_normal"
                        class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full" />
                    </div>
                    <div class="ml-2 text-sm">
                        <label for="obo_not_normal" class="font-medium text-gray-700">Findings:</label>
                    </div>

                    <input type="text" name="obo_findings" readonly disabled="disabled"
                        value="{{ $examination_report_data->obo_findings }}" class="
                                border-slate-600 ml-2 p-0 px-1 block w-full shadow-sm sm:text-sm focus:outline-none !outline-none
                                focus:ring-0 border-t-0 border-r-0 border-l-0 ">
                </div>
            </div>
        </form>

        <form class=" grid grid-cols-8 gap-4 sm:gap-2 mb-4">
            <div class="col-span-2 sm:col-span-2">
                <p class="block text-sm font-medium text-gray-700">
                    B. Urinalysis
                </p>
            </div>
            <div class="col-span-2 sm:col-span-1 ">
                <div class="flex items-end">
                    <div class="flex items-center h-5">
                        <input id="urinalysis_normal" name="urinalysis" type="radio" value="normal" {{
                            $examination_report_data->urinalysis == 'normal' ? 'checked' : '' }}
                        disabled="disabled" readonly
                        class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full">
                    </div>
                    <div class="ml-2 text-sm">
                        <label for="urinalysis_normal" class="font-medium text-gray-700">Normal</label>
                    </div>
                </div>
            </div>
            <div class="col-span-6 sm:col-span-5">
                <div class="flex items-center h-5">
                    <div>
                        <input id="urinalysis_not_normal" name="urinalysis" type="radio" {{
                            $examination_report_data->urinalysis !== 'normal' ? 'checked' : ''
                        }}
                        disabled="disabled" readonly
                        value="not_normal"
                        class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full" />
                    </div>
                    <div class="ml-2 text-sm">
                        <label for="urinalysis_not_normal" class="font-medium text-gray-700">Findings:</label>
                    </div>

                    <input type="text" name="urinalysis_findings" readonly disabled="disabled"
                        value="{{ $examination_report_data->urinalysis_findings }}" class="
                                border-slate-600 ml-2 p-0 px-1 block w-full shadow-sm sm:text-sm focus:outline-none !outline-none
                                focus:ring-0 border-t-0 border-r-0 border-l-0 ">
                </div>
            </div>
        </form>

        <form class=" grid grid-cols-8 gap-4 sm:gap-2 mb-4">
            <div class="col-span-2 sm:col-span-2">
                <p class="block text-sm font-medium text-gray-700">
                    C. Fecalysis
                </p>
            </div>
            <div class="col-span-2 sm:col-span-1 ">
                <div class="flex items-end">
                    <div class="flex items-center h-5">
                        <input id="fecalysis_normal" name="fecalysis" type="radio" value="normal" {{
                            $examination_report_data->fecalysis == 'normal' ? 'checked' : '' }}
                        disabled="disabled" readonly
                        class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full">
                    </div>
                    <div class="ml-2 text-sm">
                        <label for="fecalysis_normal" class="font-medium text-gray-700">Normal</label>
                    </div>
                </div>
            </div>
            <div class="col-span-6 sm:col-span-5">
                <div class="flex items-center h-5">
                    <div>
                        <input id="fecalysis_not_normal" name="fecalysis" type="radio" {{
                            $examination_report_data->fecalysis !== 'normal' ? 'checked' : ''
                        }}
                        disabled="disabled" readonly
                        value="not_normal"
                        class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full" />
                    </div>
                    <div class="ml-2 text-sm">
                        <label for="fecalysis_not_normal" class="font-medium text-gray-700">Findings:</label>
                    </div>

                    <input type="text" name="fecalysis_findings" readonly disabled="disabled"
                        value="{{ $examination_report_data->fecalysis_findings }}" class="
                                border-slate-600 ml-2 p-0 px-1 block w-full shadow-sm sm:text-sm focus:outline-none !outline-none
                                focus:ring-0 border-t-0 border-r-0 border-l-0 ">
                </div>
            </div>
        </form>

        <form class=" grid grid-cols-8 gap-4 sm:gap-2 mb-4">
            <div class="col-span-2 sm:col-span-2">
                <p class="block text-sm font-medium text-gray-700">
                    D. HBS Ag
                </p>
            </div>
            <div class="col-span-2 sm:col-span-1 ">
                <div class="flex items-end">
                    <div class="flex items-center h-5">
                        <input id="hbs_ag_normal" name="hbs_ag" type="radio" value="normal" {{
                            $examination_report_data->hbs_ag == 'normal' ? 'checked' : '' }}
                        disabled="disabled" readonly
                        class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full">
                    </div>
                    <div class="ml-2 text-sm">
                        <label for="hbs_ag_normal" class="font-medium text-gray-700">Normal</label>
                    </div>
                </div>
            </div>
            <div class="col-span-6 sm:col-span-5">
                <div class="flex items-center h-5">
                    <div>
                        <input id="hbs_ag_not_normal" name="hbs_ag" type="radio" {{ $examination_report_data->hbs_ag !==
                        'normal' ? 'checked' : ''
                        }}
                        disabled="disabled" readonly
                        value="not_normal"
                        class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full" />
                    </div>
                    <div class="ml-2 text-sm">
                        <label for="hbs_ag_not_normal" class="font-medium text-gray-700">Findings:</label>
                    </div>

                    <input type="text" name="hbs_ag_findings" readonly disabled="disabled"
                        value="{{ $examination_report_data->hbs_ag_findings }}" class="
                                border-slate-600 ml-2 p-0 px-1 block w-full shadow-sm sm:text-sm focus:outline-none !outline-none
                                focus:ring-0 border-t-0 border-r-0 border-l-0 ">
                </div>
            </div>
        </form>

        <form class=" grid grid-cols-8 gap-4 sm:gap-2 mb-4">
            <div class="col-span-2 sm:col-span-2">
                <p class="block text-sm font-medium text-gray-700">
                    E. Pregnancy Test
                </p>
            </div>
            <div class="col-span-2 sm:col-span-1 ">
                <div class="flex items-end">
                    <div class="flex items-center h-5">
                        <input id="pregnancy_test_normal" name="pregnancy_test" type="radio" value="normal" {{
                            $examination_report_data->pregnancy_test == 'normal' ? 'checked' : ''
                        }}
                        disabled="disabled" readonly
                        class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full">
                    </div>
                    <div class="ml-2 text-sm">
                        <label for="pregnancy_test_normal" class="font-medium text-gray-700">Normal</label>
                    </div>
                </div>
            </div>
            <div class="col-span-6 sm:col-span-5">
                <div class="flex items-center h-5">
                    <div>
                        <input id="pregnancy_test_not_normal" name="pregnancy_test" type="radio" {{
                            $examination_report_data->pregnancy_test !== 'normal' ? 'checked' : ''
                        }}
                        disabled="disabled" readonly
                        value="not_normal"
                        class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full" />
                    </div>
                    <div class="ml-2 text-sm">
                        <label for="pregnancy_test_not_normal" class="font-medium text-gray-700">Findings:</label>
                    </div>

                    <input type="text" name="pregnancy_test_findings" readonly disabled="disabled"
                        value="{{ $examination_report_data->pregnancy_test_findings }}" class="
                                    border-slate-600 ml-2 p-0 px-1 block w-full shadow-sm sm:text-sm focus:outline-none !outline-none
                                    focus:ring-0 border-t-0 border-r-0 border-l-0 ">
                </div>
            </div>
        </form>

        <form class=" grid grid-cols-8 gap-4 sm:gap-2 mb-4">
            <div class="col-span-2 sm:col-span-2">
                <p class="block text-sm font-medium text-gray-700">
                    F. Drug Test
                </p>
            </div>
            <div class="col-span-2 sm:col-span-1 ">
                <div class="flex items-end">
                    <div class="flex items-center h-5">
                        <input id="drug_test_normal" name="drug_test" type="radio" value="normal" {{
                            $examination_report_data->drug_test == 'normal' ? 'checked' : ''
                        }}
                        disabled="disabled" readonly
                        class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full">
                    </div>
                    <div class="ml-2 text-sm">
                        <label for="drug_test_normal" class="font-medium text-gray-700">Normal</label>
                    </div>
                </div>
            </div>
            <div class="col-span-6 sm:col-span-5">
                <div class="flex items-center h-5">
                    <div>
                        <input id="drug_test_not_normal" name="drug_test" type="radio" {{
                            $examination_report_data->drug_test !== 'normal' ? 'checked' : ''
                        }}
                        disabled="disabled" readonly
                        value="not_normal"
                        class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full" />
                    </div>
                    <div class="ml-2 text-sm">
                        <label for="drug_test_not_normal" class="font-medium text-gray-700">Findings:</label>
                    </div>

                    <input type="text" name="drug_test_findings" readonly disabled="disabled"
                        value="{{ $examination_report_data->drug_test_findings }}" class="
                                border-slate-600 ml-2 p-0 px-1 block w-full shadow-sm sm:text-sm focus:outline-none !outline-none
                                focus:ring-0 border-t-0 border-r-0 border-l-0 ">
                </div>
            </div>
        </form>

        <form class=" grid grid-cols-8 gap-4 sm:gap-2 mb-4">
            <div class="col-span-2 sm:col-span-2">
                <p class="block text-sm font-medium text-gray-700">
                    G. Chest X-Ray
                </p>
            </div>
            <div class="col-span-2 sm:col-span-1 ">
                <div class="flex items-end">
                    <div class="flex items-center h-5">
                        <input id="chest_xray_normal" name="chest_xray" type="radio" value="normal" {{
                            $examination_report_data->chest_xray == 'normal' ? 'checked' : ''
                        }}
                        disabled="disabled" readonly
                        class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full">
                    </div>
                    <div class="ml-2 text-sm">
                        <label for="chest_xray_normal" class="font-medium text-gray-700">Normal</label>
                    </div>
                </div>
            </div>
            <div class="col-span-6 sm:col-span-5">
                <div class="flex items-center h-5">
                    <div>
                        <input id="chest_xray_not_normal" name="chest_xray" type="radio" {{
                            $examination_report_data->chest_xray !== 'normal' ? 'checked' : ''
                        }}
                        disabled="disabled" readonly
                        value="not_normal"
                        class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full" />
                    </div>
                    <div class="ml-2 text-sm">
                        <label for="chest_xray_not_normal" class="font-medium text-gray-700">Findings:</label>
                    </div>

                    <input type="text" name="chest_xray_findings" readonly disabled="disabled"
                        value="{{ $examination_report_data->chest_xray_findings }}" class="
                                border-slate-600 ml-2 p-0 px-1 block w-full shadow-sm sm:text-sm focus:outline-none !outline-none
                                focus:ring-0 border-t-0 border-r-0 border-l-0 ">
                </div>
            </div>
        </form>

        <form class=" grid grid-cols-8 gap-4 sm:gap-2 mb-4">
            <div class="col-span-2 sm:col-span-2">
                <p class="block text-sm font-medium text-gray-700">
                    H. ECG
                </p>
            </div>
            <div class="col-span-2 sm:col-span-1 ">
                <div class="flex items-end">
                    <div class="flex items-center h-5">
                        <input id="ecg_normal" name="ecg" type="radio" value="normal" {{ $examination_report_data->ecg
                        == 'normal' ? 'checked' : ''
                        }}
                        disabled="disabled" readonly
                        class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full">
                    </div>
                    <div class="ml-2 text-sm">
                        <label for="ecg_normal" class="font-medium text-gray-700">Normal</label>
                    </div>
                </div>
            </div>
            <div class="col-span-6 sm:col-span-5">
                <div class="flex items-center h-5">
                    <div>
                        <input id="ecg_not_normal" name="ecg" type="radio" {{ $examination_report_data->ecg
                        !== 'normal' ? 'checked' : ''
                        }}
                        disabled="disabled" readonly
                        value="not_normal"
                        class="radio focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded-full" />
                    </div>
                    <div class="ml-2 text-sm">
                        <label for="ecg_not_normal" class="font-medium text-gray-700">Findings:</label>
                    </div>

                    <input type="text" name="ecg_findings" readonly disabled="disabled"
                        value="{{ $examination_report_data->ecg_findings }}" class="
                                border-slate-600 ml-2 p-0 px-1 block w-full shadow-sm sm:text-sm focus:outline-none !outline-none
                                focus:ring-0 border-t-0 border-r-0 border-l-0 ">
                </div>
            </div>
        </form>

        <div class="col-span-6">
            <h5 class="text-sm font-medium text-gray-700 mb-1">I. Others</h5>
            <p
                class="{{  $examination_report_data->others == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                {{ $examination_report_data->others }}
                @if ( $examination_report_data->others == null)
                N/A
                @endif
            </p>
        </div>

        <hr class="col-span-6 my-4" />

        {{-- classification --}}
        <div class="col-span-6">
            <h2 class="font-medium">Classification</h2>
        </div>

        <form class="col-span-6 mt-4">
            <input id="class_a" name="class_a" type="checkbox" {{ $examination_report_data->class_a == true ? 'checked'
            : '' }}
            readonly disabled="disabled"
            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
            <label for="class_a" class="uppercase ml-2 text-sm font-medium text-gray-700">
                Class a
            </label>
            <span class="text-sm"> - Physically fit for all types of work. No pertinent findings noted.</span>
        </form>

        <form class="col-span-6 mt-4">
            <input id="class_a" name="class_a" type="checkbox" {{ $examination_report_data->class_b == true ? 'checked'
            : '' }}
            readonly disabled="disabled"
            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
            <label for="class_b" class="uppercase ml-2 text-sm font-medium text-gray-700">
                Class b
            </label>
            <span class="text-sm"> - Physically fit for all types of work. Has minor ailment that is easily curable and
                offers not handicap to work or to job applied for.</span>
        </form>

        <form class="col-span-6 mt-4">
            <input id="class_a" name="class_a" type="checkbox" {{ $examination_report_data->class_c == true ? 'checked'
            : '' }}
            readonly disabled="disabled"
            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
            <label for="class_c" class="uppercase ml-2 text-sm font-medium text-gray-700">
                Class C
            </label>
            <span class="text-sm"> - Employment at the risk and discretion of the management.</span>
        </form>

        <div class="col-span-6 mt-4">
            <input id="pending" name="pending" type="checkbox" {{ $examination_report_data->pending
            == true ? 'checked' : '' }} readonly disabled="disabled"
            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
            <label for="pending" class="uppercase ml-2 text-sm font-medium text-gray-700">
                Pending
            </label>
            <span class="text-sm"> - <input type="text" name="pending_text" id="pending_text"
                    autocomplete="pending_text" value="{{ $examination_report_data->pending_text }}" readonly
                    disabled="disabled"
                    class="border-slate-700 ml-2 p-0 px-1 w-3/4 shadow-sm sm:text-sm focus:outline-none !outline-none focus:ring-0 border-t-0 border-r-0 border-l-0 ">
            </span>
        </div>

        <div class="col-span-6 mt-4">
            <input id="unfit" name="unfit" type="checkbox" {{ $examination_report_data->unfit
            == true ? 'checked' : '' }} readonly disabled="disabled"
            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
            <label for="unfit" class="uppercase ml-2 text-sm font-medium text-gray-700">
                unfit
            </label>
            <span class="text-sm"> - <input type="text" name="unfit_text" id="unfit_text" autocomplete="unfit_text"
                    value="{{ $examination_report_data->unfit_text }}" readonly disabled="disabled"
                    class="border-slate-700 ml-2 p-0 px-1 w-3/4 shadow-sm sm:text-sm focus:outline-none !outline-none focus:ring-0 border-t-0 border-r-0 border-l-0 ">
            </span>
        </div>

        <hr class="col-span-6 my-4">

        {{-- remarks --}}
        <div class="col-span-6">
            <label for="remarks" class="font-medium mb-2 block">Remarks
            </label>
        </div>

        <div class="col-span-6">
            <p
                class="{{  $examination_report_data->remarks == null ? 'text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' : 'h-20 overflow-y-scroll text-sm dark-text font-medium capitalize w-full border border-gray-200 shadow-sm rounded-md px-4 py-2' }}">
                {{ $examination_report_data->remarks }}
                @if ( $examination_report_data->remarks == null)
                N/A
                @endif
            </p>
        </div>

        <hr class="col-span-6 my-4">

        <div class="col-span-6 sm:col-span-2"></div>
        <div class="mt-4 col-span-6 sm:col-span-2">
            <p class="border-gray-200 mb-1 py-2 text-center border block w-full shadow-sm sm:text-sm rounded-md">
                {{ $examination_report_data->university_physician_examine }}
            </p>
            <label for="university_physician_examine"
                class="block text-sm font-medium text-gray-700 text-center">University
                Physician</label>

        </div>
        {{-- --}}
    </div>


    @endforeach

</x-app-layout>
