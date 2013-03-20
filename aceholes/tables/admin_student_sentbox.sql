CREATE TABLE admin_student_sentbox(
	sno VARCHAR2(10),
	assdate DATE,
	asssubject VARCHAR2(99),
	assbody VARCHAR2(1000),
	constraint ass_sno_fk foreign key(sno) references student(sno)
);
