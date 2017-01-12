-- Creative Commons BY, version 4.0 or (at your option) any later version.
-- https://creativecommons.org/licenses/by/4.0/


CREATE TABLE user
(
	id         INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username   VARCHAR(30),
	password   VARCHAR(30),
	disabled   CHAR,
	firstname  VARCHAR(30),
	lastname   VARCHAR(30),
	email_addr VARCHAR(120)
);
