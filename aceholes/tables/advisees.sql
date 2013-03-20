CREATE TABLE curr_reg_advisees(
	ino VARCHAR2(10),
	sno VARCHAR2(10),
	crastartdate DATE,
	craenddate DATE,
	constraint cra_ino_fk foreign key(ino) references instructor(ino),
	constraint cra_sno_fk foreign key(sno) references student(sno)
);

CREATE TABLE prev_reg_advisees(
	ino VARCHAR2(10),
	sno VARCHAR2(10),
	prastartdate DATE,
	praenddate DATE,
	constraint pra_ino_fk foreign key(ino) references instructor(ino),
	constraint pra_sno_fk foreign key(sno) references student(sno)
);

CREATE TABLE curr_sp_advisees(
	ino VARCHAR2(10),
	sno VARCHAR2(10),
	csastartdate DATE,
	csaenddate DATE,
	constraint csa_ino_fk foreign key(ino) references instructor(ino),
	constraint csa_sno_fk foreign key(sno) references student(sno)
);

CREATE TABLE prev_sp_advisees(
	ino VARCHAR2(10),
	sno VARCHAR2(10),
	psastartdate DATE,
	psaenddate DATE,
	constraint psa_ino_fk foreign key(ino) references instructor(ino),
	constraint psa_sno_fk foreign key(sno) references student(sno)
);