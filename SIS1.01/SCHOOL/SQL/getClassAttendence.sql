SELECT s.id, s.name, s.photo, s.gender, s.dob, s.mobile, s.email, s.current_address, s.father_name, s.mother_name,s.admission_no, s.roll_no, s.admission_date, s.academic_year, a.attendance_status, a.attendance_date
				FROM sms_students as s
				LEFT JOIN sms_attendance as a 
                ON s.id = a.student_id
				WHERE s.class = '23' AND s.section='8' 
                
                
                
                
                -- GROUP BY a.student_id 