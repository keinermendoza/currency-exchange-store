CREATE TABLE currency (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,    -- Nombre de la divisa (ej: "Dólar estadounidense")
    code CHAR(3) NOT NULL UNIQUE,        -- Código de la divisa (ej: "USD", "EUR", "BRL")
    symbol VARCHAR(5) DEFAULT NULL       -- Símbolo (ej: "$", "€", "R$")
);
