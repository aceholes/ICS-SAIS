CREATE TABLE ge_approved(
	sno VARCHAR2(10),
	geno VARCHAR2(99),
	gasem VARCHAR2(10),
	gayear VARCHAR2(10),
	constraint ga_sno_fk foreign key(sno) references student(sno),
	constraint ga_geno_fk foreign key(geno) references ge(geno)
);