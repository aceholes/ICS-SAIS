CREATE TABLE ge(
	geno VARCHAR2(99),
	getitle VARCHAR2(99) NOT NULL,
	gedesc VARCHAR2(1000),
	gedomain VARCHAR2(5) NOT NULL,
	geunits NUMBER(1) NOT NULL,
	constraint ge_no_pk primary key(geno),
	constraint ge_title_uk unique(getitle)
);
