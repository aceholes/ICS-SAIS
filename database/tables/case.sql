CREATE TABLE case(
	sno VARCHAR2(10),
	cno NUMBER(10),
	creason VARCHAR2(99),
	cpenalty VARCHAR2(99),
	csem VARCHAR2(10),
	cyear VARCHAR2(10),
	constraint c_cno_pk primary key(cno),
	constraint c_sno_fk foreign key(sno) references student(sno)
);
