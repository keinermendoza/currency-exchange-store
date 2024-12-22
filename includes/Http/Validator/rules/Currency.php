<?php

// CREATE TABLE currency (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(50) NOT NULL UNIQUE,    -- Nombre de la divisa (ej: "Dólar estadounidense")
//     code CHAR(3) NOT NULL UNIQUE,        -- Código de la divisa (ej: "USD", "EUR", "BRL")
//     symbol VARCHAR(5) DEFAULT NULL       -- Símbolo (ej: "$", "€", "R$")
// );

return [
    'name' => [
        ['rule' => 'string', 'message' => 'Nombre es Necesario, puede tener hasta 50 letras.', 'params' => [3, 200]]
    ],
    'symbol' => [
        ['rule' => 'string', 'message' => 'Simbolo es Necesario, puede ocupar hasta 5 espacios', 'params' => [1, 5]]
    ],
];

