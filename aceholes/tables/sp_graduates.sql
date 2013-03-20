CREATE TABLE sp_graduates(
	sno VARCHAR2(10),
	ino VARCHAR2(10),
	sgtitle VARCHAR2(1000) NOT NULL,
	sgsem VARCHAR2(99),
	sgyear VARCHAR2(99),
	constraint sg_ino_fk foreign key(ino) references instructor(ino),
	constraint sg_sno_fk foreign key(sno) references student(sno)
);