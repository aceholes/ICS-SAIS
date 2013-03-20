CREATE TABLE instructor_log(
	ino VARCHAR2(10),
	ilactivity VARCHAR2(1000),
	iltime DATE,
	constraint il_ino_fk foreign key(ino) references instructor(ino)
);