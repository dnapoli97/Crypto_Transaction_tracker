CREATE TABLE Bitcoin (
	day Date PRIMARY KEY,
	open decimal(7,2) NOT NULL,
	close decimal(7,2) NOT NULL,
	high decimal(7,2) NOT NULL,
	low decimal(7,2) NOT NULL
);

CREATE TABLE Ethereum (
	day Date PRIMARY KEY,
	open decimal(6,2) NOT NULL,
	close decimal(6,2) NOT NULL,
	high decimal(6,2) NOT NULL,
	low decimal(6,2) NOT NULL
);

CREATE TABLE Xrp (
	day Date PRIMARY KEY,
	open decimal(8,6) NOT NULL,
	close decimal(8,6) NOT NULL,
	high decimal(8,6) NOT NULL,
	low decimal(8,6) NOT NULL
	);

CREATE TABLE User (
	username varchar(25) PRIMARY KEY,
	password varchar(25) NOT NULL,
	fname varchar(20) NOT NULL,
	lname varchar(20) NOT NULL,
	email varchar(50) NOT NULL,
	age int NOT NULL,
	preferedCrypto int
);

CREATE TABLE transaction (
	username varchar(25),
	day datetime NOT NULL,
	currency varchar(3) NOT NULL,
	amount decimal(25,7) NOT NULL,
	FOREIGN KEY (username) REFERENCES User(username),
	PRIMARY KEY (username, day, currency)
);

