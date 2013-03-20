CREATE TABLE encoder_log(
	eno VARCHAR2(10),
	elactivity VARCHAR2(1000),
	eltime DATE,
	constraint el_eno_fk foreign key(eno) references encoder(eno)
);