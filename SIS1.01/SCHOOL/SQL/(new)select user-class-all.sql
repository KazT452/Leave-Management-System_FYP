select c.id as ID,c.name as Class,m.subject as Subject,i.section as Section,t.teacher as Teacher,u.status as Status
, u.id as uID, s.id as sID, c.id as cID, m.subject_id as mID, i.section_id as iID, t.teacher_id as tID, u.designation as Designation, u.type as Type, ss.start as sTime
from user as u 
inner join sms_students as s 
on u.designation=s.admission_no
left join sms_classes as c
on s.class=c.id
left join sis_teacher as t
on c.teacher_id=t.teacher_id
left join sis_programs as p
on t.program_id=p.program_id
left join sis_class_subject as cm
on c.id=cm.class_id 
left join sms_subjects as m
on cm.subject_id=m.subject_id
left join sms_section as i
on c.section=i.section_id
left join sis_class_session as cs
on c.id=cs.class_id
left join sis_session as ss
on ss.session_id=cs.session_id 
WHERE u.email='csong571@gmail.com'

-- WHERE u.email='csong571@gmail.com' and m.subject_id=103
-- where s.class=13 and s.section=10

-- left join sis_programs as p
-- on t.program_id=p.program_id

-- left join sis_program_subject as ps
-- on t.program_id=ps.program_id 
