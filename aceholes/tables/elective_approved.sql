CREATE TABLE elective_approved(
	sno VARCHAR2(10),
	elno VARCHAR2(99),
	easem VARCHAR2(10),
	eayear VARCHAR2(10),
	constraint ea_sno_fk foreign key(sno) references student(sno),
	constraint ea_elno_fk foreign key(elno) references elective(elno)
);