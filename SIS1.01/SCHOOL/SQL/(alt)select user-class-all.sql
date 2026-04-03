select u.id,s.class,s.section from user as u 
inner join sms_students as s 
on u.designation=s.admission_no 
left join sms_classes as c 
on s.class=c.id