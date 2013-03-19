CREATE TABLE elective_taken(
	sno VARCHAR2(10),
	elno VARCHAR2(99),
	etgrade NUMBER(3,2),
	etsem VARCHAR2(10),
	etyear VARCHAR2(10),
	constraint et_sno_fk foreign key(sno) references student(sno),
	constraint et_elno_fk foreign key(elno) references elective(elno)
);