DROP TABLE user;
CREATE TABLE user
(
	id 			INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username 	VARCHAR(30),
	password 	VARCHAR(30),
	disabled 	CHAR,
	firstname 	VARCHAR(30),
	lastname 	VARCHAR(30),
	email_addr 	VARCHAR(30)
);