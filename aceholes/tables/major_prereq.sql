CREATE TABLE major_prereq(
	mno VARCHAR2(99),
	pno VARCHAR2(99),
	constraint mp_mno_fk foreign key(mno) references major(mno),
	constraint mp_pno_fk foreign key(mno) references major(mno)
);