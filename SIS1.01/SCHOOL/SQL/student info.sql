SELECT c.id, c.name, cs.session_id, s.section, s.section_id, t.teacher_id
			FROM sms_classes as c
			LEFT JOIN sms_section as s ON c.section = s.section_id 
			LEFT JOIN sis_teacher as t ON c.teacher_id = t.teacher_id
				LEFT JOIN sis_class_session as cs ON c.id = cs.class_id 
			WHERE c.id = '23';