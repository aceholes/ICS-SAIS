CREATE TABLE ge_taken(
	sno VARCHAR2(10),
	geno VARCHAR2(99),
	gtgrade NUMBER(3,2),
	gtsem VARCHAR2(10),
	gtyear VARCHAR2(10),
	constraint gt_sno_fk foreign key(sno) references student(sno),
	constraint gt_geno_fk foreign key(geno) references ge(geno)
);