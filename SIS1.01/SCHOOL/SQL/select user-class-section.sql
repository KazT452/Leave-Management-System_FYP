SELECT 	u.id as USER_ID,
		s.name as USER_NAME,
        s.class as CLASS_ID,
		c.name as CLASS_NAME,
        c.section as SECTION_ID,
        e.section as SECTION_NAME 
FROM sms.user as u
INNER JOIN sms.sms_students as s
ON u.designation=s.admission_no
INNER JOIN sms.sms_classes as c
ON c.id=s.class
INNER JOIN sms.sms_section as e
ON c.section=e.section_id
WHERE u.id=8
