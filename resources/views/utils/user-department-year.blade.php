@if($user->user_patient_department )
{{ $user->user_patient_department }}
@elseif($user->user_patient_year )
{{ $user->user_patient_year }}
@elseif($user->user_patient_department == null || $user->user_patient_year == null)
N/A
@endif
