USE testdb;

--ALTER TABLE test
--ADD name VARCHAR(50);

--INSERT INTO test(name) VALUES ("Joe");

--UPDATE test SET name = 'Dan' WHERE num = 2;

--ALTER TABLE general_form
--ADD COLUMN city VARCHAR(50);

ALTER TABLE visit_form
ADD COLUMN insurance_effective_date BIT;

SELECT * FROM visit_form;