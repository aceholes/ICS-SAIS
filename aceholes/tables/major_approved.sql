CREATE TABLE major_approved(
	sno VARCHAR2(10),
	mno VARCHAR2(99),
	masem VARCHAR2(10),
	mayear VARCHAR2(10),
	constraint ma_sno_fk foreign key(sno) references student(sno),
	constraint ma_mno_fk foreign key(mno) references major(mno)
);