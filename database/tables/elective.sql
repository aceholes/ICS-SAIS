CREATE TABLE elective(
	elno VARCHAR2(99),
	eltitle VARCHAR2(99) NOT NULL,
	eldesc VARCHAR2(1000),
	elcollege VARCHAR2(99) NOT NULL,
	eldept VARCHAR2(99),
	elunits NUMBER(1) NOT NULL,
	constraint el_no_pk primary key(elno),
	constraint el_title_uk unique(eltitle),
	constraint el_desc_uk unique(eldesc)
);
