CREATE TABLE administrator(
	ano NUMBER(10),
	afname VARCHAR2(99) NOT NULL,
	alname VARCHAR2(99) NOT NULL,
	agender VARCHAR2(10) NOT NULL,
	ahaddr VARCHAR2(1000),
	acaddr VARCHAR2(1000),
	ahcontact NUMBER(15),
	accontact NUMBER(15),
	amobile NUMBER(15),
	auser VARCHAR2(99) NOT NULL,
	apword VARCHAR2(99) NOT NULL,
	aemail VARCHAR2(99) NOT NULL,
	constraint a_no_pk primary key(ano),
	constraint a_user_uk unique(auser),
	constraint a_email_uk unique(aemail)
);
