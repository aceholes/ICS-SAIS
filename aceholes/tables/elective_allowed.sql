CREATE TABLE elective_allowed(
	sno VARCHAR2(10),
	elno VARCHAR2(99),
	constraint eall_sno_fk foreign key(sno) references student(sno),
	constraint eall_elno_fk foreign key(elno) references elective(elno)
);