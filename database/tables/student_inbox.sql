CREATE TABLE student_inbox(
	sno VARCHAR2(10),
	sidate DATE,
	sisubject VARCHAR2(99),
	sibody VARCHAR2(1000),
	constraint si_sno_fk foreign key(sno) references student(sno)
);
