@if($user->user_patient_role == 'teaching_staff')
Teaching Staff
@elseif($user->user_patient_role == 'non_teaching_staff')
Non-Teaching Staff
@elseif($user->user_patient_role == 'student')
Student
@endif
