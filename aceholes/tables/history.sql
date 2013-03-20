CREATE TABLE history(
	sno VARCHAR2(10),
	hstanding VARCHAR2(99),
	hsem VARCHAR2(10),
	hyear VARCHAR2(10),
	constraint h_sno_fk foreign key(sno) references student(sno)
);

/*
	foreign key yung student number dito
	text/email me for suggestions
	
	09263737741
	akosiothan@gmail.com
*/