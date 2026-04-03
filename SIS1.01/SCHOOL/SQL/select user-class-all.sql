/*
select c.id,c.name,s.subject,i.section,t.teacher,s.type from sms_classes as c
left join sms_teacher as t
on c.teacher_id=t.teacher_id
left join sms_subjects as s
on t.subject_id=s.subject_id
left join sms_section as i
on c.section=i.section_id
where id=(select class as id from sms_students where id=(select id from user where email='csong571@gmail.com'))
*/
select c.id,c.name,m.subject,i.section,t.teacher,m.type from user as u 
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
group by c.id