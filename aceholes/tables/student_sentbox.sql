CREATE TABLE student_sentbox(
	sno VARCHAR2(10),
	ssdate DATE,
	sssubject VARCHAR2(99),
	ssbody VARCHAR2(1000),
	constraint ss_sno_fk foreign key(sno) references student(sno)
);
