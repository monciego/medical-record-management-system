@if($patient->patient_role == 'teaching_staff')
Teaching Staff
@elseif($patient->patient_role == 'non_teaching_staff')
Non-Teaching Staff
@elseif($patient->patient_role == 'student')
Student
@endif
