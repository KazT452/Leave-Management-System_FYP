select c.id as ID,c.name as Class,m.subject as Subject,i.section as Section,t.teacher as Teacher,u.status as Status
, u.id as uID, s.id as sID, c.id as cID, m.subject_id as mID, i.section_id as iID, t.teacher_id as tID, u.designation as Designation, u.type as Type
from user as u 
inner join sms_students as s 
on u.designation=s.admission_no
left join sms_classes as c
on s.class=c.id
left join sms_teacher as t
on c.teacher_id=t.teacher_id
left join sms_subjects as m
on t.subject_id=m.subject_id
left join sms_section as i
on c.section=i.section_id
WHERE u.email='csong571@gmail.com'