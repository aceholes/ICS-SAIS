CREATE TABLE instructor_sentbox(
	ino VARCHAR2(10),
	isdate DATE,
	issubject VARCHAR2(99),
	isbody VARCHAR2(1000),
	constraint is_ino_fk foreign key(ino) references instructor(ino)
);
