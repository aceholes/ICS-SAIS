CREATE TABLE major_allowed(
	sno VARCHAR2(10),
	mno VARCHAR2(99),
	constraint mall_sno_fk foreign key(sno) references student(sno),
	constraint mall_mno_fk foreign key(mno) references major(mno)
);