SELECT c.id, c.name, s.section, t.teacher, ss.session 
			FROM sms_classes as c
			LEFT JOIN sms_section as s ON c.section = s.section_id
			LEFT JOIN sms_teacher as t ON c.teacher_id = t.teacher_id 
				LEFT JOIN sis_class_session as cs ON c.id = cs.class_id 
				LEFT JOIN sis_session as ss ON cs.session_id = ss.session_id
                
