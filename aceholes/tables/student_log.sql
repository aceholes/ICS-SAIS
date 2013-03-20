CREATE TABLE student_log(
	sno VARCHAR2(10),
	slactivity VARCHAR2(1000) NOT NULL,
	sltime DATE,
	constraint sl_sno_fk foreign key(sno) references student(sno)
);