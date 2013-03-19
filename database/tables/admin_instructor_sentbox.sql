CREATE TABLE admin_instructor_sentbox(
	ino VARCHAR2(10),
	aisdate DATE,
	aissubject VARCHAR2(99),
	aisbody VARCHAR2(1000),
	constraint ais_ino_fk foreign key(ino) references instructor(ino)
);
