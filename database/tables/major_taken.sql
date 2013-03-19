CREATE TABLE major_taken(
	sno VARCHAR2(10),
	inolect VARCHAR2(10),
	inolab VARCHAR2(10),
	mno VARCHAR2(99),
	mtgrade NUMBER(3,2),
	mtsem VARCHAR2(10),
	mtyear VARCHAR2(10),
	constraint mt_sno_fk foreign key(sno) references student(sno),
	constraint mt_inolect_fk foreign key(inolect) references instructor(ino),
	constraint mt_inolab_fk foreign key(inolab) references instructor(ino),
	constraint mt_mno_fk foreign key(mno) references major(mno)
);