CREATE TABLE ge_allowed(
	sno VARCHAR2(10),
	geno VARCHAR2(99),
	constraint gall_sno_fk foreign key(sno) references student(sno),
	constraint gall_geno_fk foreign key(geno) references ge(geno)
);