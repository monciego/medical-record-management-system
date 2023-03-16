@if($patient->user_patient_role == 'teaching_staff')
Teaching
@elseif($patient->user_patient_role == 'non_teaching_staff')
Non-Teaching Staff
@elseif($patient->user_patient_role == 'student')
Student
@endif
