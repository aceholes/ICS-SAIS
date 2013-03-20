CREATE TABLE instructor_inbox(
	ino VARCHAR2(10),
	iidate DATE,
	iisubject VARCHAR2(99),
	iibody VARCHAR2(1000),
	constraint ii_ino_fk foreign key(ino) references instructor(ino)
);
