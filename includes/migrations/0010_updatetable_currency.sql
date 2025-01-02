ALTER TABLE currency
DROP COLUMN code,                   -- Elimina la columna 'code'
ADD COLUMN image VARCHAR(300) NULL,
MODIFY COLUMN symbol VARCHAR(5) NOT NULL; 
