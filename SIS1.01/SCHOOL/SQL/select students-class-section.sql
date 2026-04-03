SELECT * FROM sms.sms_classes as cls
left join sms.sms_section as sec
on cls.section=sec.section_id
where id=(select class from sms_students
inner join user
on user.designation=sms_students.admission_no)
