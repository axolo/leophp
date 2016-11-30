-- -----------------------------
-- MsSQL Charset Convert Testing
-- -----------------------------
CREATE TABLE charset (
  id int PRIMARY KEY IDENTITY(1,1) NOT NULL,
  name varchar(30) UNIQUE NOT NULL,
  password char(40) NOT NULL,
  disable bit NULL,
  signup datetime NULL,
  score decimal(18,2) NULL
);