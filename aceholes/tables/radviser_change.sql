CREATE TABLE radviser_change(
	sno VARCHAR2(10),
	ino VARCHAR2(10),
	rcdate DATE,
	rcreason VARCHAR2(1000),
	constraint rc_ino_fk foreign key(ino) references instructor(ino),
	constraint rc_sno_fk foreign key(sno) references student(sno)
);