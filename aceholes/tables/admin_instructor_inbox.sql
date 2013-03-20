CREATE TABLE admin_instructor_inbox(
	ino VARCHAR2(10),
	aiidate DATE,
	aiisubject VARCHAR2(99),
	aiibody VARCHAR2(1000),
	constraint aii_ino_fk foreign key(ino) references instructor(ino)
);
