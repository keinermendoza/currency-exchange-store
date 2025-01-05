-- this is a combination of migrations 0003, 0007, 0009

CREATE TABLE exchangerate (
    id INT AUTO_INCREMENT PRIMARY KEY,
    base_currency_id INT NOT NULL,       -- Divisa base
    target_currency_id INT NOT NULL,     -- Divisa objetivo
    rate DECIMAL(10,6) NOT NULL,         -- Tipo de cambio (ej: 1 USD = 5.35 BRL)
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,  -- Fecha de actualización
    is_default TINYINT(1) DEFAULT 0,
    base_amount DECIMAL(10,6) NOT NULL DEFAULT 0,
    target_amount DECIMAL(10,6) NOT NULL DEFAULT 0

    -- Restricciones y claves foráneas
    FOREIGN KEY (base_currency_id) REFERENCES currency(id) ON DELETE CASCADE,
    FOREIGN KEY (target_currency_id) REFERENCES currency(id) ON DELETE CASCADE,
    CONSTRAINT unique_currency_pair UNIQUE (base_currency_id, target_currency_id)  -- Evita duplicados
);
