@if($patient->patient_department )
{{ $patient->patient_department }}
@elseif($patient->patient_year )
{{ $patient->patient_year }}
@elseif($patient->patient_department == null || $patient->patient_year == null)
N/A
@endif
