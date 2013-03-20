CREATE TABLE sadviser_change(
	sno VARCHAR2(10),
	ino VARCHAR2(10),
	scdate DATE,
	screason VARCHAR2(1000),
	constraint sc_ino_fk foreign key(ino) references instructor(ino),
	constraint sc_sno_fk foreign key(sno) references student(sno)
);