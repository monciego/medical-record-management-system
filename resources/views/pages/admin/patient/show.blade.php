<x-app-layout>
    @section('title', isset($patient) ? $patient->user_patient_full_name : 'Patient')
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium capitalize text-gray-900">Patient Information
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details of {{ $patient->user_patient_full_name }}.
            </p>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Full name</dt>
                    <dd class="mt-1 text-sm  font-medium text-gray-900 sm:mt-0 sm:col-span-2">{{
                        $patient->user_patient_full_name }}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Sex/Gender</dt>
                    <dd class="mt-1 text-sm font-medium text-gray-900 sm:mt-0 sm:col-span-2">{{
                        $patient->user_patient_gender
                        }}</dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Contact Number</dt>
                    <dd class="mt-1 text-sm font-medium text-gray-900 sm:mt-0 sm:col-span-2">{{
                        $patient->patient_phone_number }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Prescribed Medicine</dt>
                    <dd class="mt-1 text-sm font-medium text-gray-900 sm:mt-0 sm:col-span-2">{{
                        $patient->patient_information->patient_prescribed_medicine }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Consult Date</dt>
                    <dd class="mt-1 text-sm font-medium text-gray-900 sm:mt-0 sm:col-span-2">
                        <div>{{
                            \Carbon\Carbon::parse($patient->patient_information->patient_consult_date)->isoFormat('MMM D
                            YYYY')}}</div>
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Consult Time</dt>
                    <dd class="mt-1 text-sm font-medium text-gray-900 sm:mt-0 sm:col-span-2">{{
                        $patient->patient_information->patient_consult_time }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Comments</dt>
                    <dd class="mt-1 font-medium text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{
                        $patient->patient_medical_comments
                        }}</dd>
                </div>

            </dl>
        </div>
    </div>
</x-app-layout>
