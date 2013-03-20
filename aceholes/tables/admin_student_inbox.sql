CREATE TABLE admin_student_inbox(
	sno VARCHAR2(10),
	asidate DATE,
	asisubject VARCHAR2(99),
	asibody VARCHAR2(1000),
	constraint asi_sno_fk foreign key(sno) references student(sno)
);
