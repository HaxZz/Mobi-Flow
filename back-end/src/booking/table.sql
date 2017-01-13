-- Creative Commons BY, version 4.0 or (at your option) any later version.
-- https://creativecommons.org/licenses/by/4.0/


CREATE TABLE booking
(
	id            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	userid        INT UNSIGNED, -- TODO foreign key
	date_creation DATETIME
);
