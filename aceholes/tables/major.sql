CREATE TABLE major(
	mno VARCHAR2(99),
	mtitle VARCHAR2(99) NOT NULL,
	mdesc VARCHAR2(1000),
	munits NUMBER(1) NOT NULL,
	constraint m_no_pk primary key(mno),
	constraint m_title_uk unique(mtitle)
);

